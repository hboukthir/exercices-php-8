<?php

namespace App\Core;

#[\Attribute]
class Route {
    public function __construct(
        public string $method,
        public string $path
    ) {}
}
