<?php

namespace dc\Filter\Type;


final class LowerThanEqual extends Custom
{
    const FILTER = 'lte';

    public function __construct(string $key, $value)
    {
        parent::__construct($key, $value, self::FILTER);
    }
}
