<?php

namespace MovieApp {
    class Lister {
        public $finderA, $finderB;
        public function setFinderA(Finder $finder) {
            $this->finderA = $finder;
        }
        public function setFinderB(Finder $finder) {
            $this->finderB = $finder;
        }
    }
    class Finder {

    }
}

namespace {
    // bootstrap
    include 'zf2bootstrap' . ((stream_resolve_include_path('zf2bootstrap.php')) ? '.php' : '.dist.php');

    $di = new Zend\Di\Di;

    $di->instanceManager()->setParameters(
        'MovieApp\Lister',
        array(
            'MovieApp\Lister::setFinderA:finder' => new MovieApp\Finder,
            'MovieApp\Lister::setFinderB:finder' => function () {
                return new MovieApp\Finder;
            }
        )
    );

    $lister = $di->get('MovieApp\Lister');

    // expression to test
    $works = ($lister->finderA instanceof MovieApp\Finder
        && $lister->finderB instanceof MovieApp\Finder
        && $lister->finderA !== $lister->finderB
    );

    // display result
    echo (($works) ? 'It works!' : 'It DOES NOT work!') . PHP_EOL;
}

