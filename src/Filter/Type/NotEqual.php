<?php

namespace dc\Filter\Type;


final class NotEqual extends Custom
{
    const FILTER = 'neq';

    public function __construct(string $key, $value)
    {
        parent::__construct($key, $value, self::FILTER);
    }
}
