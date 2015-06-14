<?php

namespace Michaeljs1990\Cmap;

class Node
{
    protected $parent;
    protected $package;
    protected $deps;

    public function __construct(array $package, Node $parent = null)
    {
        $this->parent = $parent;
        $this->package = $package;
        $this->deps = [];
    }

    public function setDeps(array $dep)
    {
        array_push($this->deps, new Node($dep, $this));

        return $this;
    }

    public function getPackage()
    {
        return $this->package;
    }

    /**
     * Get the asked for dependency
     *
     * @param String $index
     * @return Node
     */
    public function getDependency($index)
    {
        foreach ($this->deps as $value) {
            if(key($value->getPackage()) == $index) {
                return $value;
            }
        }

    }

    public function getDependencies()
    {
        return $this->deps;
    }
}