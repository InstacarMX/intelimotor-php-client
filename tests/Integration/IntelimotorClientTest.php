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

namespace Instacar\IntelimotorApiClient\Test\Integration;

use Instacar\IntelimotorApiClient\IntelimotorClient;
use Instacar\IntelimotorApiClient\Model\Ad;
use Instacar\IntelimotorApiClient\Model\Brand;
use Instacar\IntelimotorApiClient\Model\BusinessUnit;
use Instacar\IntelimotorApiClient\Model\Color;
use Instacar\IntelimotorApiClient\Model\CreatedMessage;
use Instacar\IntelimotorApiClient\Model\IdNameTrait;
use Instacar\IntelimotorApiClient\Model\MessageInput;
use Instacar\IntelimotorApiClient\Model\Model;
use Instacar\IntelimotorApiClient\Model\ProspectInput;
use Instacar\IntelimotorApiClient\Model\Trim;
use Instacar\IntelimotorApiClient\Model\Unit;
use Instacar\IntelimotorApiClient\Model\Year;
use PHPUnit\Framework\TestCase;

class IntelimotorClientTest extends TestCase
{
    private $client;

    protected function setUp(): void
    {
        $this->client = IntelimotorClient::createDefault($_SERVER['API_KEY'], $_SERVER['API_SECRET']);
        $this->client->setChannels([
            'contact' => $_SERVER['CHANNEL_KEY']
        ]);
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

    /**
     * @depends testBusinessUnits
     */
    public function testBusinessUnitUnits(BusinessUnit $original): Unit
    {
        $collection = $this->client->getBusinessUnitUnits($original->getId());

        return $this->assertCollection(Unit::class, $collection, [$this, 'assertUnit']);
    }

    /**
     * @depends testBusinessUnits
     */
    public function testBusinessUnitInventoryUnits(BusinessUnit $original): Unit
    {
        $collection = $this->client->getBusinessUnitInventoryUnits($original->getId());

        return $this->assertCollection(Unit::class, $collection, [$this, 'assertUnit']);
    }

    /**
     * @depends testBusinessUnits
     */
    public function testBusinessUnitSoldUnits(BusinessUnit $original): Unit
    {
        $collection = $this->client->getBusinessUnitSoldUnits($original->getId());

        return $this->assertCollection(Unit::class, $collection, [$this, 'assertUnit']);
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

    public function testInventoryUnits(): Unit
    {
        $collection = $this->client->getInventoryUnits();

        return $this->assertCollection(Unit::class, $collection, [$this, 'assertUnit']);
    }

    public function testSoldUnits(): Unit
    {
        $collection = $this->client->getSoldUnits();

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

    public function testNewMessage(): void
    {
        $ad = new Ad('test', 'https://test.org');
        $prospect = new ProspectInput('Test', 'test@ci.com', '1234567890', 'This is an automated test');
        $message = new MessageInput($ad, $prospect);

        $item = $this->client->createMessage('contact', $message);

        $this->assertItem(CreatedMessage::class, $item, function (CreatedMessage $item) {
            $this->assertNotNull($item->getId());
            $this->assertNotNull($item->getProspectId());
        });
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
