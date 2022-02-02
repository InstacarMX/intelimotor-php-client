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

class CreateMessageInput
{
    /**
     * @var Ad
     */
    private $ad;

    /**
     * @var ProspectInput
     */
    private $customer;

    /**
     * @var string|null
     */
    private $campaign;

    /**
     * @param Ad $ad
     * @param ProspectInput $customer
     * @param string|null $campaign
     */
    public function __construct(Ad $ad, ProspectInput $customer, ?string $campaign = null)
    {
        $this->ad = $ad;
        $this->customer = $customer;
        $this->campaign = $campaign;
    }

    /**
     * @return Ad
     */
    public function getAd(): Ad
    {
        return $this->ad;
    }

    /**
     * @return ProspectInput
     */
    public function getCustomer(): ProspectInput
    {
        return $this->customer;
    }

    /**
     * @return string|null
     */
    public function getCampaign(): ?string
    {
        return $this->campaign;
    }
}
