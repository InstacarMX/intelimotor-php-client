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

namespace Instacar\IntelimotorApiClient\Test\Unit;

use Instacar\IntelimotorApiClient\IntelimotorClient;
use Instacar\IntelimotorApiClient\Model\Brand;
use Instacar\IntelimotorApiClient\Model\BusinessUnit;
use Instacar\IntelimotorApiClient\Model\Color;
use Instacar\IntelimotorApiClient\Model\Model;
use Instacar\IntelimotorApiClient\Model\Trim;
use Instacar\IntelimotorApiClient\Model\Unit;
use Instacar\IntelimotorApiClient\Model\Year;
use Instacar\IntelimotorApiClient\Test\Fixtures\FixturesResponseFactory;
use Instacar\IntelimotorApiClient\Test\Util\ArrayUtil;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Psr18Client;

class IntelimotorClientTest extends TestCase
{
    private IntelimotorClient $client;

    protected function setUp(): void
    {
        $httpClient = new MockHttpClient(new FixturesResponseFactory());
        $psr18Client = new Psr18Client($httpClient);
        $psr17Factory = new Psr17Factory();

        $this->client = new IntelimotorClient($psr18Client, $psr17Factory, $psr17Factory, 'api-key', 'api-secret');
    }

    public function testBusinessUnits(): void
    {
        $businessUnits = ArrayUtil::fromIterable($this->client->getBusinessUnits());
        $this->assertCount(3, $businessUnits);

        /** @var BusinessUnit $businessUnit1 */
        $businessUnit1 = $businessUnits[0];
        $this->assertEquals('5cc335590b04d10096fd5ad7', $businessUnit1->getId());
        $this->assertEquals('Pruebas', $businessUnit1->getName());

        /** @var BusinessUnit $businessUnit2 */
        $businessUnit2 = $businessUnits[1];
        $this->assertEquals('5eed0d65700040001a27059f', $businessUnit2->getId());
        $this->assertEquals('Agencia 2', $businessUnit2->getName());

        /** @var BusinessUnit $businessUnit3 */
        $businessUnit3 = $businessUnits[2];
        $this->assertEquals('5eed0d8a2c0784001afc53a7', $businessUnit3->getId());
        $this->assertEquals('Agencia 3', $businessUnit3->getName());
    }

    public function testBusinessUnit(): void
    {
        $businessUnit = $this->client->getBusinessUnit('5cc335590b04d10096fd5ad7');
        $this->assertEquals('5cc335590b04d10096fd5ad7', $businessUnit->getId());
        $this->assertEquals('Pruebas', $businessUnit->getName());
    }

