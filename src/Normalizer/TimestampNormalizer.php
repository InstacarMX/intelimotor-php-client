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

namespace Instacar\IntelimotorApiClient\Normalizer;

use DateTimeInterface;
use Symfony\Component\Serializer\Exception\NotNormalizableValueException;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class TimestampNormalizer extends DateTimeNormalizer
{
    public const FORMAT_KEY = 'timestamp_format';
    public const TIMEZONE_KEY = 'timestamp_timezone';

    private $defaultContext = [
        self::FORMAT_KEY => 'U',
        self::TIMEZONE_KEY => null,
    ];

    public function __construct(array $defaultContext = [])
    {
        $this->defaultContext = array_merge($this->defaultContext, $defaultContext);
        parent::__construct([
            parent::FORMAT_KEY => $this->defaultContext[self::FORMAT_KEY],
            parent::TIMEZONE_KEY => $this->defaultContext[self::TIMEZONE_KEY],
        ]);
    }

    /**
     * @inheritDoc
     */
    public function denormalize($data, string $type, string $format = null, array $context = []): DateTimeInterface
    {
        $dateTimeFormat = $context[self::FORMAT_KEY] ?? $this->defaultContext[self::FORMAT_KEY];

        if (!is_numeric($data)) {
            throw new NotNormalizableValueException('The data is not a number, you should pass a valid timestamp.');
        }

        if (str_contains($dateTimeFormat, 'u')) {
            $data /= 1000000;
        } elseif (str_contains($dateTimeFormat, 'v')) {
            $data /= 1000;
        }

        return parent::denormalize("@$data", $type, $format, $context);
    }
}
