<?php
namespace adapter;

require_once 'ASCIIStackInterface.php';
require_once 'ASCIIStack.php';
require_once 'IntegerToASCIIStackAdapter.php';
require_once 'IntegerStackInterface.php';
require_once 'IntegerStack.php';

use adapter\ASCIIStack;
use IntegerToASCIIStackAdapter;

$asciiStack = new ASCIIStack();

$integerStack = new IntegerToASCIIStackAdapter($asciiStack);

$integerStack->push(65);  //'A' (ASCII 65)
$integerStack->push(66);  //'B' (ASCII 66)

echo $integerStack->pop();  //66 (ASCII 'B')
echo $integerStack->pop();
