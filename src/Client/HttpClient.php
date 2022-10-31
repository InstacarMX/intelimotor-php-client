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

namespace Instacar\IntelimotorApiClient\Client;

use Instacar\IntelimotorApiClient\Exceptions\BadRequestHttpException;
use Instacar\IntelimotorApiClient\Exceptions\NotFoundHttpException;
use Instacar\IntelimotorApiClient\Exceptions\UnauthorizedHttpException;
use Instacar\IntelimotorApiClient\Exceptions\UnknownHttpException;
use Instacar\IntelimotorApiClient\Response\HttpResponse;
use Instacar\IntelimotorApiClient\Response\HttpResponseInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @internal
 */
final class HttpClient implements ClientInterface
{
    private ClientInterface $client;

    private SerializerInterface $serializer;

    public function __construct(ClientInterface $client, SerializerInterface $serializer)
    {
        $this->client = $client;
        $this->serializer = $serializer;
    }

    /**
     * {@inheritDoc}
     */
    public function sendRequest(RequestInterface $request): HttpResponseInterface
    {
        $response = $this->client->sendRequest($request);
        $statusCode = $response->getStatusCode();

        if ($statusCode === 400) {
            throw new BadRequestHttpException($response->getReasonPhrase());
        }

        if ($statusCode === 401) {
            throw new UnauthorizedHttpException($response->getReasonPhrase());
        }

        if ($statusCode === 404) {
            throw new NotFoundHttpException($response->getReasonPhrase());
        }

        if ($statusCode < 200 || $statusCode > 299) {
            throw new UnknownHttpException($response->getReasonPhrase());
        }

        return new HttpResponse($response, $this->serializer);
    }
}
