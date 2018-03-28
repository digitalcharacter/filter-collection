<?php

namespace digitalCharacter\Filter\Type;


final class LowerThan extends Custom
{
    const FILTER = 'lt';

    public function __construct(string $key, $value)
    {
        parent::__construct($key, $value, self::FILTER);
    }
}
