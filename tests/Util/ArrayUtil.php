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

namespace Instacar\IntelimotorApiClient\Test\Util;

class ArrayUtil
{
    /**
     * @phpstan-template TKey
     * @phpstan-template TValue
     * @phpstan-param iterable<TKey, TValue> $iterable
     * @param iterable $iterable
     * @phpstan-return array<TKey, TValue>
     * @return array
     */
    public static function fromIterable(iterable $iterable): array
    {
        if ($iterable instanceof \Traversable) {
            return iterator_to_array($iterable);
        }

        return (array) $iterable;
    }
}