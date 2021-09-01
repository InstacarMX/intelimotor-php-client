<?php

/*
 * Copyright (c) Instacar 2021. All rights reserved.
 */

namespace InstacarMX\IntelimotorApiClient\Model;

/**
 * @property string $id ID of the business unit
 * @property string $name Name of the business unit
 */
class BusinessUnit
{
    use IdNameTrait;

    public function __construct(string $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}
