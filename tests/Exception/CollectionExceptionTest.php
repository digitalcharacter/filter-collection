<?php

namespace digitalCharacter\tests\Exception;

use digitalCharacter\Exception\CollectionException;
use PHPUnit\Framework\TestCase;

class CollectionExceptionTest extends TestCase
{

    public function testNoParentFound()
    {
        $exception = CollectionException::noParentFound();

        $this->assertInstanceOf(CollectionException::class, $exception);
        $this->assertEquals('no parent found in collection', $exception->getMessage());
    }

    public function testNoChildFound()
    {
        $exception = CollectionException::noChildFound(0);

        $this->assertInstanceOf(CollectionException::class, $exception);
        $this->assertEquals('no child found on index 0', $exception->getMessage());
    }
}
