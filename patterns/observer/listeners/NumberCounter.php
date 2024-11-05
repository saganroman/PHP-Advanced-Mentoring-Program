<?php

namespace observer\listeners;

use observer\contracts\Listener;

class NumberCounter implements Listener {
    private int $numberCount = 0;

    public function update(string $word): void {
        if (ctype_digit($word)) {
            $this->numberCount++;
        }
    }

    public function getNumberCount(): int {
        return $this->numberCount;
    }
}
