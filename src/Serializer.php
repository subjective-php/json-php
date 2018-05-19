<?php

namespace SubjectivePHP\JSON;

final class Serializer
{
    public static function unserialize(string $json, $object) : UnserializableInterface
    {
        if (!is_subclass_of($object, UnserializableInterface::class)) {
            throw new Exception(sprintf('$object must implement %s', UnserializableInterface::class));
        }

        if (is_string($object)) {
            $object = new $object();
        }

        $object->jsonUnserialize($json);

        return $object;
    }
}
