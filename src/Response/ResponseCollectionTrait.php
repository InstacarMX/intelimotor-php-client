<?php

/*
 * Copyright (c) Instacar 2021. All rights reserved.
 */

namespace InstacarMX\IntelimotorApiClient\Response;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use LogicException;

trait ResponseCollectionTrait
{
    /** @var Collection */
    protected $data;

    public function __construct()
    {
        $this->data = new ArrayCollection();
    }

    /**
     * @return Collection|array[]
     */
    public function getData(): Collection
    {
        return $this->data;
    }

    public function addData($data): self
    {
        $this->data->add($data);
        return $this;
    }

    public function removeData($data): self
    {
        throw new LogicException("This is a stub method, it should not be used");
    }
}