    public function testUnits(): void
    {
        $units = ArrayUtil::fromIterable($this->client->getUnits());
        $this->assertCount(1, $units);

        /** @var Unit $unit */
        $unit = $units[0];
        $this->assertEquals('5ebc29a66912cb0013fb73bc', $unit->getId());

        // Business Unit
        // $businessUnit = $unit->getBusinessUnit();
        // $this->assertEquals('5cc335590b04d10096fd5ad7', $businessUnit->getId());
        // $this->assertEquals('Pruebas', $businessUnit->getName());

        $this->assertNull($unit->getRef());
        $this->assertNull($unit->getVin());

        // Brands
        $brands = ArrayUtil::fromIterable($unit->getBrands());
        $this->assertCount(1, $brands);

        /** @var Brand $brand1 */
        $brand = $brands[0];
        $this->assertEquals('5cdc48b7a6ca044a76082268', $brand->getId());
        $this->assertEquals('Audi', $brand->getName());

        // Models
        $models = ArrayUtil::fromIterable($unit->getModels());
        $this->assertCount(1, $models);

        /** @var Model $model */
        $model = $models[0];
        $this->assertEquals('5cdc48bfa6ca044a76082305', $model->getId());
        $this->assertEquals('A4', $model->getName());

        // Years
        $years = ArrayUtil::fromIterable($unit->getYears());
        $this->assertCount(1, $years);

        /** @var Year $year */
        $year = $years[0];
        $this->assertEquals('5cdc48bfa6ca044a76082307', $year->getId());
        $this->assertEquals('2018', $year->getName());

        // Trims
        $trims = ArrayUtil::fromIterable($unit->getTrims());
        $this->assertCount(1, $trims);

        /** @var Trim $trim */
        $trim = $trims[0];
        $this->assertEquals('5d4dd3c3bb4c2a4e9abf981d', $trim->getId());
        $this->assertEquals('2.0 Elite Quattro At', $trim->getName());

        $this->assertFalse($unit->hasCustomTrim());
        $this->assertNull($unit->getCustomTrim());
        $this->assertEquals(20_000, $unit->getKms());
        $this->assertEquals('owned', $unit->getType());
        $this->assertNull($unit->getConsignmentFeeType());
        $this->assertNull($unit->getConsignmentFee());
        $this->assertEquals(300_000, $unit->getBuyPrice());
        // $this->assertNull($unit->getBuyPriceIva());
        $this->assertEqualsWithDelta(1589389715.928, $unit->getBuyDate()?->getTimestamp(), 1);
        $this->assertEquals(400_000, $unit->getListPrice());
        $this->assertTrue($unit->isSold());
        $this->assertEquals(300_000, $unit->getSellPrice());
        $this->assertEqualsWithDelta(1650471377.500, $unit->getSellDate()?->getTimestamp(), 1);
        $this->assertEquals('vivanuncios', $unit->getSellChannel());
        $this->assertEquals('626031e0052a660d206f1e52', $unit->getProspectId());

        // Stats
        // $stats = $unit->getStats();
        // $this->assertCount(3, $stats);

        // Pictures
        $pictures = ArrayUtil::fromIterable($unit->getPictures());
        $this->assertCount(0, $pictures);

        // Listing Info
        $this->assertNull($unit->getListingInfo());

        // Ads
        // $ads = $unit->getAds();

        // Custom Values
        // $customValues = ArrayUtil::fromIterable($unit->getCustomValues());
        // $this->assertCount(0, $customValues);

        $this->assertTrue($unit->isImported());
        $this->assertFalse($unit->isExternalCatalog());
        $this->assertNull($unit->getExternalBrand());
        $this->assertNull($unit->getExternalModel());
        $this->assertNull($unit->getExternalYear());
        $this->assertNull($unit->getExternalTrim());
    }

