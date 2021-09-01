<?php

/*
 * Copyright (c) Instacar 2021. All rights reserved.
 */

namespace InstacarMX\IntelimotorApiClient\Response;

use InstacarMX\IntelimotorApiClient\Model\Color;

class ColorResponse
{
    use ResponseTrait {
        getData as private responseGetData;
        setData as private responseSetData;
    }

    public function getData(): Color
    {
        return $this->responseGetData();
    }

    public function setData(Color $data): self
    {
        return $this->responseSetData($data);
    }
}
