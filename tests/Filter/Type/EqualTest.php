<?php

namespace digitalcharacter\tests\Filter;

use digitalcharacter\Filter\Type\Equal;
use PHPUnit\Framework\TestCase;

class EqualTest extends TestCase
{
    public function testFilter()
    {
        $filter = new Equal('key', 'value');

        $this->assertEquals('key', $filter->getKey());
        $this->assertEquals('value', $filter->getValue());
        $this->assertEquals('eq', $filter->getComparison());
    }
}
