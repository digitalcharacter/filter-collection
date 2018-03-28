<?php

namespace digitalCharacter\tests\Filter;

use digitalCharacter\Filter\Type\GreaterThanEqual;
use PHPUnit\Framework\TestCase;

class GreaterThanEqualTest extends TestCase
{
    public function testFilter()
    {
        $filter = new GreaterThanEqual('key', 1);

        $this->assertEquals('key', $filter->getKey());
        $this->assertEquals(1, $filter->getValue());
        $this->assertEquals('gte', $filter->getComparison());
    }
}
