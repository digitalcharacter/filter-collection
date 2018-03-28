<?php

namespace DigitalCharacter\tests\Filter;

use DigitalCharacter\Filter\Type\Query;
use PHPUnit\Framework\TestCase;

class QueryTest extends TestCase
{
    public function testFilter()
    {
        $filter = new Query('key', '%test%');

        $this->assertEquals('key', $filter->getKey());
        $this->assertEquals('%test%', $filter->getValue());
        $this->assertEquals('q', $filter->getComparison());
    }
}
