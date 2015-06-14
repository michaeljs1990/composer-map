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
        if(array_key_exists('php', $this->array)) {
            unset($this->array['php']);
        }

        if(array_key_exists('ext-mbstring', $this->array)) {
            unset($this->array['ext-mbstring']);
        }

        return $this->array;
    }
}