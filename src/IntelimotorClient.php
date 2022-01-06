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

use Doctrine\Common\Annotations\AnnotationReader;
use Instacar\IntelimotorApiClient\Model\Brand;
use Instacar\IntelimotorApiClient\Model\BusinessUnit;
use Instacar\IntelimotorApiClient\Model\Color;
use Instacar\IntelimotorApiClient\Model\CreatedMessage;
use Instacar\IntelimotorApiClient\Model\MessageInput;
use Instacar\IntelimotorApiClient\Model\Model;
use Instacar\IntelimotorApiClient\Model\Trim;
use Instacar\IntelimotorApiClient\Model\Unit;
use Instacar\IntelimotorApiClient\Model\Year;
use Instacar\IntelimotorApiClient\Normalizer\TimestampNormalizer;
use Instacar\IntelimotorApiClient\Response\BrandResponse;
use Instacar\IntelimotorApiClient\Response\BrandsResponse;
use Instacar\IntelimotorApiClient\Response\BusinessUnitResponse;
use Instacar\IntelimotorApiClient\Response\BusinessUnitsResponse;
use Instacar\IntelimotorApiClient\Response\ColorResponse;
use Instacar\IntelimotorApiClient\Response\ColorsResponse;
use Instacar\IntelimotorApiClient\Response\CreatedMessageResponse;
use Instacar\IntelimotorApiClient\Response\ModelResponse;
use Instacar\IntelimotorApiClient\Response\ModelsResponse;
use Instacar\IntelimotorApiClient\Response\TrimResponse;
use Instacar\IntelimotorApiClient\Response\TrimsResponse;
use Instacar\IntelimotorApiClient\Response\UnitResponse;
use Instacar\IntelimotorApiClient\Response\UnitsResponse;
use Instacar\IntelimotorApiClient\Response\YearResponse;
use Instacar\IntelimotorApiClient\Response\YearsResponse;
use LogicException;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class IntelimotorClient
{
    /** @var ApiHttpClient */
    private $apiClient;

    /** @var array */
    private $channels;

    /**
     * @param HttpClientInterface $httpClient
     * @param Serializer|null $serializer
     */
    public function __construct(HttpClientInterface $httpClient, ?Serializer $serializer = null)
    {
        if ($serializer !== null) {
            trigger_deprecation(
                'instacar/intelimotor-api-client',
                '1.0.1',
                'Passing a serializer to the %s is depreciated.',
                self::class
            );
        }

        if (PHP_VERSION_ID < 80000 && !class_exists(AnnotationReader::class)) {
            throw new LogicException(
                'You must install the Doctrine Annotations.' . PHP_EOL .
                'Please, execute "composer require doctrine/annotations" in your project root'
            );
        }

        $annotationReader = PHP_VERSION_ID < 80000 ? new AnnotationReader() : null;
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader($annotationReader));
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
        $this->apiClient = new ApiHttpClient($httpClient, $serializer);
    }

    /**
     * @return array
     */
    public function getChannels(): array
    {
        return $this->channels;
    }

    /**
     * @param string $channelName
     * @param string $channelKey
     */
    public function setChannel(string $channelName, string $channelKey): void
    {
        $this->channels[$channelName] = $channelKey;
    }

    /**
     * @param array $channels
     * @return self
     */
    public function setChannels(array $channels): self
    {
        $this->channels = $channels;
        return $this;
    }

    /**
     * @return BusinessUnit[]
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getBusinessUnits(): iterable
    {
        return $this->apiClient->collectionRequest(
            BusinessUnitsResponse::class,
            'business-units',
        );
    }

    /**
     * @param string $businessUnitId
     * @return BusinessUnit
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getBusinessUnit(string $businessUnitId): BusinessUnit
    {
        return $this->apiClient->itemRequest(
            BusinessUnitResponse::class,
            "business-units/$businessUnitId",
        );
    }

    /**
     * @param string $businessUnitId
     * @return Unit[]
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getBusinessUnitUnits(string $businessUnitId): iterable
    {
        return $this->apiClient->paginatedRequest(UnitsResponse::class, "business-units/$businessUnitId/units");
    }

    /**
     * @param string $businessUnitId
     * @return Unit[]
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getBusinessUnitInventoryUnits(string $businessUnitId): iterable
    {
        return $this->apiClient->paginatedRequest(UnitsResponse::class, "business-units/$businessUnitId/inventory-units");
    }

    /**
     * @param string $businessUnitId
     * @return Unit[]
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getBusinessUnitSoldUnits(string $businessUnitId): iterable
    {
        return $this->apiClient->paginatedRequest(UnitsResponse::class, "business-units/$businessUnitId/sold-units");
    }

    /**
     * @return Color[]
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getColors(): iterable
    {
        return $this->apiClient->collectionRequest(
            ColorsResponse::class,
            'colors',
        );
    }

    /**
     * @return Color[]
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function getColorsCsv(): iterable
    {
        $colors = $this->apiClient->csvRequest('colors');

        foreach ($colors as $color) {
            yield new Color($color['colorId'], $color['name']);
        }
    }

    /**
     * @param string $colorId
     * @return Color
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getColor(string $colorId): Color
    {
        return $this->apiClient->itemRequest(
            ColorResponse::class,
            "colors/$colorId",
        );
    }

    /**
     * @param string $country
     * @return Brand[]
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function getBrands(string $country = 'MX'): iterable
    {
        return $this->apiClient->collectionRequest(
            BrandsResponse::class,
            'brands',
            'GET',
            ['query' => ['countryCode' => $country]],
        );
    }

    /**
     * @param string $country
     * @return Brand[]
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function getBrandsCsv(string $country = 'MX'): iterable
    {
        $brands = $this->apiClient->csvRequest('brands', ['query' => ['countryCode' => $country]]);

        foreach ($brands as $brand) {
            yield new Brand($brand['brandId'], $brand['name']);
        }
    }

    /**
     * @param string $brandId
     * @return Brand
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getBrand(string $brandId): Brand
    {
        return $this->apiClient->itemRequest(
            BrandResponse::class,
            "brands/$brandId",
        );
    }

    /**
     * @param string $brandId
     * @return Model[]
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getModels(string $brandId): iterable
    {
        return $this->apiClient->collectionRequest(
            ModelsResponse::class,
            "brands/$brandId/models",
        );
    }

    /**
     * @param string $country
     * @return Model[]
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function getModelsCsv(string $country = 'MX'): iterable
    {
        $models = $this->apiClient->csvRequest('models', ['query' => ['countryCode' => $country]]);

        foreach ($models as $model) {
            yield new Model($model['modelId'], $model['name'], new Brand($model['brandId']));
        }
    }

    /**
     * @param string $brandId
     * @param string $modelId
     * @return Model
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getModel(string $brandId, string $modelId): Model
    {
        return $this->apiClient->itemRequest(
            ModelResponse::class,
            "brands/$brandId/models/$modelId",
        );
    }

    /**
     * @param string $brandId
     * @param string $modelId
     * @return Model[]
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getYears(string $brandId, string $modelId): iterable
    {
        return $this->apiClient->collectionRequest(
            YearsResponse::class,
            "brands/$brandId/models/$modelId/years",
        );
    }

    /**
     * @return Year[]
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function getYearsCsv($country = 'MX'): iterable
    {
        $years = $this->apiClient->csvRequest('years', ['query' => ['countryCode' => $country]]);

        foreach ($years as $year) {
            yield new Year($year['yearId'], $year['name'], new Model($year['modelId']));
        }
    }

    /**
     * @param string $brandId
     * @param string $modelId
     * @param string $yearId
     * @return Year
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getYear(string $brandId, string $modelId, string $yearId): Year
    {
        return $this->apiClient->itemRequest(
            YearResponse::class,
            "brands/$brandId/models/$modelId/years/$yearId",
        );
    }

    /**
     * @param string $brandId
     * @param string $modelId
     * @param string $yearId
     * @return Trim[]
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getTrims(string $brandId, string $modelId, string $yearId): iterable
    {
        return $this->apiClient->collectionRequest(
            TrimsResponse::class,
            "brands/$brandId/models/$modelId/years/$yearId/trims",
        );
    }

    /**
     * @return Trim[]
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     */

    public function getTrimsCsv($country = 'MX'): iterable
    {
        $trims = $this->apiClient->csvRequest('trims', ['query' => ['countryCode' => $country]]);

        foreach ($trims as $trim) {
            yield new Trim($trim['trimId'], $trim['name'], new Year($trim['yearId']));
        }
    }

    /**
     * @param string $brandId
     * @param string $modelId
     * @param string $yearId
     * @param string $trimId
     * @return Trim
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getTrim(string $brandId, string $modelId, string $yearId, string $trimId): Trim
    {
        return $this->apiClient->itemRequest(
            TrimResponse::class,
            "brands/$brandId/models/$modelId/years/$yearId/trims/$trimId",
        );
    }

    /**
     * @return Unit[]
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getUnits(): iterable
    {
        return $this->apiClient->paginatedRequest(UnitsResponse::class, 'units');
    }

    /**
     * @return Unit[]
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getInventoryUnits(): iterable
    {
        return $this->apiClient->paginatedRequest(UnitsResponse::class, 'inventory-units');
    }

    /**
     * @return Unit[]
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getSoldUnits(): iterable
    {
        return $this->apiClient->paginatedRequest(UnitsResponse::class, 'sold-units');
    }

    /**
     * @param string $id
     * @return Unit
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getUnit(string $id): Unit
    {
        return $this->apiClient->itemRequest(UnitResponse::class, 'units/' . $id);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function createMessage(string $channel, MessageInput $message): CreatedMessage
    {
        $channelKey = $this->channels[$channel];

        return $this->apiClient->itemRequest(CreatedMessageResponse::class, 'messages', 'POST', [
            'extra' => ['payload' => $message],
            'query' => ['apiKey' => $channelKey],
        ]);
    }

    public static function createDefault(string $apiKey, string $apiSecret): self
    {
        if (!class_exists(HttpClient::class)) {
            throw new LogicException(
                'You must install the Symfony HTTP Client component.' . PHP_EOL .
                'Please, execute "composer require symfony/http-client" in your project root'
            );
        }

        $httpClient = HttpClient::create([
            'base_uri' => 'https://app.intelimotor.com/api/',
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'query' => [
                'apiKey' => $apiKey,
                'apiSecret' => $apiSecret,
            ],
        ]);

        return new self($httpClient);
    }
}