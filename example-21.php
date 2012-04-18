<?php

namespace MovieApp {
    
    class Lister implements FinderAwareInterface {
        public $finder;
        public function setFinder(Finder $finder){
            $this->finder = $finder;
        }
    }
    
    class Finder {
        public function findAllByName($name) {}
    }
    
    interface FinderAwareInterface {
        public function setFinder(Finder $finder);
    }
}

namespace {
    // bootstrap
    include 'zf2bootstrap' . ((stream_resolve_include_path('zf2bootstrap.php')) ? '.php' : '.dist.php');

    $di = new Zend\Di\Di;
    $lister = new MovieApp\Lister;

    $di->injectDependencies($lister);

    // expression to test
    $works = ($lister->finder instanceof MovieApp\Finder);

    // display result
    echo (($works) ? 'It works!' : 'It DOES NOT work!') . PHP_EOL;

}
