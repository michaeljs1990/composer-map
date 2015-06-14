<?php

namespace Michaeljs1990\Cmap\Graph;

use Michaeljs1990\Cmap\Client\Fetcher;
use Michaeljs1990\Cmap\Parser\Required;
use Michaeljs1990\Cmap\Util\Filter;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Package
{
    // hold dep graph
    protected $graph = array();

    protected $package;
    protected $input;
    protected $output;

    const BASE_URL = "https://packagist.org/packages/";

    public function __construct($package, InputInterface $input, OutputInterface $output)
    {
        $this->package = $package;
        $this->input = $input;
        $this->output = $output;
    }

    public function execute()
    {
        $package = [$this->package => "dev-master"];

        $this->recursiveGet($package);

        $this->output->write(count($this->graph) . " required dependencies" . PHP_EOL);
    }

    private function recursiveGet($package)
    {
        if(empty($package)) return null;

        array_map(function($k, $v) {
            $deps = [];

            if(!empty($k)) {
                $deps = $this->getDeps($k);
                $this->graph = array_merge($this->graph, $deps);
            }

            $this->recursiveGet($deps);
        }, array_keys($package), $package);
    }

    private function getDeps($package)
    {
        $fetcher = new Fetcher(self::BASE_URL, $package);
        $json = $fetcher->get();

        // Get initial dependencies
        $required = (new Required($json, "dev-master"))->parse();

        // Filter out non packages
        return (new Filter($required))->run();
    }

    private function cleanArray($array)
    {
        if($array == null) {
            return $array;
        }

        while(key($array) == 0) {
            $array = $array[0];
        }

        return $array;
    }
}