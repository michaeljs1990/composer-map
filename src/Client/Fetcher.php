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
    protected $client;

    public function __construct($baseURL, $package, Client $client)
    {
        $this->baseURL = $baseURL;
        $this->package = $package;
        $this->client = $client;
    }

    /**
     * Fetch the JSON of this package
     *
     * @return \Psr\Http\Message\StreamInterface
     */
    public function get()
    {
        $response = $this->client->get($this->baseURL . $this->package . ".json");
        return $response->getBody();
    }
}