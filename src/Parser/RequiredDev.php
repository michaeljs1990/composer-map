<?php

namespace Michaeljs1990\Cmap\Parser;

class RequiredDev extends Parser
{
    protected $version;

    public function __construct($json, $version)
    {
        $this->version = $version;
        parent::__construct($json);
    }

    public function parse()
    {
        $dev = [];
        $json = json_decode($this->json, true);

        if(array_key_exists("require-dev", $json['package']['versions'][$this->version])) {
            $required = $json['package']['versions'][$this->version]['require-dev'];
        }

        return $dev;
    }
}