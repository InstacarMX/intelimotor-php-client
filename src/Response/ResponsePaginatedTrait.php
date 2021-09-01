<?php

/*
 * Copyright (c) Instacar 2021. All rights reserved.
 */

namespace InstacarMX\IntelimotorApiClient\Response;

trait ResponsePaginatedTrait
{
    use ResponseCollectionTrait {
        __construct as private responseConstruct;
    }

    /** @var PaginationInfo */
    protected $pagination;

    public function __construct(PaginationInfo $pagination)
    {
        $this->responseConstruct();
        $this->pagination = $pagination;
    }

    public function hasMore(): bool
    {
        return $this->pagination->hasMore();
    }
}
