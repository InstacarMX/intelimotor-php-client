<?php

/*
 * Copyright (c) Instacar 2021. All rights reserved.
 */

namespace InstacarMX\IntelimotorApiClient\Response;

use Doctrine\Common\Collections\Collection;
use InstacarMX\IntelimotorApiClient\Model\Year;

class YearsResponse
{
    use ResponseCollectionTrait {
        getData as private responseGetData;
        addData as private responseAddData;
        removeData as private responseRemoveData;
    }

    /** @return Collection|Year[] */
    public function getData(): Collection
    {
        return $this->responseGetData();
    }

    public function addData(Year $data): self
    {
        return $this->responseAddData($data);
    }

    public function removeData(Year $data): self
    {
        return $this->responseRemoveData($data);
    }
}
