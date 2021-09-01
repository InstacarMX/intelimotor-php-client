<?php

/*
 * Copyright (c) Instacar 2021. All rights reserved.
 */

namespace InstacarMX\IntelimotorApiClient\Model;

/**
 * @property string $id ID of the brand
 * @property string|null $name Name of the brand
 */
class Brand
{
    use IdNameTrait;

    public function __construct(string $id, ?string $name = null)
    {
        $this->id = $id;
        $this->name = $name;
    }
}
