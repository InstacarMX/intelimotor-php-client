<?php

/*
 * Copyright (c) Instacar 2021. All rights reserved.
 */

namespace InstacarMX\IntelimotorApiClient\Response;

use InstacarMX\IntelimotorApiClient\Model\Brand;

class BrandResponse
{
    use ResponseTrait {
        getData as private responseGetData;
        setData as private responseSetData;
    }

    public function getData(): Brand
    {
        return $this->responseGetData();
    }

    public function setData(Brand $data): self
    {
        return $this->responseSetData($data);
    }
}
