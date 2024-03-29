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

namespace Instacar\IntelimotorApiClient;

use Instacar\IntelimotorApiClient\Client\HttpClient;
use Instacar\IntelimotorApiClient\Model\Brand;
use Instacar\IntelimotorApiClient\Model\BusinessUnit;
use Instacar\IntelimotorApiClient\Model\Color;
use Instacar\IntelimotorApiClient\Model\CreateMessageInput;
use Instacar\IntelimotorApiClient\Model\CreateMessageOutput;
use Instacar\IntelimotorApiClient\Model\CreateValuationInput;
use Instacar\IntelimotorApiClient\Model\CreateValuationOutput;
use Instacar\IntelimotorApiClient\Model\Model;
use Instacar\IntelimotorApiClient\Model\Trim;
use Instacar\IntelimotorApiClient\Model\Unit;
use Instacar\IntelimotorApiClient\Model\Year;
use Instacar\IntelimotorApiClient\Normalizer\TimestampNormalizer;
use Instacar\IntelimotorApiClient\Request\HttpRequestFactory;
use Instacar\IntelimotorApiClient\Request\HttpRequestInterface;
use Instacar\IntelimotorApiClient\Response\ApiResponseCollectionInterface;
use Instacar\IntelimotorApiClient\Response\ApiResponseInterface;
use Instacar\IntelimotorApiClient\Response\ApiResponsePaginatedInterface;
use Instacar\IntelimotorApiClient\Response\BrandResponse;
use Instacar\IntelimotorApiClient\Response\BrandsResponse;
use Instacar\IntelimotorApiClient\Response\BusinessUnitResponse;
use Instacar\IntelimotorApiClient\Response\BusinessUnitsResponse;
use Instacar\IntelimotorApiClient\Response\ColorResponse;
use Instacar\IntelimotorApiClient\Response\ColorsResponse;
use Instacar\IntelimotorApiClient\Response\CreateMessageResponse;
use Instacar\IntelimotorApiClient\Response\CreateValuationResponse;
use Instacar\IntelimotorApiClient\Response\ModelResponse;
use Instacar\IntelimotorApiClient\Response\ModelsResponse;
use Instacar\IntelimotorApiClient\Response\TrimResponse;
use Instacar\IntelimotorApiClient\Response\TrimsResponse;
use Instacar\IntelimotorApiClient\Response\UnitResponse;
use Instacar\IntelimotorApiClient\Response\UnitsResponse;
use Instacar\IntelimotorApiClient\Response\YearResponse;
use Instacar\IntelimotorApiClient\Response\YearsResponse;
use LogicException;
use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7\Request;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Symfony\Component\HttpClient\HttpClient as SymfonyHttpClient;
use Symfony\Component\HttpClient\Psr18Client;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class IntelimotorClient
{
    private const BASE_URL = 'https://app.intelimotor.com/api/';

    private HttpClient $client;

    private HttpRequestFactory $requestFactory;

    private string $apiKey;

    private string $apiSecret;

    /** @var string[] */
    private array $channels;

    public function __construct(
        ClientInterface $client,
        RequestFactoryInterface $requestFactory,
        StreamFactoryInterface $streamFactory,
        string $apiKey,
        string $apiSecret,
    ) {
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(null));
        $nameConverter = new MetadataAwareNameConverter($classMetadataFactory);
        $propertyTypeExtractor = new ReflectionExtractor();
        $serializer = new Serializer(
            [
                new TimestampNormalizer([
                    TimestampNormalizer::FORMAT_KEY => 'Uv',
                    TimestampNormalizer::TIMEZONE_KEY => 'UTC',
                ]),
                new ObjectNormalizer($classMetadataFactory, $nameConverter, null, $propertyTypeExtractor),
                new ArrayDenormalizer(),
            ],
            ['json' => new JsonEncoder()],
        );

        $this->client = new HttpClient($client, $serializer);
        $this->requestFactory = new HttpRequestFactory($requestFactory, $streamFactory, $serializer);
        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;
    }

    /**
     * @return string[]
     */
    public function getChannels(): array
    {
        return $this->channels;
    }

    public function setChannel(string $channelName, string $channelKey): void
    {
        $this->channels[$channelName] = $channelKey;
    }

    /**
     * @param string[] $channels
     */
    public function setChannels(array $channels): self
    {
        $this->channels = $channels;

        return $this;
    }

    /**
     * @phpstan-return iterable<BusinessUnit>
     *
     * @throws ClientExceptionInterface
     */
    public function getBusinessUnits(): iterable
    {
        return $this->collectionRequest(
            BusinessUnitsResponse::class,
            'business-units',
        );
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getBusinessUnit(string $businessUnitId): BusinessUnit
    {
        return $this->itemRequest(
            BusinessUnitResponse::class,
            "business-units/$businessUnitId",
        );
    }

    /**
     * @phpstan-return iterable<Unit>
     *
     * @throws ClientExceptionInterface
     */
    public function getBusinessUnitUnits(string $businessUnitId): iterable
    {
        return $this->paginatedRequest(
            UnitsResponse::class,
            "business-units/$businessUnitId/units",
        );
    }

    /**
     * @phpstan-return iterable<Unit>
     *
     * @throws ClientExceptionInterface
     */
    public function getBusinessUnitInventoryUnits(string $businessUnitId): iterable
    {
        return $this->paginatedRequest(
            UnitsResponse::class,
            "business-units/$businessUnitId/inventory-units",
        );
    }

    /**
     * @phpstan-return iterable<Unit>
     *
     * @throws ClientExceptionInterface
     */
    public function getBusinessUnitSoldUnits(string $businessUnitId): iterable
    {
        return $this->paginatedRequest(
            UnitsResponse::class,
            "business-units/$businessUnitId/sold-units",
        );
    }

    /**
     * @phpstan-return iterable<Color>
     *
     * @throws ClientExceptionInterface
     */
    public function getColors(): iterable
    {
        return $this->collectionRequest(
            ColorsResponse::class,
            'colors',
        );
    }

    /**
     * @phpstan-return iterable<Color>
     *
     * @throws ClientExceptionInterface
     */
    public function getColorsCsv(): iterable
    {
        $colors = $this->csvRequest('colors');

        foreach ($colors as $color) {
            yield new Color($color['colorId'], $color['name']);
        }
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getColor(string $colorId): Color
    {
        return $this->itemRequest(
            ColorResponse::class,
            "colors/$colorId",
        );
    }

    /**
     * @phpstan-return iterable<Brand>
     *
     * @throws ClientExceptionInterface
     */
    public function getBrands(string $country = 'MX'): iterable
    {
        return $this->collectionRequest(
            BrandsResponse::class,
            'brands',
            'GET',
            ['countryCode' => $country],
        );
    }

    /**
     * @phpstan-return iterable<Brand>
     *
     * @throws ClientExceptionInterface
     */
    public function getBrandsCsv(string $country = 'MX'): iterable
    {
        $brands = $this->csvRequest('brands', ['countryCode' => $country]);

        foreach ($brands as $brand) {
            yield new Brand($brand['brandId'], $brand['name']);
        }
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getBrand(string $brandId): Brand
    {
        return $this->itemRequest(
            BrandResponse::class,
            "brands/$brandId",
        );
    }

    /**
     * @phpstan-return iterable<Model>
     *
     * @throws ClientExceptionInterface
     */
    public function getModels(string $brandId): iterable
    {
        return $this->collectionRequest(
            ModelsResponse::class,
            "brands/$brandId/models",
        );
    }

    /**
     * @phpstan-return iterable<Model>
     *
     * @throws ClientExceptionInterface
     */
    public function getModelsCsv(string $country = 'MX'): iterable
    {
        $models = $this->csvRequest('models', ['countryCode' => $country]);

        foreach ($models as $model) {
            yield new Model($model['modelId'], $model['name'], new Brand($model['brandId']));
        }
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getModel(string $brandId, string $modelId): Model
    {
        return $this->itemRequest(
            ModelResponse::class,
            "brands/$brandId/models/$modelId",
        );
    }

    /**
     * @phpstan-return iterable<Year>
     *
     * @throws ClientExceptionInterface
     */
    public function getYears(string $brandId, string $modelId): iterable
    {
        return $this->collectionRequest(
            YearsResponse::class,
            "brands/$brandId/models/$modelId/years",
        );
    }

    /**
     * @phpstan-return iterable<Year>
     *
     * @throws ClientExceptionInterface
     */
    public function getYearsCsv(string $country = 'MX'): iterable
    {
        $years = $this->csvRequest('years', ['countryCode' => $country]);

        foreach ($years as $year) {
            yield new Year($year['yearId'], $year['name'], new Model($year['modelId']));
        }
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getYear(string $brandId, string $modelId, string $yearId): Year
    {
        return $this->itemRequest(
            YearResponse::class,
            "brands/$brandId/models/$modelId/years/$yearId",
        );
    }

    /**
     * @phpstan-return iterable<Trim>
     *
     * @throws ClientExceptionInterface
     */
    public function getTrims(string $brandId, string $modelId, string $yearId): iterable
    {
        return $this->collectionRequest(
            TrimsResponse::class,
            "brands/$brandId/models/$modelId/years/$yearId/trims",
        );
    }

    /**
     * @phpstan-return iterable<Trim>
     *
     * @throws ClientExceptionInterface
     */
    public function getTrimsCsv(string $country = 'MX'): iterable
    {
        $trims = $this->csvRequest('trims', ['countryCode' => $country]);

        foreach ($trims as $trim) {
            yield new Trim($trim['trimId'], $trim['name'], new Year($trim['yearId']));
        }
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getTrim(string $brandId, string $modelId, string $yearId, string $trimId): Trim
    {
        return $this->itemRequest(
            TrimResponse::class,
            "brands/$brandId/models/$modelId/years/$yearId/trims/$trimId",
        );
    }

    /**
     * @phpstan-return iterable<Unit>
     *
     * @throws ClientExceptionInterface
     */
    public function getUnits(): iterable
    {
        return $this->paginatedRequest(UnitsResponse::class, 'units');
    }

    /**
     * @phpstan-return iterable<Unit>
     *
     * @throws ClientExceptionInterface
     */
    public function getInventoryUnits(): iterable
    {
        return $this->paginatedRequest(UnitsResponse::class, 'inventory-units');
    }

    /**
     * @phpstan-return iterable<Unit>
     *
     * @throws ClientExceptionInterface
     */
    public function getSoldUnits(): iterable
    {
        return $this->paginatedRequest(UnitsResponse::class, 'sold-units');
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getUnit(string $id): Unit
    {
        return $this->itemRequest(UnitResponse::class, 'units/' . $id);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function createMessage(string $channel, CreateMessageInput $message): CreateMessageOutput
    {
        $channelKey = $this->channels[$channel];

        return $this->itemRequest(CreateMessageResponse::class, 'messages', 'POST', ['apiKey' => $channelKey], $message, false);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function createValuation(CreateValuationInput $valuation): CreateValuationOutput
    {
        return $this->itemRequest(CreateValuationResponse::class, 'valuations', 'POST', [], $valuation);
    }

    public static function createDefault(string $apiKey, string $apiSecret): self
    {
        if (!class_exists(SymfonyHttpClient::class)) {
            throw new LogicException('You must install the Symfony HTTP Client component.' . \PHP_EOL . 'Please, execute "composer require symfony/http-client" in your project root');
        }
        if (!class_exists(Request::class)) {
            throw new LogicException('You must install the Nyholm PSR-7 implementation.' . \PHP_EOL . 'Please, execute "composer require nyholm/psr7" in your project root');
        }

        $httpClient = SymfonyHttpClient::create();
        $psr18Client = new Psr18Client($httpClient);
        $psr17Factory = new Psr17Factory();

        return new self($psr18Client, $psr17Factory, $psr17Factory, $apiKey, $apiSecret);
    }

    /**
     * @phpstan-template TPayload of object
     * @phpstan-template TResponse of object
     *
     * @phpstan-param class-string<ApiResponseInterface<TResponse>> $responseClass
     * @phpstan-param array<string, string> $params
     * @phpstan-param TPayload|null $payload
     * @phpstan-param array<string, string|array<string>> $headers
     *
     * @phpstan-return TResponse
     *
     * @throws ClientExceptionInterface
     */
    private function itemRequest(
        string $responseClass,
        string $endpoint,
        string $method = 'GET',
        array $params = [],
        mixed $payload = null,
        bool $authenticated = true,
        array $headers = [],
    ): object {
        $request = $this->makeRequest($endpoint, $method, $params, $payload, $authenticated, $headers);
        $response = $this->client->sendRequest($request);

        return $response->deserializeResponse($responseClass)->getData();
    }

    /**
     * @phpstan-template TPayload of object
     * @phpstan-template TResponse of object
     *
     * @phpstan-param class-string<ApiResponseCollectionInterface<TResponse>> $responseClass
     * @phpstan-param array<string, string> $params
     * @phpstan-param TPayload|null $payload
     * @phpstan-param array<string, string|array<string>> $headers
     *
     * @phpstan-return iterable<TResponse>
     *
     * @throws ClientExceptionInterface
     */
    private function collectionRequest(
        string $responseClass,
        string $endpoint,
        string $method = 'GET',
        array $params = [],
        mixed $payload = null,
        bool $authenticated = true,
        array $headers = [],
    ): iterable {
        $request = $this->makeRequest($endpoint, $method, $params, $payload, $authenticated, $headers);
        $response = $this->client->sendRequest($request);

        return $response->deserializeResponse($responseClass)->getData();
    }

    /**
     * @phpstan-template T of object
     *
     * @phpstan-param class-string<ApiResponsePaginatedInterface<T>> $responseClass
     * @phpstan-param array<string, string> $params
     * @phpstan-param array<string, string|array<string>> $headers
     *
     * @phpstan-return iterable<T>
     *
     * @throws ClientExceptionInterface
     */
    private function paginatedRequest(
        string $responseClass,
        string $endpoint,
        string $method = 'GET',
        array $params = [],
        bool $authenticated = true,
        array $headers = [],
    ): iterable {
        $pageNumber = 0;
        $pageSize = 10;

        do {
            $params['pageNumber'] = (string) $pageNumber;
            $params['pageSize'] = (string) $pageSize;

            $request = $this->makeRequest($endpoint, $method, $params, null, $authenticated, $headers);
            $response = $this->client->sendRequest($request);
            $paginatedResponse = $response->deserializeResponse($responseClass);
            $items = $paginatedResponse->getData();

            foreach ($items as $item) {
                yield $item;
            }
            ++$pageNumber;
        } while ($paginatedResponse->hasMore());
    }

    /**
     * @phpstan-param array<string, string> $params
     * @phpstan-param array<string, string|array<string>> $headers
     *
     * @phpstan-return iterable<array<string, string>>
     *
     * @throws ClientExceptionInterface
     */
    private function csvRequest(
        string $endpoint,
        array $params = [],
        bool $authenticated = true,
        array $headers = [],
    ): iterable {
        $request = $this->makeRequest("$endpoint/csv", 'GET', $params, null, $authenticated, $headers);
        $response = $this->client->sendRequest($request);

        $columns = null;
        foreach ($response->streamLines() as $row) {
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
     * @phpstan-template TPayload of object
     *
     * @phpstan-param array<string, string> $params
     * @phpstan-param TPayload|null $payload
     * @phpstan-param array<string, string|array<string>> $headers
     */
    private function makeRequest(
        string $endpoint,
        string $method = 'GET',
        array $params = [],
        mixed $payload = null,
        bool $authenticated = true,
        array $headers = [],
    ): HttpRequestInterface {
        $request = $this->requestFactory->createRequest($method, self::BASE_URL . $endpoint);
        $request = $request->withParams($params);
        $request = $request->withPayload($payload);
        $request = $request->withHeaders($headers);

        if ($authenticated) {
            $request = $request->withAuthentication($this->apiKey, $this->apiSecret);
        }

        return $request;
    }
}
