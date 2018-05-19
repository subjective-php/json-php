<?php

namespace SubjectivePHP\JSON;

/**
 * @param string $json The json string being decoded.
 * @param mixed  $assoc
 * @param int    $depth   User specified recursion depth.
 * @param int    $options Bitmask of JSON decode options.
 *
 * @return mixed
 */
function json_decode(string $json, $assoc = false, int $depth = 512, int $options = 0)
{
    if (is_bool($assoc)) {
        return \json_decode($json, $assoc, $depth, $options);
    }

    return Serializer::unserialize($json, $assoc);
}
