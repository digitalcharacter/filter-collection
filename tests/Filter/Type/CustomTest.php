<?php

namespace digitalcharacter\tests\Filter;

use digitalcharacter\Filter\Type\Custom;
use PHPUnit\Framework\TestCase;

class CustomTest extends TestCase
{
    public function testFilter()
    {
        $filter = new Custom('key', 'value', 'find_in_set');

        $this->assertEquals('key', $filter->getKey());
        $this->assertEquals('value', $filter->getValue());
        $this->assertEquals('find_in_set', $filter->getComparison());
    }
}
