<?php

namespace composite;

interface FileSystemEntity {
    public function getName(): string;
    public function getSize(): int;
}
