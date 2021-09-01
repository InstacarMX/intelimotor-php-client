<?php

/*
 * Copyright (c) Instacar 2021. All rights reserved.
 */

namespace InstacarMX\IntelimotorApiClient\Test\Integration;

use Doctrine\Common\Annotations\AnnotationReader;
use InstacarMX\IntelimotorApiClient\IntelimotorClient;
use InstacarMX\IntelimotorApiClient\Model\Brand;
use InstacarMX\IntelimotorApiClient\Model\BusinessUnit;
use InstacarMX\IntelimotorApiClient\Model\Color;
use InstacarMX\IntelimotorApiClient\Model\IdNameTrait;
use InstacarMX\IntelimotorApiClient\Model\Model;
use InstacarMX\IntelimotorApiClient\Model\Trim;
use InstacarMX\IntelimotorApiClient\Model\Unit;
use InstacarMX\IntelimotorApiClient\Model\Year;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class IntelimotorClientTest extends TestCase
{
    private $client;
    /** @var string */
    private $businessUnitId;

    protected function setUp(): void
    {
        $httpClient = HttpClient::create();
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
        $nameConverter = new MetadataAwareNameConverter($classMetadataFactory);
        $propertyTypeExtractor = new ReflectionExtractor();
        $serializer = new Serializer(
            [
                new ObjectNormalizer($classMetadataFactory, $nameConverter, null, $propertyTypeExtractor),
                new ArrayDenormalizer(),
            ],
            ['json' => new JsonEncoder()],
        );

        $this->client = new IntelimotorClient($_SERVER['API_KEY'], $_SERVER['API_SECRET'], $httpClient, $serializer);
    }

    public function testBusinessUnits(): BusinessUnit
    {
        $businessUnits = $this->client->getBusinessUnits();

        return $this->assertCollection(BusinessUnit::class, $businessUnits, [$this, 'assertIdName']);
    }

    /**
     * @depends testBusinessUnits
     */
    public function testBusinessUnit(BusinessUnit $original): void
    {
        $businessUnit = $this->client->getBusinessUnit($original->getId());

        $this->assertItem(BusinessUnit::class, $businessUnit, [$this, 'assertIdName']);
    }

    public function testColors(): Color
    {
        $collection = $this->client->getColors();

        return $this->assertCollection(Color::class, $collection, [$this, 'assertIdName']);
    }

    public function testColorsCsv()
    {
        $collection = $this->client->getColorsCsv();

        $this->assertCollection(Color::class, $collection, [$this, 'assertIdName'], true);
    }

    /**
     * @depends testColors
     */
    public function testColor(Color $color): void
    {
        $item = $this->client->getColor($color->getId());

        $this->assertItem(Color::class, $item, [$this, 'assertIdName']);
    }

    public function testBrands(): Brand
    {
        $brands = $this->client->getBrands();

        return $this->assertCollection(Brand::class, $brands, [$this, 'assertIdName']);
    }

    public function testBrandsCsv(): void
    {
        $brands = $this->client->getBrandsCsv();

        $this->assertCollection(Brand::class, $brands, [$this, 'assertIdName'], true);
    }

    /**
     * @depends testBrands
     */
    public function testBrand(Brand $original): void
    {
        $brand = $this->client->getBrand($original->getId());

        $this->assertItem(Brand::class, $brand, [$this, 'assertIdName']);
    }

    /**
     * @depends testBrands
     */
    public function testModels(Brand $brand): Model
    {
        $models = $this->client->getModels($brand->getId());

        return $this->assertCollection(Model::class, $models, [$this, 'assertIdName']);
    }

    public function testModelsCsv(): void
    {
        $models = $this->client->getModelsCsv();

        $this->assertCollection(Model::class, $models, [$this, 'assertIdName'], true);
    }

    /**
     * @depends testBrands
     * @depends testModels
     */
    public function testModel(Brand $brand, Model $model): void
    {
        $item = $this->client->getModel($brand->getId(), $model->getId());

        $this->assertItem(Model::class, $item, [$this, 'assertIdName']);
    }

    /**
     * @depends testBrands
     * @depends testModels
     */
    public function testYears(Brand $brand, Model $model): Year
    {
        $collection = $this->client->getYears($brand->getId(), $model->getId());

        return $this->assertCollection(Year::class, $collection, [$this, 'assertIdName']);
    }

    public function testYearsCsv(): void
    {
        $collection = $this->client->getYearsCsv();

        $this->assertCollection(Year::class, $collection, [$this, 'assertIdName'], true);
    }

    /**
     * @depends testBrands
     * @depends testModels
     * @depends testYears
     */
    public function testYear(Brand $brand, Model $model, Year $year): void
    {
        $item = $this->client->getYear($brand->getId(), $model->getId(), $year->getId());

        $this->assertItem(Year::class, $item, [$this, 'assertIdName']);
    }

    /**
     * @depends testBrands
     * @depends testModels
     * @depends testYears
     */
    public function testTrims(Brand $brand, Model $model, Year $year): Trim
    {
        $collection = $this->client->getTrims($brand->getId(), $model->getId(), $year->getId());

        return $this->assertCollection(Trim::class, $collection, [$this, 'assertIdName']);
    }

    public function testTrimsCsv(): void
    {
        $collection = $this->client->getTrimsCsv();

        $this->assertCollection(Trim::class, $collection, [$this, 'assertIdName'], true);
    }

    /**
     * @depends testBrands
     * @depends testModels
     * @depends testYears
     * @depends testTrims
     */
    public function testTrim(Brand $brand, Model $model, Year $year, Trim $trim): void
    {
        $item = $this->client->getTrim($brand->getId(), $model->getId(), $year->getId(), $trim->getId());

        $this->assertItem(Trim::class, $item, [$this, 'assertIdName']);
    }

    public function testUnits(): Unit
    {
        $collection = $this->client->getUnits();

        return $this->assertCollection(Unit::class, $collection, [$this, 'assertUnit']);
    }

    /**
     * @depends testUnits
     */
    public function testUnit(Unit $unit): void
    {
        $item = $this->client->getUnit($unit->getId());

        $this->assertItem(Unit::class, $item, [$this, 'assertUnit']);
    }

    private function assertCollection(
        string $className,
        $collection,
        callable $extraAssertions,
        bool $earlyStop = false
    ) {
        $this->assertIsIterable($collection);

        $i = 0;
        $first = null;
        foreach ($collection as $item) {
            if ($earlyStop && ++$i >= 10) {
                break;
            }
            if (!$first) {
                $first = $item;
            }

            $this->assertItem($className, $item, $extraAssertions);
        }

        $this->assertNotNull($first, 'The collection must have at least one item');
        return $first;
    }

    private function assertItem(string $className, $item, callable $extraAssertions): void
    {
        $this->assertNotNull($item);
        $this->assertInstanceOf($className, $item);
        $extraAssertions($item);
    }

    /**
     * @param object|IdNameTrait $data
     */
    private function assertIdName(object $data): void
    {
        $id = $data->getId();
        $name = $data->getName();

        $this->assertNotNull($id);
        $this->assertIsString($id);
        $this->assertNotNull($name);
        $this->assertIsString($name);
    }

    private function assertUnit(Unit $unit): void
    {
        $id = $unit->getId();
        $ref = $unit->getRef();
        $vin = $unit->getVin();

        $this->assertNotNull($id);
        $this->assertIsString($id);

        if ($ref !== null) {
            $this->assertIsString($ref);
        }
        if ($vin !== null) {
            $this->assertIsString($vin);
        }
    }
}
