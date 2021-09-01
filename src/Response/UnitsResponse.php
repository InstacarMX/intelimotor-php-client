<?php

/*
 * Copyright (c) Instacar 2021. All rights reserved.
 */

namespace InstacarMX\IntelimotorApiClient\Response;

use Doctrine\Common\Collections\Collection;
use InstacarMX\IntelimotorApiClient\Model\Unit;

class UnitsResponse
{
    use ResponsePaginatedTrait {
        getData as private responseGetData;
        addData as private responseAddData;
        removeData as private responseRemoveData;
    }

    /** @return Collection|Unit[] */
    public function getData(): Collection
    {
        return $this->responseGetData();
    }

    public function addData(Unit $data): self
    {
        return $this->responseAddData($data);
    }

    public function removeData(Unit $data): self
    {
        return $this->responseRemoveData($data);
    }
}
