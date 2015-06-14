<?php

$base = ["composer/composer" => "dev-master"];

$base["deps"] = [];

$base["deps"] = array_merge($base["deps"], ["some/package" => "dev-mster"]);
$base["deps"] = array_merge($base["deps"], ["other/package" => "dev-master"]);

var_dump($base);
