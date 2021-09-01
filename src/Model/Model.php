<?php

/*
 * Copyright (c) Instacar 2021. All rights reserved.
 */

namespace InstacarMX\IntelimotorApiClient\Model;

/**
 * @property string $id ID of the model
 * @property string|null $name Name of the model
 */
class Model
{
    use IdNameTrait;

    /** @var Brand|null */
    private $brand;

    public function __construct(string $id, ?string $name = null, ?Brand $brand = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->brand = $brand;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(Brand $brand): self
    {
        $this->brand = $brand;
        return $this;
    }
}
