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

declare(strict_types=1);

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

namespace Instacar\IntelimotorApiClient\Request;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @internal
 */
final class HttpRequest implements HttpRequestInterface
{
    public RequestInterface $decorated;

    private SerializerInterface $serializer;

    private StreamFactoryInterface $streamFactory;

    public function __construct(
        RequestInterface $decorated,
        SerializerInterface $serializer,
        StreamFactoryInterface $streamFactory,
    ) {
        $this->decorated = $decorated;
        $this->serializer = $serializer;
        $this->streamFactory = $streamFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function getProtocolVersion(): string
    {
        return $this->decorated->getProtocolVersion();
    }

    /**
     * {@inheritdoc}
     */
    public function withProtocolVersion($version): self
    {
        $request = $this->decorated->withProtocolVersion($version);

        return new self($request, $this->serializer, $this->streamFactory);
    }

    /**
     * {@inheritdoc}
     */
    public function getHeaders(): array
    {
        return $this->decorated->getHeaders();
    }

    /**
     * {@inheritdoc}
     */
    public function hasHeader($name): bool
    {
        return $this->decorated->hasHeader($name);
    }

    /**
     * {@inheritdoc}
     */
    public function getHeader($name): array
    {
        return $this->decorated->getHeader($name);
    }

    /**
     * {@inheritdoc}
     */
    public function getHeaderLine($name): string
    {
        return $this->decorated->getHeaderLine($name);
    }

    /**
     * {@inheritdoc}
     */
    public function withHeader($name, $value): self
    {
        $request = $this->decorated->withHeader($name, $value);

        return new self($request, $this->serializer, $this->streamFactory);
    }

    /**
     * {@inheritdoc}
     */
    public function withAddedHeader($name, $value): self
    {
        $request = $this->decorated->withAddedHeader($name, $value);

        return new self($request, $this->serializer, $this->streamFactory);
    }

    /**
     * {@inheritdoc}
     */
    public function withoutHeader($name): self
    {
        $request = $this->decorated->withoutHeader($name);

        return new self($request, $this->serializer, $this->streamFactory);
    }

    /**
     * {@inheritdoc}
     */
    public function getBody(): StreamInterface
    {
        return $this->decorated->getBody();
    }

    /**
     * {@inheritdoc}
     */
    public function withBody(StreamInterface $body): self
    {
        $request = $this->decorated->withBody($body);

        return new self($request, $this->serializer, $this->streamFactory);
    }

    /**
     * {@inheritdoc}
     */
    public function getRequestTarget(): string
    {
        return $this->decorated->getRequestTarget();
    }

    /**
     * {@inheritdoc}
     */
    public function withRequestTarget($requestTarget): self
    {
        $request = $this->decorated->withRequestTarget($requestTarget);

        return new self($request, $this->serializer, $this->streamFactory);
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod(): string
    {
        return $this->decorated->getMethod();
    }

    /**
     * {@inheritdoc}
     */
    public function withMethod($method): self
    {
        $request = $this->decorated->withMethod($method);

        return new self($request, $this->serializer, $this->streamFactory);
    }

    /**
     * {@inheritdoc}
     */
    public function getUri(): UriInterface
    {
        return $this->decorated->getUri();
    }

    /**
     * {@inheritdoc}
     */
    public function withUri(UriInterface $uri, $preserveHost = false): self
    {
        $request = $this->decorated->withUri($uri, $preserveHost);

        return new self($request, $this->serializer, $this->streamFactory);
    }

    /**
     * {@inheritdoc}
     */
    public function withAuthentication(string $apiKey, string $apiSecret): self
    {
        $params = [
            'apiKey' => $apiKey,
            'apiSecret' => $apiSecret,
        ];

        return $this->withParams($params);
    }

    /**
     * {@inheritdoc}
     */
    public function withParams(array $params): self
    {
        $uri = $this->getUri();
        $query = $uri->getQuery();

        foreach ($params as $key => $value) {
            if ($query !== '') {
                $query .= '&';
            }

            $query .= $key . '=' . urlencode($value);
        }

        return $this->withUri($uri->withQuery($query));
    }

    /**
     * {@inheritdoc}
     */
    public function withPayload(mixed $payload): self
    {
        $serializedPayload = $payload !== null ? $this->serializer->serialize($payload, 'json') : '';
        $body = $this->streamFactory->createStream($serializedPayload);

        return $this->withBody($body);
    }

    /**
     * {@inheritdoc}
     */
    public function withHeaders(array $headers): self
    {
        // Set default headers
        $request = $this->withHeader('Content-Type', 'application/json; charset=UTF-8');

        foreach ($headers as $header => $value) {
            $request = $this->withHeader($header, $value);
        }

        return $request;
    }
}
