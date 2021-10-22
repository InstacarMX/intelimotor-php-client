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

namespace Instacar\IntelimotorApiClient\Model;

use Symfony\Component\Serializer\Annotation\SerializedName;

class UnitInfo
{
    /**
     * @var string|null
     */
    private $title;

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
     * @SerializedName("hasAutopilot")
     * @var bool
     */
    #[SerializedName('hasAutopilot')]
    private $autopilot;

    /**
     * @SerializedName("hasLightOnReminder")
     * @var bool
     */
    #[SerializedName('hasLightOnReminder')]
    private $lightOnReminder;

    /**
     * @SerializedName("hasOnboardComputer")
     * @var bool
     */
    #[SerializedName('hasOnboardComputer')]
    private $onboardComputer;

    /**
     * @SerializedName("hasRearFoldingSeat")
     * @var bool
     */
    #[SerializedName('hasRearFoldingSeat')]
    private $rearFoldingSeat;

    /**
     * @SerializedName("hasSlidingRoof")
     * @var bool
     */
    #[SerializedName('hasSlidingRoof')]
    private $slidingRoof;

    /**
     * @SerializedName("hasXenonHeadlights")
     * @var bool
     */
    #[SerializedName('hasXenonHeadlights')]
    private $xenonHeadlights;

    /**
     * @SerializedName("hasCoasters")
     * @var bool
     */
    #[SerializedName('hasCoasters')]
    private $coasters;

    /**
     * @SerializedName("hasClimateControl")
     * @var bool
     */
    #[SerializedName('hasClimateControl')]
    private $climateControl;

    /**
     * @SerializedName("hasAbsBrakes")
     * @var bool
     */
    #[SerializedName('hasAbsBrakes')]
    private $absBrakes;

    /**
     * @SerializedName("hasAlarm")
     * @var bool
     */
    #[SerializedName('hasAlarm')]
    private $alarm;

    /**
     * @SerializedName("hasAlloyWheels")
     * @var bool
     */
    #[SerializedName('hasAlloyWheels')]
    private $alloyWheels;

    /**
     * @SerializedName("hasDriverAirbag")
     * @var bool
     */
    #[SerializedName('hasDriverAirbag')]
    private $driverAirbag;

    /**
     * @SerializedName("hasElectronicBrakeAssist")
     * @var bool
     */
    #[SerializedName('hasElectronicBrakeAssist')]
    private $electronicBrakeAssist;

    /**
     * @SerializedName("hasEngineInmovilizer")
     * @var bool
     */
    #[SerializedName('hasEngineInmovilizer')]
    private $engineInmovilizer;

    /**
     * @SerializedName("hasFogLight")
     * @var bool
     */
    #[SerializedName('hasFogLight')]
    private $fogLight;

    /**
     * @SerializedName("hasFrontFoglights")
     * @var bool
     */
    #[SerializedName('hasFrontFoglights')]
    private $frontFoglights;

    /**
     * @SerializedName("hasPassengerAirbag")
     * @var bool
     */
    #[SerializedName('hasPassengerAirbag')]
    private $passengerAirbag;

    /**
     * @SerializedName("hasRainSensor")
     * @var bool
     */
    #[SerializedName('hasRainSensor')]
    private $rainSensor;

    /**
     * @SerializedName("hasRearFoglights")
     * @var bool
     */
    #[SerializedName('hasRearFoglights')]
    private $rearFoglights;

    /**
     * @SerializedName("hasRearWindowDefogger")
     * @var bool
     */
    #[SerializedName('hasRearWindowDefogger')]
    private $rearWindowDefogger;

    /**
     * @SerializedName("hasRollBar")
     * @var bool
     */
    #[SerializedName('hasRollBar')]
    private $rollBar;

    /**
     * @SerializedName("hasSideImpactAirbag")
     * @var bool
     */
    #[SerializedName('hasSideImpactAirbag')]
    private $sideImpactAirbag;

    /**
     * @SerializedName("hasStabilityControl")
     * @var bool
     */
    #[SerializedName('hasStabilityControl')]
    private $stabilityControl;

    /**
     * @SerializedName("hasSteeringWheelControl")
     * @var bool
     */
    #[SerializedName('hasSteeringWheelControl')]
    private $steeringWheelControl;

    /**
     * @SerializedName("hasThirdStop")
     * @var bool
     */
    #[SerializedName('hasThirdStop')]
    private $thirdStop;

    /**
     * @SerializedName("hasCurtainAirbag")
     * @var bool
     */
    #[SerializedName('hasCurtainAirbag')]
    private $curtainAirbag;

