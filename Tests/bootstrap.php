<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

/**
 * @var ClassLoader $loader
 */
if (!file_exists($autoloadFile = __DIR__ . '/../vendor/autoload.php')) {
    throw new \LogicException('Make sure that you install all dependencies.');
}
$loader = require_once $autoloadFile;
AnnotationRegistry::registerLoader(array($loader, 'loadClass'));
