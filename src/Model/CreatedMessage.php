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

class CreatedMessage
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $prospectId;

    /**
     * @param string $id
     * @param string $prospectId
     */
    public function __construct(string $id, string $prospectId)
    {
        $this->id = $id;
        $this->prospectId = $prospectId;
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
    public function getProspectId(): string
    {
        return $this->prospectId;
    }

    /**
     * @param string $prospectId
     * @return self
     */
    public function setProspectId(string $prospectId): self
    {
        $this->prospectId = $prospectId;
        return $this;
    }
}
