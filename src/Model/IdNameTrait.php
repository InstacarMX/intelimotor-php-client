<?php

/*
 * Copyright (c) Instacar 2021. All rights reserved.
 */

namespace InstacarMX\IntelimotorApiClient\Model;

trait IdNameTrait
{
    /** @var string */
    protected $id;
    /** @var string|null */
    protected $name;
    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
}
