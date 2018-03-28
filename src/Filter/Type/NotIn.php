<?php

namespace dc\Filter\Type;


final class NotIn extends Custom
{
    const FILTER = 'nin';

    public function __construct(string $key, array $value)
    {
        parent::__construct($key, $value, self::FILTER);
    }
}
