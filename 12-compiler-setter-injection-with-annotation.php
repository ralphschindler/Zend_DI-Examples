<?php

include 'zf2bootstrap.php';
$di = new Zend\Di\Di;
$baz = $di->get('Foo\Bar\Baz');

// expression to test
$works = ($baz->bam instanceof Foo\Bar\Bam);

// display result
echo (($works) ? 'It works!' : 'It DOES NOT work!');
