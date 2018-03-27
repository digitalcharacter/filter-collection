<?php

namespace dc\tests\Filter;

use dc\Filter\Type\NotIn;
use PHPUnit\Framework\TestCase;

class NotInTest extends TestCase
{
    public function testFilter()
    {
        $filter = new NotIn('key', [1, 2, 3]);

        $this->assertEquals('key', $filter->getKey());
        $this->assertEquals([1, 2, 3], $filter->getValue());
        $this->assertEquals('nin', $filter->getComparison());
    }
}
