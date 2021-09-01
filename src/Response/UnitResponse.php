<?php

/*
 * Copyright (c) Instacar 2021. All rights reserved.
 */

namespace InstacarMX\IntelimotorApiClient\Response;

use InstacarMX\IntelimotorApiClient\Model\Unit;

class UnitResponse
{
    use ResponseTrait {
        getData as private responseGetData;
        setData as private responseSetData;
    }

    public function getData(): Unit
    {
        return $this->responseGetData();
    }

    public function setData(Unit $data): self
    {
        return $this->responseSetData($data);
    }
}
