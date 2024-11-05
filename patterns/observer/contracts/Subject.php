<?php

namespace observer\contracts;

interface Subject {
    public function registerListener(Listener $listener): void;
    public function removeListener(Listener $listener): void;
    public function notifyListeners(string $word): void;
}
