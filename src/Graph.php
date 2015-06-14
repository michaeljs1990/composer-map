<?php

namespace Michaeljs1990\Cmap;

class Graph
{
    protected $root;
    protected $current;

    public function __construct(array $array)
    {
        $this->root = new Node($array);
        $this->current = $this->root;
    }

    public function set(array $package)
    {
        $this->current->setDeps($package);
    }

    /**
     * Advance to index
     * @param String $index
     */
    public function advance($index)
    {

        $this->current = $this->current->getDependency($index);
    }

    public function getRoot()
    {
        return $this->root;
    }

    public function getCurrent()
    {
        return $this->current;
    }

}