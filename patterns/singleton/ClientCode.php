<?php
require_once 'Superman.php';
use singleton\Superman;

$superman1 = Superman::getInstance();
$superman1->fly();

$superman2 = Superman::getInstance();
$superman2->fly();

if ($superman1 === $superman2) {
    echo "There is only one Superman in the world!" . PHP_EOL;
} else {
    echo "Something went wrong; there should only be one Superman!" . PHP_EOL;
}
