<?php

namespace Michaeljs1990\Cmap\CStruct;

class Graph implements \JsonSerializable
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
     * Get number of dependencies in graph
     */
    public function size()
    {
        return 1 + $this->sizeRecursive($this->root->getDependencies());
    }

    private function sizeRecursive($array)
    {
        $count = 0;

        if(count($array) == 0) {
            return 0;
        }

        foreach ($array as $value) {
            $count += $this->sizeRecursive($value->getDependencies());
        }

        return count($array) + $count;
    }

    /**
     * Advance to index
     * @param String $index
     */
    public function advance($index)
    {
        $next = $this->current->getDependency($index);

        if (isset($next)) {
            $this->current = $next;
        }
    }

    public function back()
    {
        $parent = $this->current->getParent();

        if (isset($parent)) {
            $this->current = $this->current->getParent();
        }
    }

    public function getRoot()
    {
        return $this->root;
    }

    public function getCurrent()
    {
        return $this->current;
    }

    public function jsonSerialize()
    {
        return $this->root;
    }

}