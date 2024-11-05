<?php

namespace observer\listeners;

use observer\contracts\Listener;

class WordCounter implements Listener {
    private int $wordCount = 0;

    public function update(string $word): void {
        $this->wordCount++;
    }

    public function getWordCount(): int {
        return $this->wordCount;
    }
}
