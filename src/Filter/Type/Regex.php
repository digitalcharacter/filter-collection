<?php

namespace DigitalCharacter\Filter\Type;


final class Regex extends Custom
{
    const FILTER = 'regex';

    public function __construct(string $key, string $value)
    {
        parent::__construct($key, $value, self::FILTER);
    }
}
