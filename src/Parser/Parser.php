<?php

namespace Michaeljs1990\Cmap\Parser;


abstract class Parser
{
    protected $json;

    public function __construct($json)
    {
        $this->json = $json;
    }

    abstract public function parse();
}