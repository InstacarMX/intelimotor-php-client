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

namespace Instacar\IntelimotorApiClient\Response;

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
