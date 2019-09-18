<?php

namespace App\Utils;

class CircularReferenceHandler {
    public function __invoke()
    {
        return function ($object) {
            return $object->getId();
        };
    }
}
