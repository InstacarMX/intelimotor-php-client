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

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\SerializedName;

class Unit
{
    use VehicleInfoTrait;

    /**
     * @var string
     */
    private $id;

    /**
     * @var string|null
     */
    private $ref;

    /**
     * @var int|null
     */
    private $kms;

    /**
     * @var float|null
     */
    private $buyPrice;

    /**
     * @var int|null
     */
    private $buyDate;

    /**
     * @var float|null
     */
    private $listPrice;

    /**
     * @SerializedName("isSold")
     * @var bool|null
     */
    #[SerializedName('isSold')]
    private $sold;

    /**
     * @var UnitInfo|null
     */
    private $listingInfo;

    /**
     * @var Collection|string[]
     */
    private $pictures;

    public function __construct(string $id)
    {
        $this->id = $id;
        $this->brands = new ArrayCollection();
        $this->models = new ArrayCollection();
        $this->years = new ArrayCollection();
        $this->trims = new ArrayCollection();
        $this->pictures = new ArrayCollection();
    }

    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getRef(): ?string
    {
        return $this->ref;
    }

    /**
     * @param string|null $ref
     * @return Unit
     */
    public function setRef(?string $ref): Unit
    {
        $this->ref = $ref;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getKms(): ?int
    {
        return $this->kms;
    }

    /**
     * @param int|null $kms
     * @return Unit
     */
    public function setKms(?int $kms): Unit
    {
        $this->kms = $kms;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getBuyPrice(): ?float
    {
        return $this->buyPrice;
    }

    /**
     * @param float $buyPrice
     * @return Unit
     */
    public function setBuyPrice(float $buyPrice): Unit
    {
        $this->buyPrice = $buyPrice;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getBuyDate(): ?int
    {
        return $this->buyDate;
    }

    /**
     * @param int $buyDate
     * @return Unit
     */
    public function setBuyDate(int $buyDate): Unit
    {
        $this->buyDate = $buyDate;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getListPrice(): ?float
    {
        return $this->listPrice;
    }

    /**
     * @param float $listPrice
     * @return Unit
     */
    public function setListPrice(float $listPrice): Unit
    {
        $this->listPrice = $listPrice;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function isSold(): ?bool
    {
        return $this->sold;
    }

    /**
     * @param bool $sold
     * @return Unit
     */
    public function setSold(bool $sold): Unit
    {
        $this->sold = $sold;
        return $this;
    }

    /**
     * @return UnitInfo|null
     */
    public function getListingInfo(): ?UnitInfo
    {
        return $this->listingInfo;
    }

    /**
     * @param UnitInfo|null $listingInfo
     * @return Unit
     */
    public function setListingInfo(?UnitInfo $listingInfo): Unit
    {
        $this->listingInfo = $listingInfo;
        return $this;
    }

    /**
     * @return Collection|string[]
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
}
