<?php
use iterator\FileStringCollection;
use iterator\InMemoryStringCollection;

require_once __DIR__ . '/InMemoryStringCollection.php';
require_once __DIR__ . '/FileStringCollection.php';

$inMemoryStrings = new InMemoryStringCollection(['Hello', 'World', 'from', 'Memory']);
$inMemoryIterator = $inMemoryStrings->getIterator();

echo "In-memory collection:" . PHP_EOL;
while ($inMemoryIterator->hasNext()) {
    echo $inMemoryIterator->getNext() . PHP_EOL;
}

$fileStrings = new FileStringCollection('strings.txt');
$fileIterator = $fileStrings->getIterator();

echo "File collection:" . PHP_EOL;
while ($fileIterator->hasNext()) {
    echo $fileIterator->getNext() . PHP_EOL;
}
