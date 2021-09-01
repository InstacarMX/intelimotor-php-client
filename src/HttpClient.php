<?php

/*
 * Copyright (c) Instacar 2021. All rights reserved.
 */

namespace InstacarMX\IntelimotorApiClient;

use InstacarMX\IntelimotorApiClient\Response\ResponseCollectionTrait;
use InstacarMX\IntelimotorApiClient\Response\ResponsePaginatedTrait;
use InstacarMX\IntelimotorApiClient\Response\ResponseTrait;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class HttpClient
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
    ) {
        $response = $this->client->request($method, $endpoint, $options)->getContent();
        /** @var ResponseTrait $dataResponse */
        $dataResponse = $this->serializer->deserialize($response, $responseClass, 'json');

        return $dataResponse->getData();
    }

    /**
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
        /** @var ResponseCollectionTrait $collectionResponse */
        $collectionResponse = $this->serializer->deserialize($response, $responseClass, 'json');

        return $collectionResponse->getData();
    }

    /**
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
        $pageNumber = 1;
        $pageSize = 10;

        do {
            $requestOptions = $options;
            $requestOptions['query']['pageNumber'] = $pageNumber;
            $requestOptions['query']['pageSize'] = $pageSize;

            $response = $this->client->request($method, $endpoint, $requestOptions)->getContent();
            /** @var ResponsePaginatedTrait $paginatedResponse */
            $paginatedResponse = $this->serializer->deserialize($response, $responseClass, 'json');
            $items = $paginatedResponse->getData();

            foreach ($items as $item) {
                yield $item;
            }
            $pageNumber++;
        } while ($paginatedResponse->hasMore());
    }

    /**
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
     * @return iterable|string[]
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
