<?php

namespace digitalcharacter\Filter\Type;


final class Equal extends Custom
{
    const FILTER = 'eq';

    public function __construct(string $key, $value)
    {
        parent::__construct($key, $value, self::FILTER);
    }
}
