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

declare(strict_types=1);

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

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Region
{
    /**
     * @var RegionInfo
     */
    private $region;

    /**
     * @phpstan-var Collection<int, ValuationSample>
     *
     * @var Collection
     */
    private $samples;

    /**
     * @var ValuationStats
     */
    private $stats;

    /**
     * @phpstan-param array<int, ValuationSample> $samples
     *
     * @param ValuationSample[] $samples
     */
    public function __construct(
        RegionInfo $region,
        array $samples,
        ValuationStats $stats,
    ) {
        $this->region = $region;
        $this->samples = new ArrayCollection($samples);
        $this->stats = $stats;
    }

    public function getRegion(): RegionInfo
    {
        return $this->region;
    }

    public function setRegion(RegionInfo $region): self
    {
        $this->region = $region;

        return $this;
    }

    /**
     * @return ValuationSample[]
     */
    public function getSamples(): array
    {
        return $this->samples->toArray();
    }

    public function addSample(ValuationSample $sample): self
    {
        $this->samples->add($sample);

        return $this;
    }

    public function removeSample(ValuationSample $sample): self
    {
        $this->samples->removeElement($sample);

        return $this;
    }

    public function getStats(): ValuationStats
    {
        return $this->stats;
    }

    public function setStats(ValuationStats $stats): self
    {
        $this->stats = $stats;

        return $this;
    }
}
