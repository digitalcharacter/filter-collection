<?php

namespace DigitalCharacter\Filter\Type;


final class GreaterThan extends Custom
{
    const FILTER = 'gt';

    public function __construct(string $key, $value)
    {
        parent::__construct($key, $value, self::FILTER);
    }
}
