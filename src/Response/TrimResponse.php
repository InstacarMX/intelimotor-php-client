<?php

/*
 * Copyright (c) Instacar 2021. All rights reserved.
 */

namespace InstacarMX\IntelimotorApiClient\Response;

use InstacarMX\IntelimotorApiClient\Model\Trim;

class TrimResponse
{
    use ResponseTrait {
        getData as private responseGetData;
        setData as private responseSetData;
    }

    public function getData(): Trim
    {
        return $this->responseGetData();
    }

    public function setData(Trim $data): self
    {
        return $this->responseSetData($data);
    }
}
