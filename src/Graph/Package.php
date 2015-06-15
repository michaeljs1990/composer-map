<?php

namespace Michaeljs1990\Cmap\Graph;

use Michaeljs1990\Cmap\Client\Fetcher;
use Michaeljs1990\Cmap\CStruct\Graph;
use Michaeljs1990\Cmap\Parser\Required;
use Michaeljs1990\Cmap\Util\Filter;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Package
{
    // hold flat dep graph
    protected $graph;

    protected $package;
    protected $input;
    protected $output;

    const BASE_URL = "https://packagist.org/packages/";

    /**
     * @param $package
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    public function __construct($package, InputInterface $input, OutputInterface $output)
    {
        $this->package = $package;
        $this->input = $input;
        $this->output = $output;
        $this->graph = new Graph([$package => "dev-master"]);
    }

    public function execute()
    {
        $package = [$this->package => "dev-master"];

        $this->recursiveGet($package);

        if(!$this->input->getOption("map")) {
            $this->output->write($this->graph->size() . " required dependencies" . PHP_EOL);
        }

        if($this->input->getOption("map")) {
            $this->printMap();
        }
    }

    /**
     * Recursively get all packages
     *
     * @param $package
     * @return null
     */
    private function recursiveGet($package)
    {
        if(empty($package)) {
            return null;
        }

        $this->graph->advance(key($package));

        array_map(function($k) {
            $deps = [];

            if(!empty($k)) {
                $this->graph->advance($k);
                $deps = $this->getDeps($k);
                var_dump($k, $deps);
                $this->mapDependencies($deps);
            }

            $this->recursiveGet($deps);
            $this->graph->back();
        }, array_keys($package));
    }

    /**
     * Get all the dependencies for a specified package
     *
     * @param $package
     * @return array
     */
    private function getDeps($package)
    {
        $fetcher = new Fetcher(self::BASE_URL, $package);
        $json = $fetcher->get();

        // Get initial dependencies
        $required = (new Required($json, "dev-master"))->parse();

        // Filter out non packages
        return (new Filter($required))->run();
    }

    /**
     * Map given dependencies to graph
     *
     * @param array $deps
     */
    private function mapDependencies(array $deps)
    {
        array_map(function($k, $v) {
            $this->graph->set([$k => $v]);
        }, array_keys($deps), $deps);
    }

    private function printMap()
    {
        $this->output->write(json_encode($this->graph, JSON_PRETTY_PRINT) . PHP_EOL);
    }
}