<?php
declare(strict_types=1);

/**
 * Created by PhpStorm
 * @author Janik Baumann <baumannjanik@gmail.com>
 * @copyright 2014-2017 Janik Baumann
 */
class Pixel
{

    /**
     * @var int
     */
    public $x;

    /**
     * @var int
     */
    public $y;

    /**
     * @var bool
     */
    public $on;

    /**
     * Pixel constructor.
     *
     * @param int $x
     * @param int $y
     */
    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
        $this->on = false;
    }
}