    public function testInventoryUnits(): void
    {
        $units = ArrayUtil::fromIterable($this->client->getInventoryUnits());
        $this->assertCount(1, $units);

        /** @var Unit $unit */
        $unit = $units[0];
        $this->assertEquals('62a262142437e52e05543aaa', $unit->getId());

        // Business Unit
        // $businessUnit = $unit->getBusinessUnit();
        // $this->assertEquals('5cc335590b04d10096fd5ad7', $businessUnit->getId());
        // $this->assertEquals('Pruebas', $businessUnit->getName());

        $this->assertNull($unit->getRef());
        $this->assertEquals('4T2GB11E6SU049411', $unit->getVin());

        // Brands
        $brands = ArrayUtil::fromIterable($unit->getBrands());
        $this->assertCount(1, $brands);

        /** @var Brand $brand1 */
        $brand = $brands[0];
        $this->assertEquals('5cdc48b7a6ca044a76082268', $brand->getId());
        $this->assertEquals('Audi', $brand->getName());

        // Models
        $models = ArrayUtil::fromIterable($unit->getModels());
        $this->assertCount(1, $models);

        /** @var Model $model */
        $model = $models[0];
        $this->assertEquals('5cdc48bfa6ca044a76082305', $model->getId());
        $this->assertEquals('A4', $model->getName());

        // Years
        $years = ArrayUtil::fromIterable($unit->getYears());
        $this->assertCount(1, $years);

        /** @var Year $year */
        $year = $years[0];
        $this->assertEquals('5cdc48bfa6ca044a76082307', $year->getId());
        $this->assertEquals('2018', $year->getName());

        // Trims
        $trims = ArrayUtil::fromIterable($unit->getTrims());
        $this->assertCount(1, $trims);

        /** @var Trim $trim */
        $trim = $trims[0];
        $this->assertEquals('5d4dd3c5bb4c2a4e9abf9829', $trim->getId());
        $this->assertEquals('2.0 S Line Quattro At', $trim->getName());

        $this->assertFalse($unit->hasCustomTrim());
        $this->assertNull($unit->getCustomTrim());
        $this->assertEquals(20_000, $unit->getKms());
        $this->assertEquals('owned', $unit->getType());
        $this->assertNull($unit->getConsignmentFeeType());
        $this->assertNull($unit->getConsignmentFee());
        $this->assertEquals(909_000, $unit->getBuyPrice());
        // $this->assertNull($unit->getBuyPriceIva());
        $this->assertEqualsWithDelta(1654809079.939, $unit->getBuyDate()?->getTimestamp(), 1);
        $this->assertEquals(900_000, $unit->getListPrice());
        $this->assertFalse($unit->isSold());
        $this->assertNull($unit->getSellPrice());
        $this->assertNull($unit->getSellDate());
        $this->assertNull($unit->getSellChannel());
        $this->assertNull($unit->getProspectId());

        // Stats
        // $stats = $unit->getStats();
        // $this->assertCount(3, $stats);

        // Pictures
        $pictures = ArrayUtil::fromIterable($unit->getPictures());
        $this->assertCount(4, $pictures);
        $this->assertEquals('70ba0e03-38ad-416d-87f0-12000503f043.jpeg', $pictures[0]);
        $this->assertEquals('006f96e1-706d-42f4-96e5-c51ea67e8946.jpeg', $pictures[1]);
        $this->assertEquals('18c9f212-32b1-437d-ba5d-ffe397d1a61a.jpeg', $pictures[2]);
        $this->assertEquals('61c710b9-9f16-4e43-9760-78dccac218d2.jpeg', $pictures[3]);

        // Listing Info
        $listingInfo = $unit->getListingInfo();
        $this->assertEquals('Audi A4 2018 2.0 S Line Quattro At', $listingInfo->getTitle());
        // $this->assertEquals('Audi', $listingInfo->getBrand());
        // $this->assertEquals('A4', $listingInfo->getModel());
        // $this->assertEquals('2018', $listingInfo->getYear());
        // $this->assertEquals('2.0 S Line Quattro At', $listingInfo->getTrim());
        $this->assertEquals('Automática', $listingInfo->getTransmission());
        $this->assertEquals(4, $listingInfo->getDoors());
        $this->assertEquals('Gasolina', $listingInfo->getFuelType());
        $this->assertEquals('Eléctrica', $listingInfo->getSteering());
        $this->assertEquals('4x4', $listingInfo->getTractionControl());
        $this->assertEquals('Sedán', $listingInfo->getVehicleBodyType());
        $this->assertEquals('2.0', $listingInfo->getEngine());
        $this->assertEquals('Café', $listingInfo->getExteriorColor());
        $this->assertEquals('Azul marino', $listingInfo->getInteriorColor());
        // $this->assertEquals('', $listingInfo->getLicensePlate());
        // $this->assertEquals('4T1GB11E6SU049411', $listingInfo->getVin());
        // $this->assertEquals('', $listingInfo->getGummy());
        // $this->assertEquals('', $listingInfo->getHologram());
        $this->assertFalse($listingInfo->hasAutopilot());
        $this->assertFalse($listingInfo->hasLightOnReminder());
        $this->assertTrue($listingInfo->hasOnboardComputer());
        $this->assertFalse($listingInfo->hasRearFoldingSeat());
        $this->assertTrue($listingInfo->hasSlidingRoof());
        $this->assertFalse($listingInfo->hasXenonHeadlights());
        $this->assertFalse($listingInfo->hasCoasters());
        $this->assertFalse($listingInfo->hasClimateControl());
        $this->assertTrue($listingInfo->hasAbsBrakes());
        $this->assertFalse($listingInfo->hasAlarm());
        $this->assertTrue($listingInfo->hasAlloyWheels());
        $this->assertFalse($listingInfo->hasDriverAirbag());
        $this->assertFalse($listingInfo->hasElectronicBrakeAssist());
        $this->assertFalse($listingInfo->hasEngineInmovilizer());
        $this->assertFalse($listingInfo->hasFogLight());
        $this->assertFalse($listingInfo->hasFrontFoglights());
        $this->assertTrue($listingInfo->hasPassengerAirbag());
        $this->assertTrue($listingInfo->hasRainSensor());
        $this->assertFalse($listingInfo->hasRearFoglights());
        $this->assertFalse($listingInfo->hasRearWindowDefogger());
        $this->assertFalse($listingInfo->hasRollBar());
        $this->assertFalse($listingInfo->hasSideImpactAirbag());
        $this->assertTrue($listingInfo->hasStabilityControl());
        $this->assertTrue($listingInfo->hasSteeringWheelControl());
        $this->assertFalse($listingInfo->hasThirdStop());
        $this->assertFalse($listingInfo->hasCurtainAirbag());
        $this->assertFalse($listingInfo->isArmored());
        $this->assertTrue($listingInfo->hasAirConditioning());
        $this->assertFalse($listingInfo->hasElectricMirrors());
        $this->assertFalse($listingInfo->hasGps());
        $this->assertFalse($listingInfo->hasHeadlightControl());
        $this->assertFalse($listingInfo->hasHeadrestRearSeat());
        $this->assertFalse($listingInfo->hasHeightAdjustableDriverSeat());
        $this->assertTrue($listingInfo->hasLeatherUpholstery());
        $this->assertFalse($listingInfo->hasLightSensor());
        $this->assertFalse($listingInfo->hasPaintedBumper());
        $this->assertTrue($listingInfo->hasParkingSensor());
        $this->assertTrue($listingInfo->hasPowerWindows());
        $this->assertFalse($listingInfo->hasRemoteTrunkRelease());
        $this->assertFalse($listingInfo->hasElectricSeats());
        $this->assertFalse($listingInfo->hasRearBackrest());
        $this->assertFalse($listingInfo->hasCentralPowerDoorLocks());
        $this->assertTrue($listingInfo->hasAmfmRadio());
        $this->assertFalse($listingInfo->hasBluetooth());
        $this->assertFalse($listingInfo->hasCdPlayer());
        $this->assertFalse($listingInfo->hasDvd());
        $this->assertTrue($listingInfo->hasMp3Player());
        $this->assertFalse($listingInfo->hasSdCard());
        $this->assertTrue($listingInfo->hasUsb());
        $this->assertFalse($listingInfo->hasBullBar());
        $this->assertFalse($listingInfo->hasSpareTyreSupport());
        $this->assertFalse($listingInfo->hasTrayCover());
        $this->assertFalse($listingInfo->hasTrayMat());
        $this->assertFalse($listingInfo->hasWindscreenWiper());
        $this->assertFalse($listingInfo->isSingleOwner());
        // $this->assertEquals('', $listingInfo->getYoutubeVideoUrl());

        // Listing Pictures
        // $listingPictures = ArrayUtil::fromIterable($listingInfo->getPictures());
        // $this->assertCount(4, $listingPictures);
        // $this->assertEquals('https://intelimotor.s3.amazonaws.com/70ba0e03-38ad-416d-87f0-12000503f043.jpeg', $listingPictures[0]);
        // $this->assertEquals('https://intelimotor.s3.amazonaws.com/006f96e1-706d-42f4-96e5-c51ea67e8946.jpeg', $listingPictures[1]);
        // $this->assertEquals('https://intelimotor.s3.amazonaws.com/18c9f212-32b1-437d-ba5d-ffe397d1a61a.jpeg', $listingPictures[2]);
        // $this->assertEquals('https://intelimotor.s3.amazonaws.com/61c710b9-9f16-4e43-9760-78dccac218d2.jpeg', $listingPictures[3]);

        // $this->assertNull($listingInfo->getSpincarId());
        // $this->assertNull($listingInfo->getSpincarUrl());

        // Ads
        // $ads = $unit->getAds();

        // Custom Values
        // $customValues = ArrayUtil::fromIterable($unit->getCustomValues());
        // $this->assertCount(1, $customValues);

        $this->assertTrue($unit->isImported());
        $this->assertFalse($unit->isExternalCatalog());
        $this->assertNull($unit->getExternalBrand());
        $this->assertNull($unit->getExternalModel());
        $this->assertNull($unit->getExternalYear());
        $this->assertNull($unit->getExternalTrim());
    }

