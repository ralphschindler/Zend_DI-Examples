<?php

namespace zf2bootstrap;

if (strpos(__FILE__, '.dist.') !== false) {
    require_once 'includes/Zend_Di-2.0.0beta2.phar';
} else {
    require_once '/path/to/ZF2/library/Zend/Loader/StandardAutoloader.php';
    $autoloader = new \Zend\Loader\StandardAutoloader;
    spl_autoload_register(array($autoloader, 'autoload'));
}



