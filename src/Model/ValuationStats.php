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
        array $formulas,
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

    public function getAverageMarketValue(): float
    {
        return $this->averageMarketValue;
    }

    public function setAverageMarketValue(float $averageMarketValue): self
    {
        $this->averageMarketValue = $averageMarketValue;

        return $this;
    }

    public function getLowerMarketValue(): float
    {
        return $this->lowerMarketValue;
    }

    public function setLowerMarketValue(float $lowerMarketValue): self
    {
        $this->lowerMarketValue = $lowerMarketValue;

        return $this;
    }

    public function getHigherMarketValue(): float
    {
        return $this->higherMarketValue;
    }

    public function setHigherMarketValue(float $higherMarketValue): self
    {
        $this->higherMarketValue = $higherMarketValue;

        return $this;
    }

    public function getOfferLevel(): int
    {
        return $this->offerLevel;
    }

    public function setOfferLevel(int $offerLevel): self
    {
        $this->offerLevel = $offerLevel;

        return $this;
    }

    public function getAverageDaysOnMarket(): int
    {
        return $this->averageDaysOnMarket;
    }

    public function setAverageDaysOnMarket(int $averageDaysOnMarket): self
    {
        $this->averageDaysOnMarket = $averageDaysOnMarket;

        return $this;
    }

    public function getAverageKilometers(): int
    {
        return $this->averageKilometers;
    }

    public function setAverageKilometers(int $averageKilometers): self
    {
        $this->averageKilometers = $averageKilometers;

        return $this;
    }

    public function getSuggestedOffer(): float
    {
        return $this->suggestedOffer;
    }

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
     */
    public function setFormulas(array $formulas): self
    {
        $this->formulas = $formulas;

        return $this;
    }
}
