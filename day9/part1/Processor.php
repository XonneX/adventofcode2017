<?php
declare(strict_types=1);

namespace day9\part1;

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
        $output = '';

        while (strlen($input) > 0) {
            preg_match_all('/^([A-Z]*)|^\(([0-9]*)x([0-9]*)\)/', $input, $matches, PREG_SET_ORDER);

            if (isset($matches[1])) {
                $length = (int)$matches[1][2];
                $times = (int)$matches[1][3];
                $input = substr($input, strlen($matches[1][0]));
                $sub = substr($input, 0, $length);
                $output .= str_repeat($sub, $times);
                $input = substr($input, $length);
            } else {
                $output .= $matches[0][0];
                $input = substr($input, strlen($matches[0][0]));
            }
        }

        $output = str_replace(' ', '', $output);
        return strlen($output);
    }
}