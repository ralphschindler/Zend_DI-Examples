<?php

namespace Foo\Bar {
    use Zend\Di\Definition\Annotation as Di;
    class Baz {
        public $bam;

        /**
         * @Di\Inject()
         */
        public function setBam(Bam $bam){
            $this->bam = $bam;
        }

    }
    class Bam {
    }
}

namespace {
    include 'zf2bootstrap.php';
    $di = new Zend\Di\Di;
    $baz = $di->get('Foo\Bar\Baz');

    // expression to test
    $works = ($baz->bam instanceof Foo\Bar\Bam);

    // display result
    echo (($works) ? 'It works!' : 'It DOES NOT work!');
}
