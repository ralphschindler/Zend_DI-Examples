<?php

namespace MovieApp {
    class Lister {
        public $finder;
        public function setFinder(Finder $finder) {
            $this->finder = $finder;
        }
    }
    class Finder {
        public $id;
        public function __construct($id) {
            $this->id = $id;
        }
    }
}

namespace {
    // bootstrap
    include 'zf2bootstrap' . ((stream_resolve_include_path('zf2bootstrap.php')) ? '.php' : '.dist.php');

    $di = new Zend\Di\Di;
    $di->instanceManager()->setParameters('MovieApp\Lister', array('finder' => function () {
        return new MovieApp\Finder('foo');
    }));


    $lister = $di->get('MovieApp\Lister');

    // expression to test
    $works = ($lister->finder instanceof MovieApp\Finder && $lister->finder->id === 'foo');

    // display result
    echo (($works) ? 'It works!' : 'It DOES NOT work!') . PHP_EOL;
}

