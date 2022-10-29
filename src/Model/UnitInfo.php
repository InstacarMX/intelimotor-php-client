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

namespace Instacar\IntelimotorApiClient\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\SerializedName;

class UnitInfo
{
    /**
     * @var string|null
     */
    private $title;

    /**
     * @var string
     */
    private $brand;

    /**
     * @var string
     */
    private $model;

    /**
     * @var string
     */
    private $year;

    /**
     * @var string
     */
    private $trim;

    /**
     * @var string|null
     */
    private $transmission;

    /**
     * @var int|null
     */
    private $doors;

    /**
     * @var string|null
     */
    private $fuelType;

    /**
     * @var string|null
     */
    private $steering;

    /**
     * @var string|null
     */
    private $tractionControl;

    /**
     * @var string|null
     */
    private $vehicleBodyType;

    /**
     * @var string|null
     */
    private $engine;

    /**
     * @var string|null
     */
    private $exteriorColor;

    /**
     * @var string|null
     */
    private $interiorColor;

    /**
     * @var string
     */
    private $licensePlate;

    /**
     * @var string
     */
    private $vin;

    /**
     * @var string
     */
    private $gummy;

    /**
     * @var string
     */
    private $hologram;

    /**
     * @var bool
     */
    #[SerializedName('hasAutopilot')]
    private $autopilot;

    /**
     * @var bool
     */
    #[SerializedName('hasLightOnReminder')]
    private $lightOnReminder;

    /**
     * @var bool
     */
    #[SerializedName('hasOnboardComputer')]
    private $onboardComputer;

    /**
     * @var bool
     */
    #[SerializedName('hasRearFoldingSeat')]
    private $rearFoldingSeat;

    /**
     * @var bool
     */
    #[SerializedName('hasSlidingRoof')]
    private $slidingRoof;

    /**
     * @var bool
     */
    #[SerializedName('hasXenonHeadlights')]
    private $xenonHeadlights;

    /**
     * @var bool
     */
    #[SerializedName('hasCoasters')]
    private $coasters;

    /**
     * @var bool
     */
    #[SerializedName('hasClimateControl')]
    private $climateControl;

    /**
     * @var bool
     */
    #[SerializedName('hasAbsBrakes')]
    private $absBrakes;

    /**
     * @var bool
     */
    #[SerializedName('hasAlarm')]
    private $alarm;

    /**
     * @var bool
     */
    #[SerializedName('hasAlloyWheels')]
    private $alloyWheels;

    /**
     * @var bool
     */
    #[SerializedName('hasDriverAirbag')]
    private $driverAirbag;

    /**
     * @var bool
     */
    #[SerializedName('hasElectronicBrakeAssist')]
    private $electronicBrakeAssist;

    /**
     * @var bool
     */
    #[SerializedName('hasEngineInmovilizer')]
    private $engineInmovilizer;

    /**
     * @var bool
     */
    #[SerializedName('hasFogLight')]
    private $fogLight;

    /**
     * @var bool
     */
    #[SerializedName('hasFrontFoglights')]
    private $frontFoglights;

    /**
     * @var bool
     */
    #[SerializedName('hasPassengerAirbag')]
    private $passengerAirbag;

    /**
     * @var bool
     */
    #[SerializedName('hasRainSensor')]
    private $rainSensor;

    /**
     * @var bool
     */
    #[SerializedName('hasRearFoglights')]
    private $rearFoglights;

    /**
     * @var bool
     */
    #[SerializedName('hasRearWindowDefogger')]
    private $rearWindowDefogger;

    /**
     * @var bool
     */
    #[SerializedName('hasRollBar')]
    private $rollBar;

    /**
     * @var bool
     */
    #[SerializedName('hasSideImpactAirbag')]
    private $sideImpactAirbag;

    /**
     * @var bool
     */
    #[SerializedName('hasStabilityControl')]
    private $stabilityControl;

    /**
     * @var bool
     */
    #[SerializedName('hasSteeringWheelControl')]
    private $steeringWheelControl;

    /**
     * @var bool
     */
    #[SerializedName('hasThirdStop')]
    private $thirdStop;

    /**
     * @var bool
     */
    #[SerializedName('hasCurtainAirbag')]
    private $curtainAirbag;