    /**
     * @var bool
     */
    private $armored;

    /**
     * @SerializedName("hasAirConditioning")
     * @var bool
     */
    #[SerializedName('hasAirConditioning')]
    private $airConditioning;

    /**
     * @SerializedName("hasElectricMirrors")
     * @var bool
     */
    #[SerializedName('hasElectricMirrors')]
    private $electricMirrors;

    /**
     * @SerializedName("hasGps")
     * @var bool
     */
    #[SerializedName('hasGps')]
    private $gps;

    /**
     * @SerializedName("hasHeadlightControl")
     * @var bool
     */
    #[SerializedName('hasHeadlightControl')]
    private $headlightControl;

    /**
     * @SerializedName("hasHeadrestRearSeat")
     * @var bool
     */
    #[SerializedName('hasHeadrestRearSeat')]
    private $headrestRearSeat;

    /**
     * @SerializedName("hasHeightAdjustableDriverSeat")
     * @var bool
     */
    #[SerializedName('hasHeightAdjustableDriverSeat')]
    private $heightAdjustableDriverSeat;

    /**
     * @SerializedName("hasLeatherUpholstery")
     * @var bool
     */
    #[SerializedName('hasLeatherUpholstery')]
    private $leatherUpholstery;

    /**
     * @SerializedName("hasLightSensor")
     * @var bool
     */
    #[SerializedName('hasLightSensor')]
    private $lightSensor;

    /**
     * @SerializedName("hasPaintedBumper")
     * @var bool
     */
    #[SerializedName('hasPaintedBumper')]
    private $paintedBumper;

    /**
     * @SerializedName("hasParkingSensor")
     * @var bool
     */
    #[SerializedName('hasParkingSensor')]
    private $parkingSensor;

    /**
     * @SerializedName("hasPowerWindows")
     * @var bool
     */
    #[SerializedName('hasPowerWindows')]
    private $powerWindows;

    /**
     * @SerializedName("hasRemoteTrunkRelease")
     * @var bool
     */
    #[SerializedName('hasRemoteTrunkRelease')]
    private $remoteTrunkRelease;

    /**
     * @SerializedName("hasElectricSeats")
     * @var bool
     */
    #[SerializedName('hasElectricSeats')]
    private $electricSeats;

    /**
     * @SerializedName("hasRearBackrest")
     * @var bool
     */
    #[SerializedName('hasRearBackrest')]
    private $rearBackrest;

    /**
     * @SerializedName("hasCentralPowerDoorLocks")
     * @var bool
     */
    #[SerializedName('hasCentralPowerDoorLocks')]
    private $centralPowerDoorLocks;

    /**
     * @SerializedName("hasAmfmRadio")
     * @var bool
     */
    #[SerializedName('hasAmfmRadio')]
    private $amfmRadio;

    /**
     * @SerializedName("hasBluetooth")
     * @var bool
     */
    #[SerializedName('hasBluetooth')]
    private $bluetooth;

    /**
     * @SerializedName("hasCdPlayer")
     * @var bool
     */
    #[SerializedName('hasCdPlayer')]
    private $cdPlayer;

    /**
     * @SerializedName("hasDvd")
     * @var bool
     */
    #[SerializedName('hasDvd')]
    private $dvd;

    /**
     * @SerializedName("hasMp3Player")
     * @var bool
     */
    #[SerializedName('hasMp3Player')]
    private $mp3Player;

    /**
     * @SerializedName("hasSdCard")
     * @var bool
     */
    #[SerializedName('hasSdCard')]
    private $sdCard;

    /**
     * @SerializedName("hasUsb")
     * @var bool
     */
    #[SerializedName('hasUsb')]
    private $usb;

    /**
     * @SerializedName("hasBullBar")
     * @var bool
     */
    #[SerializedName('hasBullBar')]
    private $bullBar;

    /**
     * @SerializedName("hasSpareTyreSupport")
     * @var bool
     */
    #[SerializedName('hasSpareTyreSupport')]
    private $spareTyreSupport;

    /**
     * @SerializedName("hasTrayCover")
     * @var bool
     */
    #[SerializedName('hasTrayCover')]
    private $trayCover;

    /**
     * @SerializedName("hasTrayMat")
     * @var bool
     */
    #[SerializedName('hasTrayMat')]
    private $trayMat;

    /**
     * @SerializedName("hasWindscreenWiper")
     * @var bool
     */
    #[SerializedName('hasWindscreenWiper')]
    private $windscreenWiper;

