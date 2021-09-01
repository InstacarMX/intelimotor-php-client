<?php

/*
 * Copyright (c) Instacar 2021. All rights reserved.
 */

namespace InstacarMX\IntelimotorApiClient\Response;

use InstacarMX\IntelimotorApiClient\Model\BusinessUnit;

class BusinessUnitResponse
{
    use ResponseTrait {
        getData as private responseGetData;
        setData as private responseSetData;
    }

    public function getData(): BusinessUnit
    {
        return $this->responseGetData();
    }

    public function setData(BusinessUnit $data): self
    {
        return $this->responseSetData($data);
    }
}