    public function testBrands(): void
    {
        $brands = ArrayUtil::fromIterable($this->client->getBrands());
        $this->assertCount(4, $brands);

        /** @var Brand $brand1 */
        $brand1 = $brands[0];
        $this->assertEquals('5cdc488ba6ca044a76082150', $brand1->getId());
        $this->assertEquals('Acura', $brand1->getName());

        /** @var Brand $brand2 */
        $brand2 = $brands[1];
        $this->assertEquals('5cdc489da6ca044a760821cf', $brand2->getId());
        $this->assertEquals('Alfa Romeo', $brand2->getName());

        /** @var Brand $brand3 */
        $brand3 = $brands[2];
        $this->assertEquals('5cdc48a9a6ca044a76082221', $brand3->getId());
        $this->assertEquals('Aston Martin', $brand3->getName());

        /** @var Brand $brand4 */
        $brand4 = $brands[3];
        $this->assertEquals('5cdc48b7a6ca044a76082268', $brand4->getId());
        $this->assertEquals('Audi', $brand4->getName());
    }

    public function testBrand(): void
    {
        $brand = $this->client->getBrand('5cdc488ba6ca044a76082150');
        $this->assertEquals('5cdc488ba6ca044a76082150', $brand->getId());
        $this->assertEquals('Acura', $brand->getName());
    }

