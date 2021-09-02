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

use Doctrine\Common\Collections\Collection;

trait VehicleInfoTrait
{
    /** @var string|null */
    protected $vin;
    /** @var Collection|Brand[] */
    protected $brands;
    /** @var Collection|Model[] */
    protected $models;
    /** @var Collection|Year[] */
    protected $years;
    /** @var Collection|Trim[] */
    protected $trims;

    public function getVin(): ?string
    {
        return $this->vin;
    }

    public function setVin(string $vin): self
    {
        $this->vin = $vin;
        return $this;
    }

    /**
     * @return Collection|Brand[]
     */
    public function getBrands(): Collection
    {
        return $this->brands;
    }

    public function addBrand(Brand $brand): self
    {
        $this->brands->add($brand);
        return $this;
    }

    public function removeBrand(Brand $brand): self
    {
        $this->brands->removeElement($brand);
        return $this;
    }

    /**
     * @return Collection|Model[]
     */
    public function getModels(): Collection
    {
        return $this->models;
    }

    public function addModel(Model $model): self
    {
        $this->models->add($model);
        return $this;
    }

    public function removeModel(Model $model): self
    {
        $this->models->removeElement($model);
        return $this;
    }

    /**
     * @return Collection|Year[]
     */
    public function getYears(): Collection
    {
        return $this->years;
    }

    public function addYear(Year $year): self
    {
        $this->years->add($year);
        return $this;
    }

    public function removeYear(Year $year): self
    {
        $this->years->removeElement($year);
        return $this;
    }

    /**
     * @return Collection|Trim[]
     */
    public function getTrims(): Collection
    {
        return $this->trims;
    }

    public function addTrim(Trim $trim): self
    {
        $this->trims->add($trim);
        return $this;
    }

    public function removeTrim(Trim $trim): self
    {
        $this->trims->removeElement($trim);
        return $this;
    }
}
