<?php

namespace SubjectivePHP\JSON;

interface UnserializableInterface
{
    public function jsonUnserialize(string $json);
}
