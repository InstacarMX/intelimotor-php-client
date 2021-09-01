<?php

/*
 * Copyright (c) Instacar 2021. All rights reserved.
 */

namespace InstacarMX\IntelimotorApiClient\Response;

use InstacarMX\IntelimotorApiClient\Model\Model;

class ModelResponse
{
    use ResponseTrait {
        getData as private responseGetData;
        setData as private responseSetData;
    }

    public function getData(): Model
    {
        return $this->responseGetData();
    }

    public function setData(Model $data): self
    {
        return $this->responseSetData($data);
    }
}
