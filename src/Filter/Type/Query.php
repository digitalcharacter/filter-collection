<?php

namespace digitalcharacter\Filter\Type;


final class Query extends Custom
{
    const FILTER = 'q';

    public function __construct(string $key, string $value)
    {
        parent::__construct($key, $value, self::FILTER);
    }
}
