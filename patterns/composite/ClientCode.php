<?php
namespace composite;

require_once 'File.php';
require_once 'Directory.php';

$file1 = new File('file1.txt', 100);
$file2 = new File('file2.txt', 200);
$file3 = new File('file3.txt', 150);

// Create directories and add files or subdirectories
$rootDir = new Directory('root');
$subDir1 = new Directory('subdir1');
$subDir2 = new Directory('subdir2');

$rootDir->add($file1);
$rootDir->add($subDir1);

$subDir1->add($file2);
$subDir1->add($subDir2);

$subDir2->add($file3);

echo "Contents of root directory:" . PHP_EOL;
foreach ($rootDir->listContent() as $content) {
    echo "- " . $content->getName() . " (" . $content->getSize() . " KB)" . PHP_EOL;
}

echo "Total size of root directory: " . $rootDir->getSize() . " KB" . PHP_EOL;

$subDir1->remove($file2);

echo "Contents of subdir1 after removing file2:" . PHP_EOL;
foreach ($subDir1->listContent() as $content) {
    echo "- " . $content->getName() . " (" . $content->getSize() . " KB)" . PHP_EOL;
}
