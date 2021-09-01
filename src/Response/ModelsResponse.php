<?php

/*
 * Copyright (c) Instacar 2021. All rights reserved.
 */

namespace InstacarMX\IntelimotorApiClient\Response;

use Doctrine\Common\Collections\Collection;
use InstacarMX\IntelimotorApiClient\Model\Model;

class ModelsResponse
{
    use ResponseCollectionTrait {
        getData as private responseGetData;
        addData as private responseAddData;
        removeData as private responseRemoveData;
    }

    /** @return Collection|Model[] */
    public function getData(): Collection
    {
        return $this->responseGetData();
    }

    public function addData(Model $data): self
    {
        return $this->responseAddData($data);
    }

    public function removeData(Model $data): self
    {
        return $this->responseRemoveData($data);
    }
}
