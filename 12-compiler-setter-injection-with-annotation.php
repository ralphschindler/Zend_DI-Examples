<?php

include 'zf2bootstrap.php';

// must register autoloader
$autoloader->registerNamespace('Foo\Bar', __DIR__ . '/12');

$compiler = new Zend\Di\Definition\CompilerDefinition();
$compiler->addDirectory(__DIR__ . '/12/');
$compiler->compile();
$definitions = new Zend\Di\DefinitionList($compiler);
$di = new Zend\Di\Di($definitions);

$baz = $di->get('Foo\Bar\Baz');

// expression to test
$works = ($baz->bam instanceof Foo\Bar\Bam);

// display result
echo (($works) ? 'It works!' : 'It DOES NOT work!');
