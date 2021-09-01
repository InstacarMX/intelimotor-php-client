<?php

/*
 * Copyright (c) Instacar 2021. All rights reserved.
 */

namespace InstacarMX\IntelimotorApiClient\Response;

use InstacarMX\IntelimotorApiClient\Model\Year;

class YearResponse
{
    use ResponseTrait {
        getData as private responseGetData;
        setData as private responseSetData;
    }

    public function getData(): Year
    {
        return $this->responseGetData();
    }

    public function setData(Year $data): self
    {
        return $this->responseSetData($data);
    }
}
