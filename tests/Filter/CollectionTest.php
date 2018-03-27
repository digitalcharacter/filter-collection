<?php

namespace dc\tests\Filter;

use dc\Filter\Collection;
use dc\Filter\Type;
use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{

    public function testGetLogical()
    {
        $collection = new Collection(Collection::LOGICAL_OR);

        $this->assertEquals(Collection::LOGICAL_OR, $collection->getLogical());
    }

    public function testParent()
    {
        $parent = new Collection();
        $child = new Collection(Collection::LOGICAL_AND, $parent);

        $this->assertSame($parent, $child->parent());
    }

    public function testChild()
    {
        $collection = new Collection();
        $collection->addCollection(Collection::LOGICAL_OR);

        $this->assertInstanceOf(Collection::class, $collection->child(0));
        $this->assertEquals(Collection::LOGICAL_OR, $collection->child(0)->getLogical());
    }

    public function testAddCollection()
    {
        $collection = new Collection();
        $collection->addCollection(Collection::LOGICAL_OR);

        $collectionData = $collection->getData();

        $this->assertInstanceOf(Collection::class, $collectionData[0]);
    }

    public function testAddCustomFilter()
    {
        $collection = new Collection();
        $collection->addCustomFilter('key', 'value', 'find_in_set');

        $collectionData = $collection->getData();
        /** @var Type\Custom $filter */
        $filter = $collectionData[0];

        $this->assertInstanceOf(Type\Custom::class, $filter);
        $this->assertEquals('key', $filter->getKey());
        $this->assertEquals('value', $filter->getValue());
        $this->assertEquals('find_in_set', $filter->getComparison());
    }

    public function testAddEqual()
    {
        $collection = new Collection();
        $collection->addEqual('key', 'value');

        $collectionData = $collection->getData();
        /** @var Type\Custom $filter */
        $filter = $collectionData[0];

        $this->assertInstanceOf(Type\Equal::class, $filter);
        $this->assertEquals('key', $filter->getKey());
        $this->assertEquals('value', $filter->getValue());
        $this->assertEquals(Type\Equal::FILTER, $filter->getComparison());
    }

    public function testAddExists()
    {
        $collection = new Collection();
        $collection->addExists('key', true);

        $collectionData = $collection->getData();
        /** @var Type\Custom $filter */
        $filter = $collectionData[0];

        $this->assertInstanceOf(Type\Exists::class, $filter);
        $this->assertEquals('key', $filter->getKey());
        $this->assertTrue($filter->getValue());
        $this->assertEquals(Type\Exists::FILTER, $filter->getComparison());
    }

    public function testAddGreaterThan()
    {
        $collection = new Collection();
        $collection->addGreaterThan('key', 1);

        $collectionData = $collection->getData();
        /** @var Type\Custom $filter */
        $filter = $collectionData[0];

        $this->assertInstanceOf(Type\GreaterThan::class, $filter);
        $this->assertEquals('key', $filter->getKey());
        $this->assertEquals(1, $filter->getValue());
        $this->assertEquals(Type\GreaterThan::FILTER, $filter->getComparison());
    }

    public function testAddGreaterThanEqual()
    {
        $collection = new Collection();
        $collection->addGreaterThanEqual('key', 1);

        $collectionData = $collection->getData();
        /** @var Type\Custom $filter */
        $filter = $collectionData[0];

        $this->assertInstanceOf(Type\GreaterThanEqual::class, $filter);
        $this->assertEquals('key', $filter->getKey());
        $this->assertEquals(1, $filter->getValue());
        $this->assertEquals(Type\GreaterThanEqual::FILTER, $filter->getComparison());
    }

    public function testAddIn()
    {
        $collection = new Collection();
        $collection->addIn('key', [1, 2, 3]);

        $collectionData = $collection->getData();
        /** @var Type\Custom $filter */
        $filter = $collectionData[0];

        $this->assertInstanceOf(Type\In::class, $filter);
        $this->assertEquals('key', $filter->getKey());
        $this->assertEquals([1, 2, 3], $filter->getValue());
        $this->assertEquals(Type\In::FILTER, $filter->getComparison());
    }

    public function testAddLowerThan()
    {
        $collection = new Collection();
        $collection->addLowerThan('key', 1);

        $collectionData = $collection->getData();
        /** @var Type\Custom $filter */
        $filter = $collectionData[0];

        $this->assertInstanceOf(Type\LowerThan::class, $filter);
        $this->assertEquals('key', $filter->getKey());
        $this->assertEquals(1, $filter->getValue());
        $this->assertEquals(Type\LowerThan::FILTER, $filter->getComparison());
    }

    public function testAddLowerThanEqual()
    {
        $collection = new Collection();
        $collection->addLowerThanEqual('key', 1);

        $collectionData = $collection->getData();
        /** @var Type\Custom $filter */
        $filter = $collectionData[0];

        $this->assertInstanceOf(Type\LowerThanEqual::class, $filter);
        $this->assertEquals('key', $filter->getKey());
        $this->assertEquals(1, $filter->getValue());
        $this->assertEquals(Type\LowerThanEqual::FILTER, $filter->getComparison());
    }

    public function testAddNotEqual()
    {
        $collection = new Collection();
        $collection->addNotEqual('key', 'value');

        $collectionData = $collection->getData();
        /** @var Type\Custom $filter */
        $filter = $collectionData[0];

        $this->assertInstanceOf(Type\NotEqual::class, $filter);
        $this->assertEquals('key', $filter->getKey());
        $this->assertEquals('value', $filter->getValue());
        $this->assertEquals(Type\NotEqual::FILTER, $filter->getComparison());
    }

    public function testAddNotIn()
    {
        $collection = new Collection();
        $collection->addNotIn('key', [1, 2, 3]);

        $collectionData = $collection->getData();
        /** @var Type\Custom $filter */
        $filter = $collectionData[0];

        $this->assertInstanceOf(Type\NotIn::class, $filter);
        $this->assertEquals('key', $filter->getKey());
        $this->assertEquals([1, 2, 3], $filter->getValue());
        $this->assertEquals(Type\NotIn::FILTER, $filter->getComparison());
    }

    public function testAddQuery()
    {
        $collection = new Collection();
        $collection->addQuery('key', '%foo%');

        $collectionData = $collection->getData();
        /** @var Type\Custom $filter */
        $filter = $collectionData[0];

        $this->assertInstanceOf(Type\Query::class, $filter);
        $this->assertEquals('key', $filter->getKey());
        $this->assertEquals('%foo%', $filter->getValue());
        $this->assertEquals(Type\Query::FILTER, $filter->getComparison());
    }

    public function testAddRegex()
    {
        $collection = new Collection();
        $collection->addQuery('key', '/[a-z]+/i');

        $collectionData = $collection->getData();
        /** @var Type\Custom $filter */
        $filter = $collectionData[0];

        $this->assertInstanceOf(Type\Query::class, $filter);
        $this->assertEquals('key', $filter->getKey());
        $this->assertEquals('/[a-z]+/i', $filter->getValue());
        $this->assertEquals(Type\Query::FILTER, $filter->getComparison());
    }
}