    /**
     * @var bool
     */
    private $singleOwner;

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
        bool $singleOwner
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
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     * @return self
     */
    public function setTitle(?string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTransmission(): ?string
    {
        return $this->transmission;
    }

    /**
     * @param string|null $transmission
     * @return self
     */
    public function setTransmission(?string $transmission): self
    {
        $this->transmission = $transmission;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getDoors(): ?int
    {
        return $this->doors;
    }

    /**
     * @param int|null $doors
     * @return self
     */
    public function setDoors(?int $doors): self
    {
        $this->doors = $doors;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFuelType(): ?string
    {
        return $this->fuelType;
    }

    /**
     * @param string|null $fuelType
     * @return self
     */
    public function setFuelType(?string $fuelType): self
    {
        $this->fuelType = $fuelType;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSteering(): ?string
    {
        return $this->steering;
    }

    /**
     * @param string|null $steering
     * @return self
     */
    public function setSteering(?string $steering): self
    {
        $this->steering = $steering;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTractionControl(): ?string
    {
        return $this->tractionControl;
    }

    /**
     * @param string|null $tractionControl
     * @return self
     */
    public function setTractionControl(?string $tractionControl): self
    {
        $this->tractionControl = $tractionControl;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVehicleBodyType(): ?string
    {
        return $this->vehicleBodyType;
    }

    /**
     * @param string|null $vehicleBodyType
     * @return self
     */
    public function setVehicleBodyType(?string $vehicleBodyType): self
    {
        $this->vehicleBodyType = $vehicleBodyType;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEngine(): ?string
    {
        return $this->engine;
    }

    /**
     * @param string|null $engine
     * @return self
     */
    public function setEngine(?string $engine): self
    {
        $this->engine = $engine;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getExteriorColor(): ?string
    {
        return $this->exteriorColor;
    }

    /**
     * @param string|null $exteriorColor
     * @return self
     */
    public function setExteriorColor(?string $exteriorColor): self
    {
        $this->exteriorColor = $exteriorColor;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getInteriorColor(): ?string
    {
        return $this->interiorColor;
    }

    /**
     * @param string|null $interiorColor
     * @return self
     */
    public function setInteriorColor(?string $interiorColor): self
    {
        $this->interiorColor = $interiorColor;
        return $this;
    }

    /**
     * @return bool
     */
    public function hasAutopilot(): bool
    {
        return $this->autopilot;
    }

    /**
     * @return bool
     */
    public function hasLightOnReminder(): bool
    {
        return $this->lightOnReminder;
    }

    /**
     * @return bool
     */
    public function hasOnboardComputer(): bool
    {
        return $this->onboardComputer;
    }

    /**
     * @return bool
     */
    public function hasRearFoldingSeat(): bool
    {
        return $this->rearFoldingSeat;
    }

    /**
     * @return bool
     */
    public function hasSlidingRoof(): bool
    {
        return $this->slidingRoof;
    }

    /**
     * @return bool
     */
    public function hasXenonHeadlights(): bool
    {
        return $this->xenonHeadlights;
    }

    /**
     * @return bool
     */
    public function hasCoasters(): bool
    {
        return $this->coasters;
    }

    /**
     * @return bool
     */
    public function hasClimateControl(): bool
    {
        return $this->climateControl;
    }

    /**
     * @return bool
     */
    public function hasAbsBrakes(): bool
    {
        return $this->absBrakes;
    }

    /**
     * @return bool
     */
    public function hasAlarm(): bool
    {
        return $this->alarm;
    }

    /**
     * @return bool
     */
    public function hasAlloyWheels(): bool
    {
        return $this->alloyWheels;
    }

    /**
     * @return bool
     */
    public function hasDriverAirbag(): bool
    {
        return $this->driverAirbag;
    }

    /**
     * @return bool
     */
    public function hasElectronicBrakeAssist(): bool
    {
        return $this->electronicBrakeAssist;
    }

    /**
     * @return bool
     */
    public function hasEngineInmovilizer(): bool
    {
        return $this->engineInmovilizer;
    }

    /**
     * @return bool
     */
    public function hasFogLight(): bool
    {
        return $this->fogLight;
    }

    /**
     * @return bool
     */
    public function hasFrontFoglights(): bool
    {
        return $this->frontFoglights;
    }

    /**
     * @return bool
     */
    public function hasPassengerAirbag(): bool
    {
        return $this->passengerAirbag;
    }

    /**
     * @return bool
     */
    public function hasRainSensor(): bool
    {
        return $this->rainSensor;
    }

    /**
     * @return bool
     */
    public function hasRearFoglights(): bool
    {
        return $this->rearFoglights;
    }

    /**
     * @return bool
     */
    public function hasRearWindowDefogger(): bool
    {
        return $this->rearWindowDefogger;
    }

    /**
     * @return bool
     */
    public function hasRollBar(): bool
    {
        return $this->rollBar;
    }

    /**
     * @return bool
     */
    public function hasSideImpactAirbag(): bool
    {
        return $this->sideImpactAirbag;
    }

    /**
     * @return bool
     */
    public function hasStabilityControl(): bool
    {
        return $this->stabilityControl;
    }

    /**
     * @return bool
     */
    public function hasSteeringWheelControl(): bool
    {
        return $this->steeringWheelControl;
    }

    /**
     * @return bool
     */
    public function hasThirdStop(): bool
    {
        return $this->thirdStop;
    }

    /**
     * @return bool
     */
    public function hasCurtainAirbag(): bool
    {
        return $this->curtainAirbag;
    }

    /**
     * @return bool
     */
    public function isArmored(): bool
    {
        return $this->armored;
    }

    /**
     * @return bool
     */
    public function hasAirConditioning(): bool
    {
        return $this->airConditioning;
    }

    /**
     * @return bool
     */
    public function hasElectricMirrors(): bool
    {
        return $this->electricMirrors;
    }

    /**
     * @return bool
     */
    public function hasGps(): bool
    {
        return $this->gps;
    }

    /**
     * @return bool
     */
    public function hasHeadlightControl(): bool
    {
        return $this->headlightControl;
    }

    /**
     * @return bool
     */
    public function hasHeadrestRearSeat(): bool
    {
        return $this->headrestRearSeat;
    }

    /**
     * @return bool
     */
    public function hasHeightAdjustableDriverSeat(): bool
    {
        return $this->heightAdjustableDriverSeat;
    }

    /**
     * @return bool
     */
    public function hasLeatherUpholstery(): bool
    {
        return $this->leatherUpholstery;
    }

    /**
     * @return bool
     */
    public function hasLightSensor(): bool
    {
        return $this->lightSensor;
    }

    /**
     * @return bool
     */
    public function hasPaintedBumper(): bool
    {
        return $this->paintedBumper;
    }

    /**
     * @return bool
     */
    public function hasParkingSensor(): bool
    {
        return $this->parkingSensor;
    }

    /**
     * @return bool
     */
    public function hasPowerWindows(): bool
    {
        return $this->powerWindows;
    }

    /**
     * @return bool
     */
    public function hasRemoteTrunkRelease(): bool
    {
        return $this->remoteTrunkRelease;
    }

    /**
     * @return bool
     */
    public function hasElectricSeats(): bool
    {
        return $this->electricSeats;
    }

    /**
     * @return bool
     */
    public function hasRearBackrest(): bool
    {
        return $this->rearBackrest;
    }

    /**
     * @return bool
     */
    public function hasCentralPowerDoorLocks(): bool
    {
        return $this->centralPowerDoorLocks;
    }

    /**
     * @return bool
     */
    public function hasAmfmRadio(): bool
    {
        return $this->amfmRadio;
    }

    /**
     * @return bool
     */
    public function hasBluetooth(): bool
    {
        return $this->bluetooth;
    }

    /**
     * @return bool
     */
    public function hasCdPlayer(): bool
    {
        return $this->cdPlayer;
    }

    /**
     * @return bool
     */
    public function hasDvd(): bool
    {
        return $this->dvd;
    }

    /**
     * @return bool
     */
    public function hasMp3Player(): bool
    {
        return $this->mp3Player;
    }

    /**
     * @return bool
     */
    public function hasSdCard(): bool
    {
        return $this->sdCard;
    }

    /**
     * @return bool
     */
    public function hasUsb(): bool
    {
        return $this->usb;
    }

    /**
     * @return bool
     */
    public function hasBullBar(): bool
    {
        return $this->bullBar;
    }

    /**
     * @return bool
     */
    public function hasSpareTyreSupport(): bool
    {
        return $this->spareTyreSupport;
    }

    /**
     * @return bool
     */
    public function hasTrayCover(): bool
    {
        return $this->trayCover;
    }

    /**
     * @return bool
     */
    public function hasTrayMat(): bool
    {
        return $this->trayMat;
    }

    /**
     * @return bool
     */
    public function hasWindscreenWiper(): bool
    {
        return $this->windscreenWiper;
    }

    /**
     * @return bool
     */
    public function isSingleOwner(): bool
    {
        return $this->singleOwner;
    }
}
