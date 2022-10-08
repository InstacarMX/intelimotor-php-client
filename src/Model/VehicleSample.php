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

use DateTime;
use Symfony\Component\Serializer\Annotation\SerializedName;

class VehicleSample
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $platform;

    /**
     * @var int
     */
    private $kms;

    /**
     * @var float
     */
    private $price;

    /**
     * @var DateTime
     */
    private $publishedAt;

    /**
     * @var DateTime|null
     */
    private $unpublishedAt;

    /**
     * @var bool
     */
    #[SerializedName('isDealer')]
    private $fromDealer;

    /**
     * @param string $id
     * @param string $platform
     * @param int $kms
     * @param float $price
     * @param DateTime $publishedAt
     * @param DateTime|null $unpublishedAt
     * @param bool $fromDealer
     */
    public function __construct(
        string $id,
        string $platform,
        int $kms,
        float $price,
        DateTime $publishedAt,
        ?DateTime $unpublishedAt,
        bool $fromDealer
    ) {
        $this->id = $id;
        $this->platform = $platform;
        $this->kms = $kms;
        $this->price = $price;
        $this->publishedAt = $publishedAt;
        $this->unpublishedAt = $unpublishedAt;
        $this->fromDealer = $fromDealer;
    }


    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return self
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlatform(): string
    {
        return $this->platform;
    }

    /**
     * @param string $platform
     * @return self
     */
    public function setPlatform(string $platform): self
    {
        $this->platform = $platform;

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
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return self
     */
    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getPublishedAt(): DateTime
    {
        return $this->publishedAt;
    }

    /**
     * @param DateTime $publishedAt
     * @return self
     */
    public function setPublishedAt(DateTime $publishedAt): self
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getUnpublishedAt(): ?DateTime
    {
        return $this->unpublishedAt;
    }

    /**
     * @param DateTime|null $unpublishedAt
     * @return self
     */
    public function setUnpublishedAt(?DateTime $unpublishedAt): self
    {
        $this->unpublishedAt = $unpublishedAt;

        return $this;
    }

    /**
     * @return bool
     */
    public function isFromDealer(): bool
    {
        return $this->fromDealer;
    }

    /**
     * @param bool $fromDealer
     * @return self
     */
    public function setFromDealer(bool $fromDealer): self
    {
        $this->fromDealer = $fromDealer;

        return $this;
    }
}
