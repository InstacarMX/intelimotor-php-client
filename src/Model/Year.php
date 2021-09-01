<?php

/*
 * Copyright (c) Instacar 2021. All rights reserved.
 */

namespace InstacarMX\IntelimotorApiClient\Model;

/**
 * @property string $id ID of the year
 * @property string|null $name Name of the year
 */
class Year
{
    use IdNameTrait;

    /** @var Model|null */
    private $model;

    public function __construct(string $id, ?string $name = null, ?Model $model = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->model = $model;
    }

    public function getModel(): ?Model
    {
        return $this->model;
    }

    public function setModel(Model $model): self
    {
        $this->model = $model;
        return $this;
    }
}
