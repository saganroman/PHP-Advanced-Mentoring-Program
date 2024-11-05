<?php

namespace observer\listeners;

use observer\contracts\Listener;

class ReverseWord implements Listener {
    public function update(string $word): void {
        echo strrev($word) . PHP_EOL;
    }
}
