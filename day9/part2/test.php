<?php
/**
 * Created by PhpStorm
 * @author Janik Baumann <baumannjanik@gmail.com>
 * @copyright 2014-2017 Janik Baumann
 */
declare(strict_types=1);

use day9\part2\Processor;

include __DIR__ . '/Processor.php';

$processor = new Processor();
$res = $processor->process(file_get_contents(__DIR__ . '/input_example_1.txt'));

if ($res === 9) {
    echo 'Example 1: Passed' . PHP_EOL;
} else {
    echo 'Example 1: Failed' . PHP_EOL;
}

$processor = new Processor();
$res = $processor->process(file_get_contents(__DIR__ . '/input_example_2.txt'));

if ($res === 20) {
    echo 'Example 2: Passed' . PHP_EOL;
} else {
    echo 'Example 2: Failed' . PHP_EOL;
}

$processor = new Processor();
$res = $processor->process(file_get_contents(__DIR__ . '/input_example_3.txt'));

if ($res === 241920) {
    echo 'Example 3: Passed' . PHP_EOL;
} else {
    echo 'Example 3: Failed' . PHP_EOL;
}

$processor = new Processor();
$res = $processor->process(file_get_contents(__DIR__ . '/input_example_4.txt'));

if ($res === 445) {
    echo 'Example 4: Passed' . PHP_EOL;
} else {
    echo 'Example 4: Failed' . PHP_EOL;
}
