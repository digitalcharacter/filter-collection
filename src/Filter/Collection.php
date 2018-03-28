<?php

namespace digitalCharacter\Filter;

use digitalCharacter\Filter\Type;
use digitalCharacter\Iterator\RecursiveIterator;
use digitalCharacter\Exception\CollectionException;

class Collection implements \IteratorAggregate
{
    const LOGICAL_AND = 'and';
    const LOGICAL_OR = 'or';
    const LOGICAL_XAND = 'xand';
    const LOGICAL_XOR = 'xor';

    /**
     * @var string
     */
    private $logical;

    /**
     * @var array
     */
    private $data = [];

    /**
     * @var null | Collection
     */
    private $parent;

    public function __construct(string $logical = self::LOGICAL_AND, Collection $parent = null)
    {
        $this->logical = $logical;
        $this->parent = $parent;
    }

    public function getLogical(): string
    {
        return $this->logical;
    }

    /**
     * @return Collection
     * @throws CollectionException
     */
    public function parent(): Collection
    {
        if ($this->parent === null) {
            throw CollectionException::noParentFound();
        }

        return $this->parent;
    }

    /**
     * @param int $index
     * @return Collection
     * @throws CollectionException
     */
    public function child(int $index): Collection
    {
        $indexCount = 0;
        foreach ($this->data as $data) {
            if ($data instanceof Collection) {
                if ($indexCount === $index) {
                    return $data;
                }
                $indexCount++;
            }
        }

        throw CollectionException::noChildFound($index);
    }

    private function add($data)
    {
        $this->data[] = $data;
    }

    public function addCollection(string $logical = self::LOGICAL_AND)
    {
        $collection = new self($logical, $this);
        $this->add($collection);

        return $collection;
    }

    public function addCustomFilter(string $key, $value, string $comparison)
    {
        $this->add(new Type\Custom($key, $value, $comparison));

        return $this;
    }

    public function addEqual(string $key, $value)
    {
        $this->add(new Type\Equal($key, $value));

        return $this;
    }

    public function addExists(string $key, bool $value)
    {
        $this->add(new Type\Exists($key, $value));

        return $this;
    }

    public function addGreaterThan(string $key, $value)
    {
        $this->add(new Type\GreaterThan($key, $value));

        return $this;
    }

    public function addGreaterThanEqual(string $key, $value)
    {
        $this->add(new Type\GreaterThanEqual($key, $value));

        return $this;
    }

    public function addIn(string $key, array $value)
    {
        $this->add(new Type\In($key, $value));

        return $this;
    }

    public function addLowerThan(string $key, $value)
    {
        $this->add(new Type\LowerThan($key, $value));

        return $this;
    }

    public function addLowerThanEqual(string $key, $value)
    {
        $this->add(new Type\LowerThanEqual($key, $value));

        return $this;
    }

    public function addNotEqual(string $key, $value)
    {
        $this->add(new Type\NotEqual($key, $value));

        return $this;
    }

    public function addNotIn(string $key, array $value)
    {
        $this->add(new Type\NotIn($key, $value));

        return $this;
    }

    public function addQuery(string $key, string $value)
    {
        $this->add(new Type\Query($key, $value));

        return $this;
    }

    public function addRegex(string $key, string $value)
    {
        $this->add(new Type\Regex($key, $value));

        return $this;
    }

    public function getIterator()
    {
        $recursiveIterator = new RecursiveIterator($this->getData());
        return new \RecursiveIteratorIterator($recursiveIterator, \RecursiveIteratorIterator::SELF_FIRST);
    }

    public function getData(): array
    {
        $this->sortCollectionToTheEndOfArray();

        return $this->data;
    }

    private function sortCollectionToTheEndOfArray()
    {
        uasort($this->data, function($a) {
            if ($a instanceof Collection) {
                return 1;
            }

            return -1;
        });
    }
}
