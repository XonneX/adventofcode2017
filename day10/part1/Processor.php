<?php
/**
 * Created by PhpStorm
 * @author Janik Baumann <baumannjanik@gmail.com>
 * @copyright 2014-2017 Janik Baumann
 */
declare(strict_types=1);

namespace day10\part1;


class Processor
{


    public function process(string $instructions, int $cmpVal1, int $cmpVal2): int
    {
        $this->processInstructions($instructions);

        return 0;
    }

    private function processInstructions(string $instructions): void
    {
        preg_match_all('/value (.*) goes to bot (.*)/', $instructions, $setupInstructions, PREG_SET_ORDER);
        var_dump($setupInstructions);
        preg_match_all('/bot (.*) gives low to (.*) (.*) and high to (.*) (.*)/', $instructions, $moveInstructions);
        var_dump($moveInstructions);
    }
}