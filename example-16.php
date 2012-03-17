<?php

namespace MovieApp {
    class Lister {
        public $finder;
        public function __construct(Finder $finder){
            $this->finder = $finder;
        }
    }
    class Finder {
        
    }
}

namespace {
    // bootstrap
    include 'zf2bootstrap' . ((stream_resolve_include_path('zf2bootstrap.php')) ? '.php' : '.dist.php');

    use Zend\Di\Di,
        Zend\Di\DefinitionList,
        Zend\Di\Definition\BuilderDefinition;
    
    $builderDefinition = new BuilderDefinition();
    $builderDefinition->createClassesFromArray(array(
        'MovieApp\Lister' => array(
            'methods' => array(
                '__construct' => array(
                    'repo' => 'MovieApp\Finder'
                )
            )
        ),
        'MovieApp\Finder' => array()
    ));
    
    $di = new Di(new DefinitionList(array($builderDefinition)));
    $lister = $di->get('MovieApp\Lister');

    // expression to test
    $works = ($lister->finder instanceof MovieApp\Finder);

    // display result
    echo (($works) ? 'It works!' : 'It DOES NOT work!') . PHP_EOL;


}
