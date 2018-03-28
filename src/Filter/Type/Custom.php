<?php

namespace digitalcharacter\Filter\Type;

class Custom implements FilterInterface
{
    private $comparison;
    private $key;
    private $value;

    public function __construct(string $key, $value, string $comparison)
    {
        $this->key = $key;
        $this->value = $value;
        $this->comparison = $comparison;
    }

    /**
     * @return string
     */
    public function getComparison(): string
    {
        return $this->comparison;
    }

    /**
     * @return mixed
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}
