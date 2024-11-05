<?php

namespace observer;

require_once 'TextFileScanner.php';
require_once 'listeners/WordCounter.php';
require_once 'listeners/NumberCounter.php';
require_once 'listeners/LongestWordKeeper.php';
require_once 'listeners/ReverseWord.php';

use observer\listeners\LongestWordKeeper;
use observer\listeners\NumberCounter;
use observer\listeners\ReverseWord;
use observer\listeners\WordCounter;

$scanner = new TextFileScanner();

$wordCounter = new WordCounter();
$numberCounter = new NumberCounter();
$longestWordKeeper = new LongestWordKeeper();
$reverseWord = new ReverseWord();

// Register listeners
$scanner->registerListener($wordCounter);
$scanner->registerListener($numberCounter);
$scanner->registerListener($longestWordKeeper);
$scanner->registerListener($reverseWord);

// Scan the text file
$scanner->scanFile('sample.txt');

// Display results
echo "Total words: " . $wordCounter->getWordCount() . PHP_EOL;
echo "Total numbers: " . $numberCounter->getNumberCount() . PHP_EOL;
echo "Longest word: " . $longestWordKeeper->getLongestWord() . PHP_EOL;
