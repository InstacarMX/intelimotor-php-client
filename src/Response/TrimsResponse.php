<?php

/*
 * Copyright (c) Instacar 2021. All rights reserved.
 */

namespace InstacarMX\IntelimotorApiClient\Response;

use Doctrine\Common\Collections\Collection;
use InstacarMX\IntelimotorApiClient\Model\Trim;

class TrimsResponse
{
    use ResponseCollectionTrait {
        getData as private responseGetData;
        addData as private responseAddData;
        removeData as private responseRemoveData;
    }

    /** @return Collection|Trim[] */
    public function getData(): Collection
    {
        return $this->responseGetData();
    }

    public function addData(Trim $data): self
    {
        return $this->responseAddData($data);
    }

    public function removeData(Trim $data): self
    {
        return $this->responseRemoveData($data);
    }
}
