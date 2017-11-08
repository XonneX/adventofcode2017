<?php
/**
 * Created by PhpStorm
 * @author Janik Baumann <baumannjanik@gmail.com>
 * @copyright 2014-2017 Janik Baumann
 * @see http://adventofcode.com/2016/day/8
 */

declare(strict_types=1);

include __DIR__ . '/Pixel.php';

//$fieldWidth = 7;
//$fieldHeight = 3;
//$path = __DIR__ . '/input_example.txt';

$fieldWidth = 50;
$fieldHeight = 6;
$path = __DIR__ . '/input.txt';

/** @var Pixel[] $pixels */
$pixels = [];

for ($i = 0; $i < $fieldWidth; $i++) {
    for ($ii = 0; $ii < $fieldHeight; $ii++) {
        $pixels[] = new Pixel($i, $ii);
    }
}

function rect(array $pixels, int $width, int $height): void
{
    foreach ($pixels as $pixel) {
        if ($pixel->x < $width &&
            $pixel->y < $height) {
            $pixel->on = true;
        }
    }
}

function rotateRow(array $pixels, int $row, int $amount, int $fieldWidth): void
{
    foreach ($pixels as $pixel) {
        if ($pixel->y !== $row) {
            continue;
        }

        $pixel->x = $pixel->x + $amount;

        if ($pixel->x < $fieldWidth) {
            continue;
        }

        $pixel->x = $pixel->x - $fieldWidth;
    }
}

function rotateColumn(array $pixels, int $column, int $amount, int $fieldHeight): void
{
    foreach ($pixels as $pixel) {
        if ($pixel->x !== $column) {
            continue;
        }

        $pixel->y = $pixel->y + $amount;

        if ($pixel->y < $fieldHeight) {
            continue;
        }

        $pixel->y = $pixel->y - $fieldHeight;
    }
}

function printPixels(array $pixels, string $command, int $width): void
{
    echo $command . PHP_EOL;

    $temps = [];

    foreach ($pixels as $pixel) {
        $temps[$pixel->y][$pixel->x] = $pixel;
    }

    ksort($temps);

    foreach ($temps as $tmp) {
        ksort($tmp);

        foreach ($tmp as $tp) {
            echo $tp->on ? '#' : '.';
        }

        echo PHP_EOL;
    }

    echo str_repeat('-', $width) . PHP_EOL;
}

$file = fopen($path, 'r');

while (($line = fgets($file)) !== false) {
    $line = str_replace(["\r", "\n"], '', $line);

    if (strpos($line, 'rect') !== false) {
        preg_match_all('/rect (.*)x(.*)/', $line, $matches, PREG_SET_ORDER, 0);
        rect($pixels, (int)$matches[0][1], (int)$matches[0][2]);

    } elseif (strpos($line, 'rotate row') !== false) {
        preg_match_all('/rotate row y=(.*) by (.*)/', $line, $matches, PREG_SET_ORDER, 0);
        rotateRow($pixels, (int)$matches[0][1], (int)$matches[0][2], $fieldWidth);

    } elseif (strpos($line, 'rotate column') !== false) {
        preg_match_all('/rotate column x=(.*) by (.*)/', $line, $matches, PREG_SET_ORDER, 0);
        rotateColumn($pixels, (int)$matches[0][1], (int)$matches[0][2], $fieldHeight);
    }

    printPixels($pixels, $line, $fieldWidth);
}

fclose($file);

$count = 0;
foreach ($pixels as $pixel) {
    if ($pixel->on) {
        $count++;
    }
}

file_put_contents(__DIR__ . '/output.txt', $count);