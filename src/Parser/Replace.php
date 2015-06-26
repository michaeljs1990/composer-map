<?php

namespace Michaeljs1990\Cmap\Parser;

class Replace extends Parser
{
    protected $version;

    public function __construct($json, $version)
    {
        $this->version = $version;
        parent::__construct($json);
    }

    public function parse()
    {
        $required = [];
        $json = json_decode($this->json, true);

        if(array_key_exists("replace", $json['package']['versions'][$this->version])) {
            $required = $json['package']['versions'][$this->version]['replace'];
        }

        return $required;
    }
}