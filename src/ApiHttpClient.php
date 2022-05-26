<?php

/*
 * Copyright (c) Instacar 2021.
 * This file is part of IntelimotorApiClient.
 *
 * IntelimotorApiClient is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * IntelimotorApiClient is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU  Lesser General Public License
 * along with IntelimotorApiClient.  If not, see <https://www.gnu.org/licenses/>.
 */

namespace Instacar\IntelimotorApiClient;

use Instacar\IntelimotorApiClient\Response\ApiResponseCollectionInterface;
use Instacar\IntelimotorApiClient\Response\ApiResponseInterface;
use Instacar\IntelimotorApiClient\Response\ApiResponsePaginatedInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class ApiHttpClient
{
    /** @var HttpClientInterface */
    private $client;
    /** @var SerializerInterface */
    private $serializer;

    public function __construct(HttpClientInterface $client, SerializerInterface $serializer)
    {
        $this->client = $client;
        $this->serializer = $serializer;
    }

    /**
     * @template T of object
     * @param class-string<ApiResponseInterface<T>> $responseClass
     * @param string $endpoint
     * @param string $method
     * @param array<mixed> $options
     * @return T
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function itemRequest(
        string $responseClass,
        string $endpoint,
        string $method = 'GET',
        array $options = []
    ): object {
        if (isset($options['extra']['payload'])) {
            $options['body'] = $this->serializer->serialize($options['extra']['payload'], 'json');
        }

        $response = $this->client->request($method, $endpoint, $options)->getContent();
        /** @var ApiResponseInterface<T> $dataResponse */
        $dataResponse = $this->serializer->deserialize($response, $responseClass, 'json');

        return $dataResponse->getData();
    }

    /**
     * @template T of object
     * @param class-string<ApiResponseCollectionInterface<T>> $responseClass
     * @param string $endpoint
     * @param string $method
     * @param array<mixed> $options
     * @return iterable<T>
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function collectionRequest(
        string $responseClass,
        string $endpoint,
        string $method = 'GET',
        array $options = []
    ): iterable {
        $response = $this->client->request($method, $endpoint, $options)->getContent();
        /** @var ApiResponseCollectionInterface<T> $collectionResponse */
        $collectionResponse = $this->serializer->deserialize($response, $responseClass, 'json');

        return $collectionResponse->getData();
    }

    /**
     * @template T of object
     * @param class-string<ApiResponsePaginatedInterface<T>> $responseClass
     * @param string $endpoint
     * @param string $method
     * @param array<mixed> $options
     * @return iterable<T>
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function paginatedRequest(
        string $responseClass,
        string $endpoint,
        string $method = 'GET',
        array $options = []
    ): iterable {
        $pageNumber = 0;
        $pageSize = 10;

        do {
            $requestOptions = $options;
            $requestOptions['query']['pageNumber'] = $pageNumber;
            $requestOptions['query']['pageSize'] = $pageSize;

            $response = $this->client->request($method, $endpoint, $requestOptions)->getContent();
            /** @var ApiResponsePaginatedInterface<T> $paginatedResponse */
            $paginatedResponse = $this->serializer->deserialize($response, $responseClass, 'json');
            $items = $paginatedResponse->getData();

            foreach ($items as $item) {
                yield $item;
            }
            $pageNumber++;
        } while ($paginatedResponse->hasMore());
    }

    /**
     * @param string $endpoint
     * @param array<mixed> $options
     * @return iterable<array<string, string>>
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function csvRequest(
        string $endpoint,
        array $options = []
    ): iterable {
        $response = $this->client->request('GET', "$endpoint/csv", $options);

        $columns = null;
        foreach ($this->streamLines($response) as $row) {
            if (!$columns) {
                // The Intelimotor API has a bug that send 3 unicode control characters (/uef, /ubb, /ubf),
                // so we strip it.
                $sanitizedRow = substr($row, 3);
                $columns = str_getcsv($sanitizedRow);
            } else {
                $data = str_getcsv($row);

                yield array_combine($columns, $data);
            }
        }
    }

    /**
     * @param ResponseInterface $response
     * @return iterable<string>
     * @throws TransportExceptionInterface
     */
    private function streamLines(ResponseInterface $response): iterable
    {
        $stream = $this->client->stream($response);

        try {
            $content = '';
            foreach ($stream as $chunk) {
                $content .= $chunk->getContent();
                $lines = explode("\n", $content);

                if (!$chunk->isLast()) {
                    for ($i = 0; $i < count($lines) - 1; $i++) {
                        yield $lines[$i];
                    }

                    $content = array_pop($lines);
                } else {
                    foreach ($lines as $line) {
                        yield $line;
                    }
                }
            }
        } finally {
            $response->cancel();
        }
    }
}
