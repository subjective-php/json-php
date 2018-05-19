<?php

namespace SubjectivePHP\JSON;

final class Serializer
{
    /**
     * Converts a JSON-formatted string to an object of the specified type.
     *
     * @param string        $json   The JSON string to deserialize.
     * @param string|object $object The class name or an object instance to which the json will be unserialized.
     *
     * @return UnserializableInterface
     */
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
