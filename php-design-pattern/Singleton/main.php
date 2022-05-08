<?php
require_once '../autoload.php';

use Singleton\Logger;
use Singleton\Config;

Logger::log('Started');
$a = Logger::getInstance();
$b = Logger::getInstance();

echo sprintf("a === b %s\n", $a === $b);

$c = Config::getInstance();
$d = Config::getInstance();

$c->setValue('database', 'mysql');
echo $d->getValue('database') . "\n";
Logger::log('Finished');
