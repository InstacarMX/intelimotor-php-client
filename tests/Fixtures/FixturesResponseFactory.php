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

namespace Instacar\IntelimotorApiClient\Test\Fixtures;

use Nyholm\Psr7\Uri;
use Symfony\Component\HttpClient\Response\MockResponse;

class FixturesResponseFactory
{
    // Extracted from https://app.intelimotor.com/api/docs/
    public const FIXTURES = [
        // Business Units
        '/api/business-units' => [
            'GET' => 'business-units-collection-get.json',
        ],
        '/api/business-units/5cc335590b04d10096fd5ad7' => [
            'GET' => 'business-units-item-get.json',
        ],

        // Units
        '/api/units' => [
            'GET' => 'units-collection-get.json',
        ],
        '/api/inventory-units' => [
            'GET' => 'inventory-units-collection-get.json',
        ],

        // Catalog
        '/api/brands' => [
            'GET' => 'brands-collection-get.json',
        ],
        '/api/brands/5cdc488ba6ca044a76082150' => [
            'GET' => 'brands-item-get.json',
        ],
        '/api/brands/5cdc488ba6ca044a76082150/models' => [
            'GET' => 'models-collection-get.json',
        ],
        '/api/brands/5cdc488ba6ca044a76082150/models/5cdc488ca6ca044a76082151' => [
            'GET' => 'models-item-get.json',
        ],
        '/api/brands/5cdc488ba6ca044a76082150/models/5cdc488ca6ca044a76082151/years' => [
            'GET' => 'years-collection-get.json',
        ],
        '/api/brands/5cdc488ba6ca044a76082150/models/5cdc488ca6ca044a76082151/years/5d5ba8d09f10a4006a416ea9' => [
            'GET' => 'years-item-get.json',
        ],
        '/api/brands/5cdc488ba6ca044a76082150/models/5cdc488ca6ca044a76082151/years/5d5ba8d09f10a4006a416ea9/trims' => [
            'GET' => 'trims-collection-get.json',
        ],
        '/api/brands/5cdc488ba6ca044a76082150/models/5cdc488ca6ca044a76082151/years/5d5ba8d09f10a4006a416ea9/trims/5e726acf98c40c00137181f3' => [
            'GET' => 'trims-item-get.json',
        ],
        '/api/colors' => [
            'GET' => 'colors-collection-get.json',
        ],
        '/api/colors/5ce850dd045e5d03040c6a5c' => [
            'GET' => 'colors-item-get.json',
        ],

        // Errors
        '/api/business-units/bad-request' => [
            'GET' => ['payload' => '400-bad-request-get.json', 'statusCode' => 400],
        ],
        '/api/business-units/unauthorized' => [
            'GET' => ['payload' => '401-unauthorized-get.json', 'statusCode' => 401],
        ],
        '/api/business-units/000000000000000000000000' => [
            'GET' => ['payload' => '404-not-found-get.json', 'statusCode' => 404],
        ],
        '/api/business-units/500000000000000000000000' => [
            'GET' => ['payload' => '500-server-error-get.json', 'statusCode' => 500],
        ],
    ];

    /**
     * @param mixed[] $option
     */
    public function __invoke(string $method, string $url, array $option): MockResponse
    {
        $uri = new Uri($url);

        $fixture = self::FIXTURES[$uri->getPath()][$method];
        if (\is_string($fixture)) {
            $fixture = ['payload' => $fixture];
        }

        $payload = file_get_contents(__DIR__ . \DIRECTORY_SEPARATOR . $fixture['payload']);
        if ($payload === false) {
            throw new \UnexpectedValueException(sprintf('Could not read file %s', $fixture));
        }

        return new MockResponse($payload, [
            'http_code' => $fixture['statusCode'] ?? 200,
            'response_headers' => ['Content-Type' => 'application/json'],
        ]);
    }
}
