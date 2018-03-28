<?php

namespace digitalCharacter\tests\Filter;

use digitalCharacter\Filter\Type\GreaterThan;
use PHPUnit\Framework\TestCase;

class GreaterThanTest extends TestCase
{
    public function testFilter()
    {
        $filter = new GreaterThan('key', 1);

        $this->assertEquals('key', $filter->getKey());
        $this->assertEquals(1, $filter->getValue());
        $this->assertEquals('gt', $filter->getComparison());
    }
}
