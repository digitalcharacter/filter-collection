<?php

namespace DigitalCharacter\Filter\Type;


final class Exists extends Custom
{
    const FILTER = 'exists';

    public function __construct(string $key, bool $value)
    {
        parent::__construct($key, $value, self::FILTER);
    }
}
