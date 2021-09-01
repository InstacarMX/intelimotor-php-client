<?php

/*
 * Copyright (c) Instacar 2021. All rights reserved.
 */

namespace InstacarMX\IntelimotorApiClient\Model;

/**
 * @property string $id ID of the trim
 * @property string|null $name Name of the trim
 */
class Trim
{
    use IdNameTrait;

    /** @var Year|null */
    private $year;

    public function __construct(string $id, ?string $name = null, ?Year $year = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->year = $year;
    }

    public function getYear(): ?Year
    {
        return $this->year;
    }

    public function setYear(Year $year): self
    {
        $this->year = $year;
        return $this;
    }
}
