<?php

namespace Michaeljs1990\Cmap\Client;

use GuzzleHttp\Client;

/**
 * Fetch JSON from remote composer server for parsing
 *
 * Class Fetcher
 * @package Michaeljs1990\Cmap\Client
 */
class Fetcher
{
    protected $baseURL;
    protected $package;

    public function __construct($baseURL, $package)
    {
        $this->baseURL = $baseURL;
        $this->package = $package;
    }

    /**
     * Fetch the JSON of this package
     *
     * @return \Psr\Http\Message\StreamInterface
     */
    public function get()
    {
        $client = new Client();
        $response = $client->get($this->baseURL . $this->package . ".json");
        echo $this->baseURL . $this->package . ".json" . PHP_EOL;
        return $response->getBody();
    }
}