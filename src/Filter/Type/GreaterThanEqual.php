<?php

namespace digitalCharacter\Filter\Type;


final class GreaterThanEqual extends Custom
{
    const FILTER = 'gte';

    public function __construct(string $key, $value)
    {
        parent::__construct($key, $value, self::FILTER);
    }
}
