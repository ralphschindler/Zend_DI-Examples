<?php

namespace MovieApp {
    class Lister {
        public $finder;
        public function setFinder(FinderInterface $finder){
            $this->finder = $finder;
        }
    }

    class DbFinder implements FinderInterface{
    }

    interface FinderInterface {
    }
}

namespace {
    // bootstrap
    include 'zf2bootstrap' . ((stream_resolve_include_path('zf2bootstrap.php')) ? '.php' : '.dist.php');

    $di = new Zend\Di\Di;
    $di->configure(new Zend\Di\Configuration(array(
        'instance' => array(
            'preferences' => array(
                'MovieApp\FinderInterface' => 'MovieApp\DbFinder'
            )
        )
    )));
    $lister = $di->get('MovieApp\Lister');
    
    // expression to test
    $works = ($lister->finder instanceof MovieApp\DbFinder);

    // display result
    echo (($works) ? 'It works!' : 'It DOES NOT work!') . PHP_EOL;
}
