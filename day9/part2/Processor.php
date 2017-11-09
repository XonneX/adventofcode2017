<?php
declare(strict_types=1);

namespace day9\part2;

/**
 * Created by PhpStorm
 * @author Janik Baumann <baumannjanik@gmail.com>
 * @copyright 2014-2017 Janik Baumann
 */
class Processor
{

    /**
     * @param string $input Compressed data
     * @return int Decompressed length
     */
    public function process(string $input): int
    {
        $output = 0;

        $i = 0;

        while (strlen($input) > 0) {
            preg_match_all('/^([A-Z]*)|^\(([0-9]*)x([0-9]*)\)/', $input, $matches, PREG_SET_ORDER);

            if (isset($matches[1])) {
                $length = (int)$matches[1][2];
                $times = (int)$matches[1][3];
                $input = substr($input, strlen($matches[1][0]));
                $sub = substr($input, 0, $length);

                if (substr($input, 0, 1) === '(') {
                    $input = substr($input, strlen($sub));
                    $rep = str_repeat($sub, $times);
                    $input = $rep . $input;
                } else {
                    $output += strlen(str_repeat($sub, $times));
                    $input = substr($input, $length);
                }
            } else {
                $output += strlen($matches[0][0]);
                $input = substr($input, strlen($matches[0][0]));
            }
            $i++;
            if ($i % 100 === 0) {
                $status = 'Output Length: ' . $output . PHP_EOL;
                $status .= 'Input Length: ' . strlen($input) . PHP_EOL;
                $status .= 'Input: ' . $input . PHP_EOL;
                file_put_contents(__DIR__ . '/status.txt', $status);
            }
        }

        return $output;
    }
}