    public function testModels(): void
    {
        $models = ArrayUtil::fromIterable($this->client->getModels('5cdc488ba6ca044a76082150'));
        $this->assertCount(10, $models);

        /** @var Model $model1 */
        $model1 = $models[0];
        $this->assertEquals('5cdc488ca6ca044a76082151', $model1->getId());
        $this->assertEquals('ILX', $model1->getName());

        /** @var Model $model2 */
        $model2 = $models[1];
        $this->assertEquals('5cdc488da6ca044a7608215c', $model2->getId());
        $this->assertEquals('MDX', $model2->getName());

        /** @var Model $model3 */
        $model3 = $models[2];
        $this->assertEquals('5cdc4891a6ca044a76082170', $model3->getId());
        $this->assertEquals('NSX', $model3->getName());

        /** @var Model $model4 */
        $model4 = $models[3];
        $this->assertEquals('5cdc4892a6ca044a76082177', $model4->getId());
        $this->assertEquals('RDX', $model4->getName());

        /** @var Model $model5 */
        $model5 = $models[4];
        $this->assertEquals('5cdc4894a6ca044a7608218c', $model5->getId());
        $this->assertEquals('RL', $model5->getName());

        /** @var Model $model6 */
        $model6 = $models[5];
        $this->assertEquals('5cdc4896a6ca044a76082199', $model6->getId());
        $this->assertEquals('RLX', $model6->getName());

        /** @var Model $model7 */
        $model7 = $models[6];
        $this->assertEquals('5cdc4897a6ca044a7608219e', $model7->getId());
        $this->assertEquals('TL', $model7->getName());

        /** @var Model $model8 */
        $model8 = $models[7];
        $this->assertEquals('5cdc489aa6ca044a760821b1', $model8->getId());
        $this->assertEquals('TLX', $model8->getName());

        /** @var Model $model9 */
        $model9 = $models[8];
        $this->assertEquals('5cdc489ba6ca044a760821bc', $model9->getId());
        $this->assertEquals('TSX', $model9->getName());

        /** @var Model $model10 */
        $model10 = $models[9];
        $this->assertEquals('5cdc489ca6ca044a760821c9', $model10->getId());
        $this->assertEquals('ZDX', $model10->getName());
    }

    public function testModel(): void
    {
        $model = $this->client->getModel('5cdc488ba6ca044a76082150', '5cdc488ca6ca044a76082151');
        $this->assertEquals('5cdc488ca6ca044a76082151', $model->getId());
        $this->assertEquals('ILX', $model->getName());
    }

