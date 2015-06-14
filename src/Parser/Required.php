<?php

namespace Michaeljs1990\Cmap\Parser;

class Required extends Parser
{
    protected $version;

    public function __construct($json, $version)
    {
        $this->version = $version;
        parent::__construct($json);
    }

    public function parse()
    {
        $json = json_decode($this->json, true);
        $required = $json['package']['versions'][$this->version]['require'];

        return $required;
    }
}