    /**
     * @var bool
     */
    private $armored;

    /**
     * @var bool
     */
    #[SerializedName('hasAirConditioning')]
    private $airConditioning;

    /**
     * @var bool
     */
    #[SerializedName('hasElectricMirrors')]
    private $electricMirrors;

    /**
     * @var bool
     */
    #[SerializedName('hasGps')]
    private $gps;

    /**
     * @var bool
     */
    #[SerializedName('hasHeadlightControl')]
    private $headlightControl;

    /**
     * @var bool
     */
    #[SerializedName('hasHeadrestRearSeat')]
    private $headrestRearSeat;

    /**
     * @var bool
     */
    #[SerializedName('hasHeightAdjustableDriverSeat')]
    private $heightAdjustableDriverSeat;

    /**
     * @var bool
     */
    #[SerializedName('hasLeatherUpholstery')]
    private $leatherUpholstery;

    /**
     * @var bool
     */
    #[SerializedName('hasLightSensor')]
    private $lightSensor;

    /**
     * @var bool
     */
    #[SerializedName('hasPaintedBumper')]
    private $paintedBumper;

    /**
     * @var bool
     */
    #[SerializedName('hasParkingSensor')]
    private $parkingSensor;

    /**
     * @var bool
     */
    #[SerializedName('hasPowerWindows')]
    private $powerWindows;

    /**
     * @var bool
     */
    #[SerializedName('hasRemoteTrunkRelease')]
    private $remoteTrunkRelease;

    /**
     * @var bool
     */
    #[SerializedName('hasElectricSeats')]
    private $electricSeats;

    /**
     * @var bool
     */
    #[SerializedName('hasRearBackrest')]
    private $rearBackrest;

    /**
     * @var bool
     */
    #[SerializedName('hasCentralPowerDoorLocks')]
    private $centralPowerDoorLocks;

    /**
     * @var bool
     */
    #[SerializedName('hasAmfmRadio')]
    private $amfmRadio;

    /**
     * @var bool
     */
    #[SerializedName('hasBluetooth')]
    private $bluetooth;

    /**
     * @var bool
     */
    #[SerializedName('hasCdPlayer')]
    private $cdPlayer;

    /**
     * @var bool
     */
    #[SerializedName('hasDvd')]
    private $dvd;

    /**
     * @var bool
     */
    #[SerializedName('hasMp3Player')]
    private $mp3Player;

    /**
     * @var bool
     */
    #[SerializedName('hasSdCard')]
    private $sdCard;

    /**
     * @var bool
     */
    #[SerializedName('hasUsb')]
    private $usb;

    /**
     * @var bool
     */
    #[SerializedName('hasBullBar')]
    private $bullBar;

    /**
     * @var bool
     */
    #[SerializedName('hasSpareTyreSupport')]
    private $spareTyreSupport;

    /**
     * @var bool
     */
    #[SerializedName('hasTrayCover')]
    private $trayCover;

    /**
     * @var bool
     */
    #[SerializedName('hasTrayMat')]
    private $trayMat;

    /**
     * @var bool
     */
    #[SerializedName('hasWindscreenWiper')]
    private $windscreenWiper;

    /**
     * @var bool
     */
    private $singleOwner;

    /**
     * @var string
     */
    private $youtubeVideoUrl;

    /**
     * @phpstan-var Collection<int, string>
     *
     * @var Collection
     */
    private $pictures;

    /**
     * @var string|null
     */
    private $spincarId;

    /**
     * @var string|null
     */
    private $spincarUrl;

