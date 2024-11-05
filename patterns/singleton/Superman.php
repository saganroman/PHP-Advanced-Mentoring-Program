<?php

namespace singleton;

class Superman {
    private static ?Superman $instance = null;

    private function __construct() {
    }

    private function __clone() {}
    private function __wakeup() {}

    public static function getInstance(): Superman {
        if (self::$instance === null) {
            self::$instance = new Superman();
        }

        return self::$instance;
    }

    public function fly(): void {
        echo "Superman is flying!" . PHP_EOL;
    }
}
