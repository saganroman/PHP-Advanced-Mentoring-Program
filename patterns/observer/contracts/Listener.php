<?php

namespace observer\contracts;

interface Listener {
    public function update(string $word): void;
}
