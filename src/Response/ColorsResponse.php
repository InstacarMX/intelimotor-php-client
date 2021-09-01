<?php

/*
 * Copyright (c) Instacar 2021. All rights reserved.
 */

namespace InstacarMX\IntelimotorApiClient\Response;

use Doctrine\Common\Collections\Collection;
use InstacarMX\IntelimotorApiClient\Model\Color;

class ColorsResponse
{
    use ResponseCollectionTrait {
        getData as private responseGetData;
        addData as private responseAddData;
        removeData as private responseRemoveData;
    }

    /** @return Collection|Color[] */
    public function getData(): Collection
    {
        return $this->responseGetData();
    }

    public function addData(Color $data): self
    {
        return $this->responseAddData($data);
    }

    public function removeData(Color $data): self
    {
        return $this->responseRemoveData($data);
    }
}
