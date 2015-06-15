<?php

/*
 * PHP Phar - How to create and use a Phar archive
 */

$p = new Phar('cmap.phar', 0, 'cmap');
//issue the Phar::startBuffering() method call to buffer changes made to the archive until you issue the Phar::stopBuffering() command
$p->startBuffering();

//set the Phar file stub
//the file stub is merely a small segment of code that gets run initially when the Phar file is loaded,
//and it always ends with a __HALT_COMPILER()
$p->setStub('#/usr/bin/php  <?php Phar::mapPhar(); include "phar://cmap/cmap.php"; __HALT_COMPILER();?>');

//Adding files to an archive using Phar::buildFromDirectory()
//adds all of the PHP files in the stated directory to the Phar archive
$p->buildFromDirectory(__DIR__ . '/../src', '$(.*)\.php$');
$p->buildFromDirectory(__DIR__ . '/../vendor', '$(.*)\.php$');
$p->buildFromDirectory(__DIR__ . '/../.', '$(.*)\.php$');

print_r($p);

//Stop buffering write requests to the Phar archive, and save changes to disk
$p->stopBuffering();
