<?php

namespace digitalcharacter\Iterator;


use digitalcharacter\Filter\Collection;

class RecursiveIterator extends \RecursiveArrayIterator
{
    public function hasChildren(): bool
    {
        return $this->current() instanceof Collection;
    }

    public function getChildren(): RecursiveIterator
    {
        return new self($this->current()->getData());
    }

}
