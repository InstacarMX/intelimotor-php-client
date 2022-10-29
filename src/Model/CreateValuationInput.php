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
     * @param string[]|string $yearIds
     * @param string[]|string $trimIds
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
        bool $lite = false,
    ) {
        $this->brandIds = [$brandId];
        $this->modelIds = [$modelId];
        $this->yearIds = \is_array($yearIds) ? $yearIds : [$yearIds];
        $this->trimIds = \is_array($trimIds) ? $trimIds : [$trimIds];
        $this->businessUnitId = $businessUnitId;
        $this->vin = $vin;
        $this->kms = $kms;
        $this->formulas = $formula !== null ? [$formula] : [];
        $this->lite = $lite;
    }

    /**
     * @return string[]
     */
    public function getBrandIds(): array
    {
        return $this->brandIds;
    }

    public function setBrandId(string $brandId): self
    {
        $this->brandIds = [$brandId];

        return $this;
    }

    /**
     * @return string[]
     */
    public function getModelIds(): array
    {
        return $this->modelIds;
    }

    public function setModelId(string $modelId): self
    {
        $this->modelIds = [$modelId];

        return $this;
    }

    /**
     * @return string[]
     */
    public function getYearIds(): array
    {
        return $this->yearIds;
    }

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

    public function addTrimId(string $trimId): self
    {
        $this->trimIds[] = $trimId;

        return $this;
    }

    public function getBusinessUnitId(): string
    {
        return $this->businessUnitId;
    }

    public function setBusinessUnitId(string $businessUnitId): self
    {
        $this->businessUnitId = $businessUnitId;

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

    public function getKms(): int
    {
        return $this->kms;
    }

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

    public function setFormula(?string $formula): self
    {
        $this->formulas = $formula !== null ? [$formula] : [];

        return $this;
    }

    public function isLite(): bool
    {
        return $this->lite;
    }

    public function setLite(bool $lite): self
    {
        $this->lite = $lite;

        return $this;
    }
}
