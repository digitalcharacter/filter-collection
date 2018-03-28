<?php

namespace DigitalCharacter\tests\Filter;

use DigitalCharacter\Filter\Type\LowerThanEqual;
use PHPUnit\Framework\TestCase;

class LowerThanEqualTest extends TestCase
{
    public function testFilter()
    {
        $filter = new LowerThanEqual('key', 1);

        $this->assertEquals('key', $filter->getKey());
        $this->assertEquals(1, $filter->getValue());
        $this->assertEquals('lte', $filter->getComparison());
    }
}
