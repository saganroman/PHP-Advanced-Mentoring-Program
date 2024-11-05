<?php

namespace composite;

require_once 'FileSystemEntity.php';
class Directory implements FileSystemEntity {
    private string $name;
    private array $contents = [];

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getSize(): int {
        $totalSize = 0;

        foreach ($this->contents as $content) {
            $totalSize += $content->getSize();
        }

        return $totalSize;
    }

    public function add(FileSystemEntity $fsEntity): void {
        $this->contents[] = $fsEntity;
    }

    public function remove(FileSystemEntity $fsEntity): void {
        foreach ($this->contents as $key => $content) {
            if ($content === $fsEntity) {
                unset($this->contents[$key]);
                $this->contents = array_values($this->contents);
                break;
            }
        }
    }

    public function listContent(): array {
        return $this->contents;
    }
}