    public function testYears(): void
    {
        $years = ArrayUtil::fromIterable($this->client->getYears('5cdc488ba6ca044a76082150', '5cdc488ca6ca044a76082151'));
        $this->assertCount(9, $years);

        /** @var Year $year1 */
        $year1 = $years[0];
        $this->assertEquals('5d5ba8d09f10a4006a416ea9', $year1->getId());
        $this->assertEquals('2020', $year1->getName());

        /** @var Year $year2 */
        $year2 = $years[1];
        $this->assertEquals('5cdc488ca6ca044a76082152', $year2->getId());
        $this->assertEquals('2019', $year2->getName());

        /** @var Year $year3 */
        $year3 = $years[2];
        $this->assertEquals('5cdc488ca6ca044a76082153', $year3->getId());
        $this->assertEquals('2018', $year3->getName());

        /** @var Year $year4 */
        $year4 = $years[3];
        $this->assertEquals('5cdc488ca6ca044a76082154', $year4->getId());
        $this->assertEquals('2017', $year4->getName());

        /** @var Year $year5 */
        $year5 = $years[4];
        $this->assertEquals('5cdc488ca6ca044a76082155', $year5->getId());
        $this->assertEquals('2016', $year5->getName());

        /** @var Year $year6 */
        $year6 = $years[5];
        $this->assertEquals('5cdc488ca6ca044a76082156', $year6->getId());
        $this->assertEquals('2015', $year6->getName());

        /** @var Year $year7 */
        $year7 = $years[6];
        $this->assertEquals('5cdc488ca6ca044a76082157', $year7->getId());
        $this->assertEquals('2014', $year7->getName());

        /** @var Year $year8 */
        $year8 = $years[7];
        $this->assertEquals('5cdc488ca6ca044a76082158', $year8->getId());
        $this->assertEquals('2013', $year8->getName());

        /** @var Year $year9 */
        $year9 = $years[8];
        $this->assertEquals('5d5ba8d09f10a4006a416eae', $year9->getId());
        $this->assertEquals('2012', $year9->getName());
    }

    public function testYear(): void
    {
        $year = $this->client->getYear('5cdc488ba6ca044a76082150', '5cdc488ca6ca044a76082151', '5d5ba8d09f10a4006a416ea9');
        $this->assertEquals('5d5ba8d09f10a4006a416ea9', $year->getId());
        $this->assertEquals('2020', $year->getName());
    }

    public function testTrims(): void
    {
        $trims = ArrayUtil::fromIterable($this->client->getTrims('5cdc488ba6ca044a76082150', '5cdc488ca6ca044a76082151', '5d5ba8d09f10a4006a416ea9'));
        $this->assertCount(2, $trims);

        /** @var Trim $trim1 */
        $trim1 = $trims[0];
        $this->assertEquals('5e726acba8e84900133e5136', $trim1->getId());
        $this->assertEquals('2.4 A-spec At', $trim1->getName());

        /** @var Trim $trim2 */
        $trim2 = $trims[1];
        $this->assertEquals('5e726acf98c40c00137181f3', $trim2->getId());
        $this->assertEquals('2.4 Tech At', $trim2->getName());
    }

    public function testTrim(): void
    {
        $trim = $this->client->getTrim('5cdc488ba6ca044a76082150', '5cdc488ca6ca044a76082151', '5d5ba8d09f10a4006a416ea9', '5e726acf98c40c00137181f3');
        $this->assertEquals('5e726acf98c40c00137181f3', $trim->getId());
        $this->assertEquals('2.4 Tech At', $trim->getName());
    }

    public function testColors(): void
    {
        $colors = ArrayUtil::fromIterable($this->client->getColors());
        $this->assertCount(5, $colors);

        /** @var Color $color1 */
        $color1 = $colors[0];
        $this->assertEquals('5ce850dd045e5d03040c6a5c', $color1->getId());
        $this->assertEquals('Agua', $color1->getName());

        /** @var Color $color2 */
        $color2 = $colors[1];
        $this->assertEquals('5ce850dd045e5d03040c6a5d', $color2->getId());
        $this->assertEquals('Amarillo', $color2->getName());

        /** @var Color $color3 */
        $color3 = $colors[2];
        $this->assertEquals('5ce850dd045e5d03040c6a5e', $color3->getId());
        $this->assertEquals('Azul', $color3->getName());

        /** @var Color $color4 */
        $color4 = $colors[3];
        $this->assertEquals('5ce850dd045e5d03040c6a5f', $color4->getId());
        $this->assertEquals('Azul acero', $color4->getName());

        /** @var Color $color5 */
        $color5 = $colors[4];
        $this->assertEquals('5ce850dd045e5d03040c6a60', $color5->getId());
        $this->assertEquals('Azul claro', $color5->getName());
    }

    public function testColor(): void
    {
        $color = $this->client->getColor('5ce850dd045e5d03040c6a5c');
        $this->assertEquals('5ce850dd045e5d03040c6a5c', $color->getId());
        $this->assertEquals('Agua', $color->getName());
    }
}