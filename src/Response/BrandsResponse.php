<?php

/*
 * Copyright (c) Instacar 2021. All rights reserved.
 */

namespace InstacarMX\IntelimotorApiClient\Response;

use Doctrine\Common\Collections\Collection;
use InstacarMX\IntelimotorApiClient\Model\Brand;

class BrandsResponse
{
    use ResponseCollectionTrait {
        getData as private responseGetData;
        addData as private responseAddData;
        removeData as private responseRemoveData;
    }

    /** @return Collection|Brand[] */
    public function getData(): Collection
    {
        return $this->responseGetData();
    }

    public function addData(Brand $data): self
    {
        return $this->responseAddData($data);
    }

    public function removeData(Brand $data): self
    {
        return $this->responseRemoveData($data);
    }
}
