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

class CreateValuationInput
{
    /**
     * @var string[]
     */
    private $brandIds;

    /**
     * @var string[]
     */
    private $modelIds;

    /**
     * @var string[]
     */
    private $yearIds;

    /**
     * @var string[]
     */
    private $trimIds;

    /**
     * @var string
     */
    private $businessUnitId;

    /**
     * @var string
     */
    private $vin;

    /**
     * @var int
     */
    private $kms;

    /**
     * @var string[]
     */
    private $formulas;

    /**
     * @var bool
     */
    private $lite;

    /**
     * @param string $brandId
     * @param string $modelId
     * @param string[]|string $yearIds
     * @param string[]|string $trimIds
     * @param string $businessUnitId
     * @param string $vin
     * @param int $kms
     * @param string|null $formula
     * @param bool $lite
     */
    public function __construct(
        string $brandId,
        string $modelId,
        $yearIds,
        $trimIds,
        string $businessUnitId = '',
        string $vin = '',
        int $kms = 0,
        ?string $formula = null,
        bool $lite = false
    ) {
        $this->brandIds = [ $brandId ];
        $this->modelIds = [ $modelId ];
        $this->yearIds = is_array($yearIds) ? $yearIds : [ $yearIds ];
        $this->trimIds = is_array($trimIds) ? $trimIds : [ $trimIds ];
        $this->businessUnitId = $businessUnitId;
        $this->vin = $vin;
        $this->kms = $kms;
        $this->formulas = $formula !== null ? [ $formula ] : [];
        $this->lite = $lite;
    }

    /**
     * @return string[]
     */
    public function getBrandIds(): array
    {
        return $this->brandIds;
    }

    /**
     * @param string $brandId
     * @return self
     */
    public function setBrandId(string $brandId): self
    {
        $this->brandIds = [ $brandId ];

        return $this;
    }

    /**
     * @return string[]
     */
    public function getModelIds(): array
    {
        return $this->modelIds;
    }

    /**
     * @param string $modelId
     * @return self
     */
    public function setModelId(string $modelId): self
    {
        $this->modelIds = [ $modelId ];

        return $this;
    }

    /**
     * @return string[]
     */
    public function getYearIds(): array
    {
        return $this->yearIds;
    }

    /**
     * @param string $yearId
     * @return self
     */
    public function addYearId(string $yearId): self
    {
        $this->yearIds[] = $yearId;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getTrimIds(): array
    {
        return $this->trimIds;
    }

    /**
     * @param string $trimId
     * @return self
     */
    public function addTrimId(string $trimId): self
    {
        $this->trimIds[] = $trimId;

        return $this;
    }

    /**
     * @return string
     */
    public function getBusinessUnitId(): string
    {
        return $this->businessUnitId;
    }

    /**
     * @param string $businessUnitId
     * @return self
     */
    public function setBusinessUnitId(string $businessUnitId): self
    {
        $this->businessUnitId = $businessUnitId;

        return $this;
    }

    /**
     * @return string
     */
    public function getVin(): string
    {
        return $this->vin;
    }

    /**
     * @param string $vin
     * @return self
     */
    public function setVin(string $vin): self
    {
        $this->vin = $vin;

        return $this;
    }

    /**
     * @return int
     */
    public function getKms(): int
    {
        return $this->kms;
    }

    /**
     * @param int $kms
     * @return self
     */
    public function setKms(int $kms): self
    {
        $this->kms = $kms;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getFormulas(): array
    {
        return $this->formulas;
    }

    /**
     * @param string|null $formula
     * @return self
     */
    public function setFormula(?string $formula): self
    {
        $this->formulas = $formula !== null ? [ $formula ] : [];

        return $this;
    }

    /**
     * @return bool
     */
    public function isLite(): bool
    {
        return $this->lite;
    }

    /**
     * @param bool $lite
     * @return self
     */
    public function setLite(bool $lite): self
    {
        $this->lite = $lite;

        return $this;
    }
}
