<?php


namespace MovieApp {
    use Zend\Di\Definition\Annotation as Di;
    class Lister {
        public $finder;
        /**
         * @Di\Inject()
         */
        public function setFinder(Finder $finder){
            $this->finder = $finder;
        }
    }
    class Finder {
    }
}

namespace {
    // bootstrap
    include 'zf2bootstrap' . ((stream_resolve_include_path('zf2bootstrap.php')) ? '.php' : '.dist.php');

    $di = new Zend\Di\Di;
    $di->definitions()->getDefinitionForClass('MovieApp\Lister')->getIntrospectionStrategy()->setUseAnnotations(true);
    $lister = $di->get('MovieApp\Lister');

    // expression to test
    $works = ($lister->finder instanceof MovieApp\Finder);

    // display result
    echo (($works) ? 'It works!' : 'It DOES NOT work!') . PHP_EOL;
}
