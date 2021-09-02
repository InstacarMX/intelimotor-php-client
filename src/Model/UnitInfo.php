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
    * @SerializedName("hasAutopilot")
    * @var bool
    */
    private $autopilot;

    /**
    * @SerializedName("hasLightOnReminder")
    * @var bool
    */
    private $lightOnReminder;

    /**
    * @SerializedName("hasOnboardComputer")
    * @var bool
    */
    private $onboardComputer;

    /**
    * @SerializedName("hasRearFoldingSeat")
    * @var bool
    */
    private $rearFoldingSeat;

    /**
    * @SerializedName("hasSlidingRoof")
    * @var bool
    */
    private $slidingRoof;

    /**
    * @SerializedName("hasXenonHeadlights")
    * @var bool
    */
    private $xenonHeadlights;

    /**
    * @SerializedName("hasCoasters")
    * @var bool
    */
    private $coasters;

    /**
    * @SerializedName("hasClimateControl")
    * @var bool
    */
    private $climateControl;

    /**
    * @SerializedName("hasAbsBrakes")
    * @var bool
    */
    private $absBrakes;

    /**
    * @SerializedName("hasAlarm")
    * @var bool
    */
    private $alarm;

    /**
    * @SerializedName("hasAlloyWheels")
    * @var bool
    */
    private $alloyWheels;

    /**
    * @SerializedName("hasDriverAirbag")
    * @var bool
    */
    private $driverAirbag;

    /**
    * @SerializedName("hasElectronicBrakeAssist")
    * @var bool
    */
    private $electronicBrakeAssist;

    /**
    * @SerializedName("hasEngineInmovilizer")
    * @var bool
    */
    private $engineInmovilizer;

    /**
    * @SerializedName("hasFogLight")
    * @var bool
    */
    private $fogLight;

    /**
    * @SerializedName("hasFrontFoglights")
    * @var bool
    */
    private $frontFoglights;

    /**
    * @SerializedName("hasPassengerAirbag")
    * @var bool
    */
    private $passengerAirbag;

    /**
    * @SerializedName("hasRainSensor")
    * @var bool
    */
    private $rainSensor;

    /**
    * @SerializedName("hasRearFoglights")
    * @var bool
    */
    private $rearFoglights;

    /**
    * @SerializedName("hasRearWindowDefogger")
    * @var bool
    */
    private $rearWindowDefogger;

    /**
    * @SerializedName("hasRollBar")
    * @var bool
    */
    private $rollBar;

    /**
    * @SerializedName("hasSideImpactAirbag")
    * @var bool
    */
    private $sideImpactAirbag;

    /**
    * @SerializedName("hasStabilityControl")
    * @var bool
    */
    private $stabilityControl;

    /**
    * @SerializedName("hasSteeringWheelControl")
    * @var bool
    */
    private $steeringWheelControl;

    /**
    * @SerializedName("hasThirdStop")
    * @var bool
    */
    private $thirdStop;

    /**
    * @SerializedName("hasCurtainAirbag")
    * @var bool
    */
    private $curtainAirbag;

    /**
     * @var bool
     */
    private $armored;

    /**
    * @SerializedName("hasAirConditioning")
    * @var bool
    */
    private $airConditioning;

    /**
    * @SerializedName("hasElectricMirrors")
    * @var bool
    */
    private $electricMirrors;

    /**
    * @SerializedName("hasGps")
    * @var bool
    */
    private $gps;

    /**
    * @SerializedName("hasHeadlightControl")
    * @var bool
    */
    private $headlightControl;

    /**
    * @SerializedName("hasHeadrestRearSeat")
    * @var bool
    */
    private $headrestRearSeat;

    /**
    * @SerializedName("hasHeightAdjustableDriverSeat")
    * @var bool
    */
    private $heightAdjustableDriverSeat;

    /**
    * @SerializedName("hasLeatherUpholstery")
    * @var bool
    */
    private $leatherUpholstery;

    /**
    * @SerializedName("hasLightSensor")
    * @var bool
    */
    private $lightSensor;

    /**
    * @SerializedName("hasPaintedBumper")
    * @var bool
    */
    private $paintedBumper;

    /**
    * @SerializedName("hasParkingSensor")
    * @var bool
    */
    private $parkingSensor;

    /**
    * @SerializedName("hasPowerWindows")
    * @var bool
    */
    private $powerWindows;

    /**
    * @SerializedName("hasRemoteTrunkRelease")
    * @var bool
    */
    private $remoteTrunkRelease;

    /**
    * @SerializedName("hasElectricSeats")
    * @var bool
    */
    private $electricSeats;

    /**
    * @SerializedName("hasRearBackrest")
    * @var bool
    */
    private $rearBackrest;

    /**
    * @SerializedName("hasCentralPowerDoorLocks")
    * @var bool
    */
    private $centralPowerDoorLocks;

    /**
    * @SerializedName("hasAmfmRadio")
    * @var bool
    */
    private $amfmRadio;

    /**
    * @SerializedName("hasBluetooth")
    * @var bool
    */
    private $bluetooth;

    /**
    * @SerializedName("hasCdPlayer")
    * @var bool
    */
    private $cdPlayer;

    /**
    * @SerializedName("hasDvd")
    * @var bool
    */
    private $dvd;

    /**
    * @SerializedName("hasMp3Player")
    * @var bool
    */
    private $mp3Player;

    /**
    * @SerializedName("hasSdCard")
    * @var bool
    */
    private $sdCard;

    /**
    * @SerializedName("hasUsb")
    * @var bool
    */
    private $usb;

    /**
    * @SerializedName("hasBullBar")
    * @var bool
    */
    private $bullBar;

    /**
    * @SerializedName("hasSpareTyreSupport")
    * @var bool
    */
    private $spareTyreSupport;

    /**
    * @SerializedName("hasTrayCover")
    * @var bool
    */
    private $trayCover;

    /**
    * @SerializedName("hasTrayMat")
    * @var bool
    */
    private $trayMat;

    /**
    * @SerializedName("hasWindscreenWiper")
    * @var bool
    */
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
