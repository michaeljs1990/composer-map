<?php

require __DIR__ . "/vendor/autoload.php";

use Michaeljs1990\Cmap\CmapCommand;
use Symfony\Component\Console\Application;

$application = new Application();
$application->add(new CmapCommand());
$application->run();
