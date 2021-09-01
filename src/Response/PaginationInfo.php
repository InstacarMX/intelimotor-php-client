<?php

/*
 * Copyright (c) Instacar 2021. All rights reserved.
 */

namespace InstacarMX\IntelimotorApiClient\Response;

class PaginationInfo
{
    /** @var int */
    private $pageNumber;
    /** @var int */
    private $pageSize;
    /** @var int */
    private $total;
    /** @var int */
    private $count;

    public function __construct(int $pageNumber, int $pageSize, int $total, int $count)
    {
        $this->pageNumber = $pageNumber;
        $this->pageSize = $pageSize;
        $this->total = $total;
        $this->count = $count;
    }

    public function hasMore(): bool
    {
        return ($this->pageNumber - 1) * $this->pageSize + $this->count < $this->total;
    }
}
