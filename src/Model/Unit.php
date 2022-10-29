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

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\SerializedName;

class Unit
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var BusinessUnit
     */
    private $businessUnit;

    /**
     * @var string|null
     */
    private $ref;

    /**
     * @var string|null
     */
    protected $vin;

    /**
     * @var Collection<int, Brand>
     */
    protected $brands;

    /**
     * @var Collection<int, Model>
     */
    protected $models;

    /**
     * @var Collection<int, Year>
     */
    protected $years;

    /**
     * @var Collection<int, Trim>
     */
    protected $trims;

    /**
     * @var string|null
     */
    private $customTrim;

    /**
     * @var int|null
     */
    private $kms;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var int|null
     */
    private $consignmentFeeType;

    /**
     * @var float|null
     */
    private $consignmentFee;

    /**
     * @var float|null
     */
    private $buyPrice;

    /**
     * @var float|null
     */
    private $buyPriceIva;

    /**
     * @var DateTime|null
     */
    private $buyDate;

    /**
     * @var float|null
     */
    private $listPrice;

    /**
     * @var bool|null
     */
    #[SerializedName('isSold')]
    private $sold;

    /**
     * @var float|null
     */
    private $sellPrice;

    /**
     * @var DateTime|null
     */
    private $sellDate;

    /**
     * @var string|null
     */
    private $sellChannel;

    /**
     * @var string|null
     */
    private $prospectId;

    /**
     * @var Collection<int, string>
     */
    private $pictures;

    /**
     * @var UnitInfo|null
     */
    private $listingInfo;

    /**
     * @var bool|null
     */
    #[SerializedName('useExternalCatalog')]
    private $externalCatalog;

    /**
     * @var string|null
     */
    private $externalBrand;

    /**
     * @var string|null
     */
    private $externalModel;

    /**
     * @var string|null
     */
    private $externalYear;

    /**
     * @var string|null
     */
    private $externalTrim;

    /**
     * @var bool|null
     */
    private $imported;

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

    public function getBusinessUnit(): BusinessUnit
    {
        return $this->businessUnit;
    }

    public function setBusinessUnit(BusinessUnit $businessUnit): self
    {
        $this->businessUnit = $businessUnit;

        return $this;
    }

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(?string $ref): self
    {
        $this->ref = $ref;

        return $this;
    }

    public function getVin(): ?string
    {
        return $this->vin;
    }

    public function setVin(?string $vin): self
    {
        $this->vin = $vin;

        return $this;
    }

    /**
     * @return Collection<int, Brand>
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
     * @return Collection<int, Model>
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
     * @return Collection<int, Year>
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
     * @return Collection<int, Trim>
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

    public function hasCustomTrim(): bool
    {
        return (bool) $this->customTrim;
    }

    public function getCustomTrim(): ?string
    {
        return $this->customTrim;
    }

    public function setCustomTrim(?string $customTrim): self
    {
        $this->customTrim = $customTrim;

        return $this;
    }

    public function getKms(): ?int
    {
        return $this->kms;
    }

    public function setKms(?int $kms): self
    {
        $this->kms = $kms;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getConsignmentFeeType(): ?int
    {
        return $this->consignmentFeeType;
    }

    public function setConsignmentFeeType(?int $consignmentFeeType): self
    {
        $this->consignmentFeeType = $consignmentFeeType;

        return $this;
    }

    public function getConsignmentFee(): ?float
    {
        return $this->consignmentFee;
    }

    public function setConsignmentFee(?float $consignmentFee): self
    {
        $this->consignmentFee = $consignmentFee;

        return $this;
    }

    public function getBuyPrice(): ?float
    {
        return $this->buyPrice;
    }

    public function setBuyPrice(?float $buyPrice): self
    {
        $this->buyPrice = $buyPrice;

        return $this;
    }

    public function getBuyPriceIva(): ?float
    {
        return $this->buyPriceIva;
    }

    public function setBuyPriceIva(?float $buyPriceIva): void
    {
        $this->buyPriceIva = $buyPriceIva;
    }

    public function getBuyDate(): ?DateTime
    {
        return $this->buyDate;
    }

    public function setBuyDate(?DateTime $buyDate): self
    {
        $this->buyDate = $buyDate;

        return $this;
    }

    public function getListPrice(): ?float
    {
        return $this->listPrice;
    }

    public function setListPrice(?float $listPrice): self
    {
        $this->listPrice = $listPrice;

        return $this;
    }

    public function isSold(): ?bool
    {
        return $this->sold;
    }

    public function setSold(?bool $sold): self
    {
        $this->sold = $sold;

        return $this;
    }

    public function getSellPrice(): ?float
    {
        return $this->sellPrice;
    }

    public function setSellPrice(?float $sellPrice): self
    {
        $this->sellPrice = $sellPrice;

        return $this;
    }

    public function getSellDate(): ?DateTime
    {
        return $this->sellDate;
    }

    public function setSellDate(?DateTime $sellDate): self
    {
        $this->sellDate = $sellDate;

        return $this;
    }

    public function getSellChannel(): ?string
    {
        return $this->sellChannel;
    }

    public function setSellChannel(?string $sellChannel): self
    {
        $this->sellChannel = $sellChannel;

        return $this;
    }

    public function getProspectId(): ?string
    {
        return $this->prospectId;
    }

    public function setProspectId(?string $prospectId): self
    {
        $this->prospectId = $prospectId;

        return $this;
    }

    /**
     * @return Collection<int, string>
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

    public function getListingInfo(): ?UnitInfo
    {
        return $this->listingInfo;
    }

    public function setListingInfo(?UnitInfo $listingInfo): self
    {
        $this->listingInfo = $listingInfo;

        return $this;
    }

    public function isExternalCatalog(): ?bool
    {
        return $this->externalCatalog;
    }

    public function setExternalCatalog(?bool $externalCatalog): self
    {
        $this->externalCatalog = $externalCatalog;

        return $this;
    }

    public function getExternalBrand(): ?string
    {
        return $this->externalBrand;
    }

    public function setExternalBrand(?string $externalBrand): self
    {
        $this->externalBrand = $externalBrand;

        return $this;
    }

    public function getExternalModel(): ?string
    {
        return $this->externalModel;
    }

    public function setExternalModel(?string $externalModel): self
    {
        $this->externalModel = $externalModel;

        return $this;
    }

    public function getExternalYear(): ?string
    {
        return $this->externalYear;
    }

    public function setExternalYear(?string $externalYear): self
    {
        $this->externalYear = $externalYear;

        return $this;
    }

    public function getExternalTrim(): ?string
    {
        return $this->externalTrim;
    }

    public function setExternalTrim(?string $externalTrim): self
    {
        $this->externalTrim = $externalTrim;

        return $this;
    }

    public function isImported(): ?bool
    {
        return $this->imported;
    }

    public function setImported(?bool $imported): self
    {
        $this->imported = $imported;

        return $this;
    }
}
