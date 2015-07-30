#!/usr/bin/env php
<?php
require 'vendor/autoload.php';

use Lsv\Yatzee\Application;
use Lsv\Yatzee\Types;

$types = new Types();
$types->addType(new Types\Yatzee());
$types->addType(new Types\FiveOfaKind());
$types->addType(new Types\FourOfaKind());
$types->addType(new Types\FullHouse());
$types->addType(new Types\ThreeOfaKind());
$types->addType(new Types\Pair());

$application = new Application($types);
$application->run();