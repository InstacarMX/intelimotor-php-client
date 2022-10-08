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

namespace Instacar\IntelimotorApiClient\Request;

use Psr\Http\Message\RequestInterface;

/**
 * @interal
 */
interface HttpRequestInterface extends RequestInterface
{
    /**
     * @param string $apiKey
     * @param string $apiSecret
     * @return static
     */
    public function withAuthentication(string $apiKey, string $apiSecret): static;

    /**
     * @phpstan-param array<string, string> $params
     * @param array $params
     * @return static
     */
    public function withParams(array $params): static;

    /**
     * @phpstan-template T
     * @phpstan-param T|null $payload
     * @param mixed $payload
     * @return static
     */
    public function withPayload(mixed $payload): static;

    /**
     * @phpstan-param array<string, string|array<string>> $headers
     * @param array $headers
     * @return static
     */
    public function withHeaders(array $headers): static;
}
