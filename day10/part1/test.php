<?php
declare(strict_types=1);

/**
 * Created by PhpStorm
 * @author Janik Baumann <baumannjanik@gmail.com>
 * @copyright 2014-2017 Janik Baumann
 */

use day10\part1\Processor;

include __DIR__ . '/Processor.php';

$processor = new Processor();
echo 'Bot number: ' . $processor->process(file_get_contents(__DIR__ . '/input.txt'), 5, 2);