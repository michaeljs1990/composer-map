<?php

namespace Michaeljs1990\Cmap\Test;

use Michaeljs1990\Cmap\CStruct\Graph;
use Michaeljs1990\Cmap\CStruct\Node;

class GraphTest extends \PHPUnit_Framework_TestCase
{
    public function testSetRootNode()
    {
        $base_package = ["base/package" => "dev-master"];

        $graph = new Graph($base_package);

        $this->assertEquals(new Node($base_package), $graph->getCurrent());
    }

    public function testSetNode()
    {
        $base_package = ["base/package" => "dev-master"];

        $graph = new Graph($base_package);

        $this->assertEquals(new Node($base_package), $graph->getRoot());

        $dep = ["second/package" => "dev-master"];

        $graph->set($dep);

        $parent_node = new Node($base_package);
        $parent_node->setDeps($dep, $parent_node);
        $this->assertEquals($graph->getCurrent()->getDependency("second/package"),
            new Node($dep, $parent_node));
    }

    public function testSetManyNodes()
    {
        $base_package = ["base/package" => "dev-master"];

        $graph = new Graph($base_package);

        $this->assertEquals(new Node($base_package), $graph->getCurrent());

        $dep = ["second/package" => "dev-master"];
        $dep1 = ["third/package" => "dev-master"];

        $graph->set($dep);
        $graph->set($dep1);

        $parent_node = new Node($base_package);
        $parent_node->setDeps($dep, $parent_node);
        $parent_node->setDeps($dep1, $parent_node);
        $this->assertEquals($graph->getCurrent()->getDependencies(),
            [new Node($dep, $parent_node), new Node($dep1, $parent_node)]);
    }

    public function testAdvanceNode()
    {
        $base_package = ["base/package" => "dev-master"];

        $graph = new Graph($base_package);

        $this->assertEquals(new Node($base_package), $graph->getCurrent());

        $dep = ["second/package" => "dev-master"];

        $graph->set($dep);

        $parent_node = new Node($base_package);
        $parent_node->setDeps($dep, $parent_node);
        $this->assertEquals($graph->getCurrent()->getDependency("second/package"), new Node($dep, $parent_node));

        $graph->advance("second/package");

        $this->assertEquals($graph->getCurrent(), new Node($dep, $parent_node));
    }

    public function testSetDeepNode()
    {
        $base_package = ["base/package" => "dev-master"];

        $graph = new Graph($base_package);

        $this->assertEquals(new Node($base_package), $graph->getCurrent());

        $dep = ["second/package" => "dev-master"];

        $graph->set($dep);

        $parent_node = new Node($base_package);
        $parent_node->setDeps($dep, $parent_node);
        $child_node = new Node($dep, $parent_node);
        $this->assertEquals($graph->getCurrent()->getDependency("second/package"), $child_node);

        $graph->advance("second/package");

        $this->assertEquals($graph->getCurrent(), $child_node);

        $deep_node = ['deep/node' => "dev-master"];

        $graph->set($deep_node);

        $child_node = $parent_node->getDependency("second/package")->setDeps($deep_node);
        $deep_node = new Node($deep_node, $child_node);
        $this->assertEquals($graph->getCurrent()->getDependency("deep/node"), $deep_node);
    }
}