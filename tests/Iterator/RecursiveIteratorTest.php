<?php

namespace dc\tests\Iterator;

use dc\Filter\Collection;
use PHPUnit\Framework\TestCase;

class RecursiveIteratorTest extends TestCase
{
    public function testIteration()
    {
        $collection = new Collection();
        $collection
            ->addEqual('foo', 1)
            ->addCollection(Collection::LOGICAL_AND)
                ->addEqual('bar', 3)
                ->parent()
            ->addEqual('blub', 2)
            ->child(0)
                ->addEqual('var' ,4)
                ->addCollection(Collection::LOGICAL_AND)
                    ->addEqual('nope', 5);

        $expectedIteration = [
            1,2, 'and', 3, 4, 'and', 5
        ];

        foreach ($collection as $filter) {
            $expectedValue = array_shift($expectedIteration);

            if ($filter instanceof Collection) {
                $value = $filter->getLogical();
            } else {
                $value = $filter->getValue();
            }

            $this->assertEquals($expectedValue, $value);
        }

    }
}
