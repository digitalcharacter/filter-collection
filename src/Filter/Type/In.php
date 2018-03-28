<?php

namespace DigitalCharacter\Filter\Type;


final class In extends Custom
{
    const FILTER = 'in';

    public function __construct(string $key, array $value)
    {
        parent::__construct($key, $value, self::FILTER);
    }
}
