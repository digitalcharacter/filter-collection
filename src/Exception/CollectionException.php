<?php

namespace DigitalCharacter\Exception;


class CollectionException extends \Exception
{
    public static function noParentFound()
    {
        return new self(
            'no parent found in collection'
        );
    }

    public static function noChildFound($index)
    {
        return new self(
            sprintf('no child found on index %d', $index)
        );
    }
}
