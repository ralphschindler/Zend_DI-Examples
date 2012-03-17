<?php

namespace MovieApp {
    class Lister1 {
        public $finder;
        public function __construct(Finder $finder){
            $this->finder = $finder;
        }
    }

    class Lister2 {
        public $finder;
        public function __construct(Finder $finder){
            $this->finder = $finder;
        }
    }


    class Finder {
        public $source;
        public function __construct(Source $source) {
            $this->source = $source;
        }
    }

    class Source {
    }

}

namespace {
    // bootstrap
    include 'zf2bootstrap' . ((stream_resolve_include_path('zf2bootstrap.php')) ? '.php' : '.dist.php');

    $di = new Zend\Di\Di;
    $di->configure(new Zend\Di\Configuration(array(
        'instance' => array(
            'MovieApp\Finder' => array(
                'shared' => false
            )
        )
    )));
    $lister1 = $di->get('MovieApp\Lister1');
    $lister2 = $di->get('MovieApp\Lister2');

    // expression to test
    $works = ($lister1->finder instanceof MovieApp\Finder
        && $lister1->finder !== $lister2->finder
        && $lister1->finder->source === $lister2->finder->source
    );

    // display result
    echo (($works) ? 'It works!' : 'It DOES NOT work!') . PHP_EOL;
}
