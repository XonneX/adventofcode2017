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
$res = $processor->process(file_get_contents(__DIR__ . '/input.txt'));

file_put_contents(__DIR__ . '/output.txt', $res);