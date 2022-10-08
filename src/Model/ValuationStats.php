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

class ValuationStats
{
    /**
     * @var float
     */
    #[SerializedName('avgMarketValue')]
    private $averageMarketValue;

    /**
     * @var float
     */
    #[SerializedName('lowMarketValue')]
    private $lowerMarketValue;

    /**
     * @var float
     */
    #[SerializedName('highMarketValue')]
    private $higherMarketValue;

    /**
     * @var int
     */
    private $offerLevel;

    /**
     * @var int
     */
    #[SerializedName('avgDaysOnMarket')]
    private $averageDaysOnMarket;

    /**
     * @var int
     */
    #[SerializedName('avgKms')]
    private $averageKilometers;

    /**
     * @var float
     */
    private $suggestedOffer;

    /**
     * @var array<string, float>
     */
    private $formulas;

    /**
     * @param float $averageMarketValue
     * @param float $lowerMarketValue
     * @param float $higherMarketValue
     * @param int $offerLevel
     * @param int $averageDaysOnMarket
     * @param int $averageKilometers
     * @param float $suggestedOffer
     * @param array<string, float> $formulas
     */
    public function __construct(
        float $averageMarketValue,
        float $lowerMarketValue,
        float $higherMarketValue,
        int $offerLevel,
        int $averageDaysOnMarket,
        int $averageKilometers,
        float $suggestedOffer,
        array $formulas
    ) {
        $this->averageMarketValue = $averageMarketValue;
        $this->lowerMarketValue = $lowerMarketValue;
        $this->higherMarketValue = $higherMarketValue;
        $this->offerLevel = $offerLevel;
        $this->averageDaysOnMarket = $averageDaysOnMarket;
        $this->averageKilometers = $averageKilometers;
        $this->suggestedOffer = $suggestedOffer;
        $this->formulas = $formulas;
    }

    /**
     * @return float
     */
    public function getAverageMarketValue(): float
    {
        return $this->averageMarketValue;
    }

    /**
     * @param float $averageMarketValue
     * @return self
     */
    public function setAverageMarketValue(float $averageMarketValue): self
    {
        $this->averageMarketValue = $averageMarketValue;

        return $this;
    }

    /**
     * @return float
     */
    public function getLowerMarketValue(): float
    {
        return $this->lowerMarketValue;
    }

    /**
     * @param float $lowerMarketValue
     * @return self
     */
    public function setLowerMarketValue(float $lowerMarketValue): self
    {
        $this->lowerMarketValue = $lowerMarketValue;

        return $this;
    }

    /**
     * @return float
     */
    public function getHigherMarketValue(): float
    {
        return $this->higherMarketValue;
    }

    /**
     * @param float $higherMarketValue
     * @return self
     */
    public function setHigherMarketValue(float $higherMarketValue): self
    {
        $this->higherMarketValue = $higherMarketValue;

        return $this;
    }

    /**
     * @return int
     */
    public function getOfferLevel(): int
    {
        return $this->offerLevel;
    }

    /**
     * @param int $offerLevel
     * @return self
     */
    public function setOfferLevel(int $offerLevel): self
    {
        $this->offerLevel = $offerLevel;

        return $this;
    }

    /**
     * @return int
     */
    public function getAverageDaysOnMarket(): int
    {
        return $this->averageDaysOnMarket;
    }

    /**
     * @param int $averageDaysOnMarket
     * @return self
     */
    public function setAverageDaysOnMarket(int $averageDaysOnMarket): self
    {
        $this->averageDaysOnMarket = $averageDaysOnMarket;

        return $this;
    }

    /**
     * @return int
     */
    public function getAverageKilometers(): int
    {
        return $this->averageKilometers;
    }

    /**
     * @param int $averageKilometers
     * @return self
     */
    public function setAverageKilometers(int $averageKilometers): self
    {
        $this->averageKilometers = $averageKilometers;

        return $this;
    }

    /**
     * @return float
     */
    public function getSuggestedOffer(): float
    {
        return $this->suggestedOffer;
    }

    /**
     * @param float $suggestedOffer
     * @return self
     */
    public function setSuggestedOffer(float $suggestedOffer): self
    {
        $this->suggestedOffer = $suggestedOffer;

        return $this;
    }

    /**
     * @return array<string, float>
     */
    public function getFormulas(): array
    {
        return $this->formulas;
    }

    /**
     * @param array<string, float> $formulas
     * @return self
     */
    public function setFormulas(array $formulas): self
    {
        $this->formulas = $formulas;

        return $this;
    }
}
