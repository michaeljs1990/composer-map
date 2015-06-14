<?php

namespace Michaeljs1990\Cmap\Util;

/**
 * Removes dependencies that are not part of packagist
 * such as pecl modules or a php version dep.
 *
 * Class Filter
 * @package Michaeljs1990\Cmap\Util
 */
class Filter
{
    protected $array;

    public function __construct(array $array)
    {
        $this->array = $array;
    }

    public function run()
    {
        // array_filter on k/v doesn't work in
        // php55 without a pollyfill
        foreach($this->array as $k => $v) {
            $size = explode("/", $k);
            if(count($size) <= 1) {
                unset($this->array[$k]);
            }
        }

        return $this->array;
    }
}