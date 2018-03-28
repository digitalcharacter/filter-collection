<?php

namespace DigitalCharacter\tests\Filter;

use DigitalCharacter\Filter\Type\LowerThan;
use PHPUnit\Framework\TestCase;

class LowerThanTest extends TestCase
{
    public function testFilter()
    {
        $filter = new LowerThan('key', 1);

        $this->assertEquals('key', $filter->getKey());
        $this->assertEquals(1, $filter->getValue());
        $this->assertEquals('lt', $filter->getComparison());
    }
}
