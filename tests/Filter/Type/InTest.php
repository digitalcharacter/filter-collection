<?php

namespace digitalCharacter\tests\Filter;

use digitalCharacter\Filter\Type\In;
use PHPUnit\Framework\TestCase;

class InTest extends TestCase
{
    public function testFilter()
    {
        $filter = new In('key', [1, 2, 3]);

        $this->assertEquals('key', $filter->getKey());
        $this->assertEquals([1, 2, 3], $filter->getValue());
        $this->assertEquals('in', $filter->getComparison());
    }
}
