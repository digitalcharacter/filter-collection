<?php

namespace digitalcharacter\tests\Filter;

use digitalcharacter\Filter\Type\Exists;
use PHPUnit\Framework\TestCase;

class ExistsTest extends TestCase
{
    public function testFilter()
    {
        $filter = new Exists('key', true);

        $this->assertEquals('key', $filter->getKey());
        $this->assertTrue($filter->getValue());
        $this->assertEquals('exists', $filter->getComparison());
    }
}
