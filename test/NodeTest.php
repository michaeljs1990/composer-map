<?php

namespace Michaeljs1990\Cmap\Test;

use Michaeljs1990\Cmap\CStruct\Node;

class NodeTest extends \PHPUnit_Framework_TestCase
{
    public function testNode()
    {
        $package = ["test/package" => "dev-master"];

        $node = new Node($package);

        $this->assertEquals($node->getPackage(), $package);
    }

    public function testAddDeps()
    {
        $package = ["test/package" => "dev-master"];

        $node = new Node($package);

        $this->assertEquals($node->getPackage(), $package);

        $dep = ["first/package" => "dev-master"];

        $node->setDeps($dep, $node);

        $this->assertEquals($node->getDependencies(), [new Node($dep, $node)]);
    }

    public function testAddManyDeps()
    {
        $package = ["test/package" => "dev-master"];

        $node = new Node($package);

        $this->assertEquals($node->getPackage(), $package);

        $dep = ["first/package" => "dev-master"];
        $dep1 = ["second/package" => "dev-master"];

        $node->setDeps($dep, $node);
        $node->setDeps($dep1, $node);

        $this->assertEquals($node->getDependencies(), [new Node($dep, $node), new Node($dep1, $node)]);
    }
}