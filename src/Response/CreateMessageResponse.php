<?php

/*
 * Copyright (c) Instacar 2021.
 * This file is part of IntelimotorApiClient.
 *
 * IntelimotorApiClient is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * IntelimotorApiClient is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU  Lesser General Public License
 * along with IntelimotorApiClient.  If not, see <https://www.gnu.org/licenses/>.
 */

namespace Instacar\IntelimotorApiClient\Response;

use Instacar\IntelimotorApiClient\Model\CreateMessageOutput;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @implements ApiResponseInterface<CreateMessageOutput>
 */
class CreateMessageResponse implements ApiResponseInterface
{
    /** @use ResponseTrait<CreateMessageOutput> */
    use ResponseTrait {
        getData as private responseGetData;
        setData as private responseSetData;
    }

    /**
     * @var bool
     */
    #[SerializedName('success')]
    private $successful;

    /**
     * @return bool
     */
    public function isSuccessful(): bool
    {
        return $this->successful;
    }

    /**
     * @param bool $success
     * @return self
     */
    public function setSuccessful(bool $success): self
    {
        $this->successful = $success;
        return $this;
    }

    public function getData(): CreateMessageOutput
    {
        return $this->responseGetData();
    }

    public function setData(CreateMessageOutput $data): self
    {
        return $this->responseSetData($data);
    }
}
