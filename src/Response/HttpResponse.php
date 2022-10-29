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

namespace Instacar\IntelimotorApiClient\Response;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @interal
 */
final class HttpResponse implements HttpResponseInterface
{
    private ResponseInterface $decorated;

    private SerializerInterface $serializer;

    public function __construct(ResponseInterface $decorated, SerializerInterface $serializer)
    {
        $this->decorated = $decorated;
        $this->serializer = $serializer;
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
        $response = $this->decorated->withProtocolVersion($version);

        return new self($response, $this->serializer);
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
        $response = $this->decorated->withHeader($name, $value);

        return new self($response, $this->serializer);
    }

    /**
     * {@inheritdoc}
     */
    public function withAddedHeader($name, $value): self
    {
        $response = $this->decorated->withAddedHeader($name, $value);

        return new self($response, $this->serializer);
    }

    /**
     * {@inheritdoc}
     */
    public function withoutHeader($name): self
    {
        $response = $this->decorated->withoutHeader($name);

        return new self($response, $this->serializer);
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
        $response = $this->decorated->withBody($body);

        return new self($response, $this->serializer);
    }

    /**
     * {@inheritdoc}
     */
    public function getStatusCode(): int
    {
        return $this->decorated->getStatusCode();
    }

    /**
     * {@inheritdoc}
     */
    public function withStatus($code, $reasonPhrase = ''): self
    {
        $response = $this->decorated->withStatus($code, $reasonPhrase);

        return new self($response, $this->serializer);
    }

    /**
     * {@inheritdoc}
     */
    public function getReasonPhrase(): string
    {
        return $this->decorated->getReasonPhrase();
    }

    /**
     * {@inheritdoc}
     */
    public function streamLines(): iterable
    {
        $stream = $this->getBody();

        try {
            $content = '';
            while (true) {
                $content .= $stream->read(8192);
                $lines = explode("\n", $content);

                if (!$stream->eof()) {
                    for ($i = 0; $i < \count($lines) - 1; ++$i) {
                        yield $lines[$i];
                    }

                    $content = array_pop($lines);
                } else {
                    foreach ($lines as $line) {
                        yield $line;
                    }

                    break;
                }
            }
        } finally {
            $stream->close();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function deserializeResponse(string $responseClass): object
    {
        $responseBody = $this->getBody()->getContents();

        return $this->serializer->deserialize($responseBody, $responseClass, 'json');
    }
}
