<?php

/*
 * Copyright (c) Instacar 2021. All rights reserved.
 */

namespace InstacarMX\IntelimotorApiClient;

use InstacarMX\IntelimotorApiClient\Model\Brand;
use InstacarMX\IntelimotorApiClient\Model\BusinessUnit;
use InstacarMX\IntelimotorApiClient\Model\Color;
use InstacarMX\IntelimotorApiClient\Model\Model;
use InstacarMX\IntelimotorApiClient\Model\Trim;
use InstacarMX\IntelimotorApiClient\Model\Unit;
use InstacarMX\IntelimotorApiClient\Model\Year;
use InstacarMX\IntelimotorApiClient\Response\BrandResponse;
use InstacarMX\IntelimotorApiClient\Response\BrandsResponse;
use InstacarMX\IntelimotorApiClient\Response\BusinessUnitResponse;
use InstacarMX\IntelimotorApiClient\Response\BusinessUnitsResponse;
use InstacarMX\IntelimotorApiClient\Response\ColorResponse;
use InstacarMX\IntelimotorApiClient\Response\ColorsResponse;
use InstacarMX\IntelimotorApiClient\Response\ModelResponse;
use InstacarMX\IntelimotorApiClient\Response\ModelsResponse;
use InstacarMX\IntelimotorApiClient\Response\TrimResponse;
use InstacarMX\IntelimotorApiClient\Response\TrimsResponse;
use InstacarMX\IntelimotorApiClient\Response\UnitResponse;
use InstacarMX\IntelimotorApiClient\Response\UnitsResponse;
use InstacarMX\IntelimotorApiClient\Response\YearResponse;
use InstacarMX\IntelimotorApiClient\Response\YearsResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class IntelimotorClient
{
    /** @var HttpClient */
    private $client;

    /**
     * @param string $apiKey
     * @param string $apiSecret
     * @param HttpClientInterface $client
     * @param SerializerInterface $serializer
     */
    public function __construct(
        string $apiKey,
        string $apiSecret,
        HttpClientInterface $client,
        SerializerInterface $serializer
    ) {
        $apiClient = $client->withOptions([
            'base_uri' => 'https://app.intelimotor.com/api/',
            'query' => [
                'apiKey' => $apiKey,
                'apiSecret' => $apiSecret,
            ],
        ]);

        $this->client = new HttpClient($apiClient, $serializer);
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
        return $this->client->collectionRequest(
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
        return $this->client->itemRequest(
            BusinessUnitResponse::class,
            "business-units/$businessUnitId",
        );
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
        return $this->client->collectionRequest(
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
        $colors = $this->client->csvRequest('colors');

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
        return $this->client->itemRequest(
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
        return $this->client->collectionRequest(
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
        $brands = $this->client->csvRequest('brands', ['query' => ['countryCode' => $country]]);

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
        return $this->client->itemRequest(
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
        return $this->client->collectionRequest(
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
        $models = $this->client->csvRequest('models', ['query' => ['countryCode' => $country]]);

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
        return $this->client->itemRequest(
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
        return $this->client->collectionRequest(
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
        $years = $this->client->csvRequest('years', ['query' => ['countryCode' => $country]]);

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
        return $this->client->itemRequest(
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
        return $this->client->collectionRequest(
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
        $trims = $this->client->csvRequest('trims', ['query' => ['countryCode' => $country]]);

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
        return $this->client->itemRequest(
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
        return $this->client->paginatedRequest(UnitsResponse::class, 'units');
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
        return $this->client->itemRequest(UnitResponse::class, 'units/' . $id);
    }
}
