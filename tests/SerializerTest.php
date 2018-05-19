<?php

namespace SubjectPHPTest\JSON;

use PHPUnit\Framework\TestCase;
use SubjectivePHP\JSON\Serializer;
use SubjectivePHP\JSON\UnserializableInterface;

/**
 * @coversDefaultClass \SubjectivePHP\JSON\Serializer
 * @covers ::<private>
 */
final class SerializerTest extends TestCase
{
    /**
     * @test
     * @covers ::unserialize
     */
    public function unserializeWithObject()
    {
        $object = $this->getObject();
        Serializer::unserialize(json_encode(['foo' => 'bar']), $object);
        $this->assertSame(['foo' => 'bar'], $object->getData());
    }

    /**
     * @test
     * @covers ::unserialize
     */
    public function unserializeWithClassName()
    {
        $className = get_class($this->getObject());
        $object = Serializer::unserialize(json_encode(['foo' => 'bar']), $className);
        $this->assertInstanceOf($className, $object);
        $this->assertSame(['foo' => 'bar'], $object->getData());
    }

    private function getObject() : UnserializableInterface
    {
        return new class implements UnserializableInterface
        {
            private $data;

            public function getData() : array
            {
                return $this->data;
            }

            public function jsonUnserialize(string $json)
            {
                $this->data = json_decode($json, true);
            }
        };
    }
}
