<?php

namespace observer\listeners;

use observer\contracts\Listener;

class LongestWordKeeper implements Listener {
    private string $longestWord = '';

    public function update(string $word): void {
        if (strlen($word) > strlen($this->longestWord)) {
            $this->longestWord = $word;
        }
    }

    public function getLongestWord(): string {
        return $this->longestWord;
    }
}
