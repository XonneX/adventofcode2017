<?php
declare(strict_types=1);

/**
 * Created by PhpStorm
 * @author Janik Baumann <baumannjanik@gmail.com>
 * @copyright 2014-2017 Janik Baumann
 */
class Solution
{

    /**
     * @param string $input Compressed data
     * @return int Decompressed length
     */
    public function process(string $input): int
    {
        $output = '';

        while (strlen($input) > 0) {
            preg_match_all('/^([A-Z]*)|^(\([0-9]*x[0-9]*\))/', $input, $matches, PREG_SET_ORDER);

            if (isset($matches[1])) {
                $marker = $matches[1][0];

            } else {
                $output .= $matches[0][0];
                $input = substr($input, strlen($matches[0][0]));
            }
        }

        $output = str_replace(' ', '', $output);
        return strlen($output);
    }
}