    public function __construct(
        bool $autopilot,
        bool $lightOnReminder,
        bool $onboardComputer,
        bool $rearFoldingSeat,
        bool $slidingRoof,
        bool $xenonHeadlights,
        bool $coasters,
        bool $climateControl,
        bool $absBrakes,
        bool $alarm,
        bool $alloyWheels,
        bool $driverAirbag,
        bool $electronicBrakeAssist,
        bool $engineInmovilizer,
        bool $fogLight,
        bool $frontFoglights,
        bool $passengerAirbag,
        bool $rainSensor,
        bool $rearFoglights,
        bool $rearWindowDefogger,
        bool $rollBar,
        bool $sideImpactAirbag,
        bool $stabilityControl,
        bool $steeringWheelControl,
        bool $thirdStop,
        bool $curtainAirbag,
        bool $armored,
        bool $airConditioning,
        bool $electricMirrors,
        bool $gps,
        bool $headlightControl,
        bool $headrestRearSeat,
        bool $heightAdjustableDriverSeat,
        bool $leatherUpholstery,
        bool $lightSensor,
        bool $paintedBumper,
        bool $parkingSensor,
        bool $powerWindows,
        bool $remoteTrunkRelease,
        bool $electricSeats,
        bool $rearBackrest,
        bool $centralPowerDoorLocks,
        bool $amfmRadio,
        bool $bluetooth,
        bool $cdPlayer,
        bool $dvd,
        bool $mp3Player,
        bool $sdCard,
        bool $usb,
        bool $bullBar,
        bool $spareTyreSupport,
        bool $trayCover,
        bool $trayMat,
        bool $windscreenWiper,
        bool $singleOwner,
    ) {
        $this->autopilot = $autopilot;
        $this->lightOnReminder = $lightOnReminder;
        $this->onboardComputer = $onboardComputer;
        $this->rearFoldingSeat = $rearFoldingSeat;
        $this->slidingRoof = $slidingRoof;
        $this->xenonHeadlights = $xenonHeadlights;
        $this->coasters = $coasters;
        $this->climateControl = $climateControl;
        $this->absBrakes = $absBrakes;
        $this->alarm = $alarm;
        $this->alloyWheels = $alloyWheels;
        $this->driverAirbag = $driverAirbag;
        $this->electronicBrakeAssist = $electronicBrakeAssist;
        $this->engineInmovilizer = $engineInmovilizer;
        $this->fogLight = $fogLight;
        $this->frontFoglights = $frontFoglights;
        $this->passengerAirbag = $passengerAirbag;
        $this->rainSensor = $rainSensor;
        $this->rearFoglights = $rearFoglights;
        $this->rearWindowDefogger = $rearWindowDefogger;
        $this->rollBar = $rollBar;
        $this->sideImpactAirbag = $sideImpactAirbag;
        $this->stabilityControl = $stabilityControl;
        $this->steeringWheelControl = $steeringWheelControl;
        $this->thirdStop = $thirdStop;
        $this->curtainAirbag = $curtainAirbag;
        $this->armored = $armored;
        $this->airConditioning = $airConditioning;
        $this->electricMirrors = $electricMirrors;
        $this->gps = $gps;
        $this->headlightControl = $headlightControl;
        $this->headrestRearSeat = $headrestRearSeat;
        $this->heightAdjustableDriverSeat = $heightAdjustableDriverSeat;
        $this->leatherUpholstery = $leatherUpholstery;
        $this->lightSensor = $lightSensor;
        $this->paintedBumper = $paintedBumper;
        $this->parkingSensor = $parkingSensor;
        $this->powerWindows = $powerWindows;
        $this->remoteTrunkRelease = $remoteTrunkRelease;
        $this->electricSeats = $electricSeats;
        $this->rearBackrest = $rearBackrest;
        $this->centralPowerDoorLocks = $centralPowerDoorLocks;
        $this->amfmRadio = $amfmRadio;
        $this->bluetooth = $bluetooth;
        $this->cdPlayer = $cdPlayer;
        $this->dvd = $dvd;
        $this->mp3Player = $mp3Player;
        $this->sdCard = $sdCard;
        $this->usb = $usb;
        $this->bullBar = $bullBar;
        $this->spareTyreSupport = $spareTyreSupport;
        $this->trayCover = $trayCover;
        $this->trayMat = $trayMat;
        $this->windscreenWiper = $windscreenWiper;
        $this->singleOwner = $singleOwner;
        $this->pictures = new ArrayCollection();
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getYear(): string
    {
        return $this->year;
    }

    public function setYear(string|int $year): self
    {
        // To correct a bug in Intelimotor that return a number
        $this->year = (string) $year;

        return $this;
    }

    public function getTrim(): string
    {
        return $this->trim;
    }

    public function setTrim(string $trim): self
    {
        $this->trim = $trim;

        return $this;
    }

    public function getTransmission(): ?string
    {
        return $this->transmission;
    }

    public function setTransmission(?string $transmission): self
    {
        $this->transmission = $transmission;

        return $this;
    }

    public function getDoors(): ?int
    {
        return $this->doors;
    }

    public function setDoors(?int $doors): self
    {
        $this->doors = $doors;

        return $this;
    }

    public function getFuelType(): ?string
    {
        return $this->fuelType;
    }

    public function setFuelType(?string $fuelType): self
    {
        $this->fuelType = $fuelType;

        return $this;
    }

    public function getSteering(): ?string
    {
        return $this->steering;
    }

    public function setSteering(?string $steering): self
    {
        $this->steering = $steering;

        return $this;
    }

    public function getTractionControl(): ?string
    {
        return $this->tractionControl;
    }

    public function setTractionControl(?string $tractionControl): self
    {
        $this->tractionControl = $tractionControl;

        return $this;
    }

    public function getVehicleBodyType(): ?string
    {
        return $this->vehicleBodyType;
    }

    public function setVehicleBodyType(?string $vehicleBodyType): self
    {
        $this->vehicleBodyType = $vehicleBodyType;

        return $this;
    }

    public function getEngine(): ?string
    {
        return $this->engine;
    }

    public function setEngine(?string $engine): self
    {
        $this->engine = $engine;

        return $this;
    }

    public function getExteriorColor(): ?string
    {
        return $this->exteriorColor;
    }

    public function setExteriorColor(?string $exteriorColor): self
    {
        $this->exteriorColor = $exteriorColor;

        return $this;
    }

    public function getInteriorColor(): ?string
    {
        return $this->interiorColor;
    }

    public function setInteriorColor(?string $interiorColor): self
    {
        $this->interiorColor = $interiorColor;

        return $this;
    }

    public function getLicensePlate(): string
    {
        return $this->licensePlate;
    }

    public function setLicensePlate(string $licensePlate): self
    {
        $this->licensePlate = $licensePlate;

        return $this;
    }

    public function getVin(): string
    {
        return $this->vin;
    }

    public function setVin(string $vin): self
    {
        $this->vin = $vin;

        return $this;
    }

    public function getGummy(): string
    {
        return $this->gummy;
    }

    public function setGummy(string $gummy): self
    {
        $this->gummy = $gummy;

        return $this;
    }

    public function getHologram(): string
    {
        return $this->hologram;
    }

    public function setHologram(string $hologram): self
    {
        $this->hologram = $hologram;

        return $this;
    }

    public function hasAutopilot(): bool
    {
        return $this->autopilot;
    }

    public function hasLightOnReminder(): bool
    {
        return $this->lightOnReminder;
    }

    public function hasOnboardComputer(): bool
    {
        return $this->onboardComputer;
    }

    public function hasRearFoldingSeat(): bool
    {
        return $this->rearFoldingSeat;
    }

    public function hasSlidingRoof(): bool
    {
        return $this->slidingRoof;
    }

    public function hasXenonHeadlights(): bool
    {
        return $this->xenonHeadlights;
    }

    public function hasCoasters(): bool
    {
        return $this->coasters;
    }

    public function hasClimateControl(): bool
    {
        return $this->climateControl;
    }

    public function hasAbsBrakes(): bool
    {
        return $this->absBrakes;
    }

    public function hasAlarm(): bool
    {
        return $this->alarm;
    }

    public function hasAlloyWheels(): bool
    {
        return $this->alloyWheels;
    }

    public function hasDriverAirbag(): bool
    {
        return $this->driverAirbag;
    }

    public function hasElectronicBrakeAssist(): bool
    {
        return $this->electronicBrakeAssist;
    }

    public function hasEngineInmovilizer(): bool
    {
        return $this->engineInmovilizer;
    }

    public function hasFogLight(): bool
    {
        return $this->fogLight;
    }

    public function hasFrontFoglights(): bool
    {
        return $this->frontFoglights;
    }

    public function hasPassengerAirbag(): bool
    {
        return $this->passengerAirbag;
    }

    public function hasRainSensor(): bool
    {
        return $this->rainSensor;
    }

    public function hasRearFoglights(): bool
    {
        return $this->rearFoglights;
    }

    public function hasRearWindowDefogger(): bool
    {
        return $this->rearWindowDefogger;
    }

    public function hasRollBar(): bool
    {
        return $this->rollBar;
    }

    public function hasSideImpactAirbag(): bool
    {
        return $this->sideImpactAirbag;
    }

    public function hasStabilityControl(): bool
    {
        return $this->stabilityControl;
    }

    public function hasSteeringWheelControl(): bool
    {
        return $this->steeringWheelControl;
    }

    public function hasThirdStop(): bool
    {
        return $this->thirdStop;
    }

    public function hasCurtainAirbag(): bool
    {
        return $this->curtainAirbag;
    }

    public function isArmored(): bool
    {
        return $this->armored;
    }

    public function hasAirConditioning(): bool
    {
        return $this->airConditioning;
    }

    public function hasElectricMirrors(): bool
    {
        return $this->electricMirrors;
    }

    public function hasGps(): bool
    {
        return $this->gps;
    }

    public function hasHeadlightControl(): bool
    {
        return $this->headlightControl;
    }

    public function hasHeadrestRearSeat(): bool
    {
        return $this->headrestRearSeat;
    }

    public function hasHeightAdjustableDriverSeat(): bool
    {
        return $this->heightAdjustableDriverSeat;
    }

    public function hasLeatherUpholstery(): bool
    {
        return $this->leatherUpholstery;
    }

    public function hasLightSensor(): bool
    {
        return $this->lightSensor;
    }

    public function hasPaintedBumper(): bool
    {
        return $this->paintedBumper;
    }

    public function hasParkingSensor(): bool
    {
        return $this->parkingSensor;
    }

    public function hasPowerWindows(): bool
    {
        return $this->powerWindows;
    }

    public function hasRemoteTrunkRelease(): bool
    {
        return $this->remoteTrunkRelease;
    }

    public function hasElectricSeats(): bool
    {
        return $this->electricSeats;
    }

    public function hasRearBackrest(): bool
    {
        return $this->rearBackrest;
    }

    public function hasCentralPowerDoorLocks(): bool
    {
        return $this->centralPowerDoorLocks;
    }

    public function hasAmfmRadio(): bool
    {
        return $this->amfmRadio;
    }

    public function hasBluetooth(): bool
    {
        return $this->bluetooth;
    }

    public function hasCdPlayer(): bool
    {
        return $this->cdPlayer;
    }

    public function hasDvd(): bool
    {
        return $this->dvd;
    }

    public function hasMp3Player(): bool
    {
        return $this->mp3Player;
    }

    public function hasSdCard(): bool
    {
        return $this->sdCard;
    }

    public function hasUsb(): bool
    {
        return $this->usb;
    }

    public function hasBullBar(): bool
    {
        return $this->bullBar;
    }

    public function hasSpareTyreSupport(): bool
    {
        return $this->spareTyreSupport;
    }

    public function hasTrayCover(): bool
    {
        return $this->trayCover;
    }

    public function hasTrayMat(): bool
    {
        return $this->trayMat;
    }

    public function hasWindscreenWiper(): bool
    {
        return $this->windscreenWiper;
    }

    public function isSingleOwner(): bool
    {
        return $this->singleOwner;
    }

    public function getYoutubeVideoUrl(): string
    {
        return $this->youtubeVideoUrl;
    }

    public function setYoutubeVideoUrl(string $youtubeVideoUrl): self
    {
        $this->youtubeVideoUrl = $youtubeVideoUrl;

        return $this;
    }

    /**
     * @phpstan-return Collection<int, string>
     */
    public function getPictures(): Collection
    {
        return $this->pictures;
    }

    public function addPicture(string $picture): self
    {
        $this->pictures->add($picture);

        return $this;
    }

    public function removePicture(string $picture): self
    {
        $this->pictures->removeElement($picture);

        return $this;
    }

    public function getSpincarId(): ?string
    {
        return $this->spincarId;
    }

    public function setSpincarId(?string $spincarId): self
    {
        $this->spincarId = $spincarId;

        return $this;
    }

    public function getSpincarUrl(): ?string
    {
        return $this->spincarUrl;
    }

    public function setSpincarUrl(?string $spincarUrl): self
    {
        $this->spincarUrl = $spincarUrl;

        return $this;
    }
}
