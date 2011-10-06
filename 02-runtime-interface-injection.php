<?php

namespace Foo\Bar {
    class Baz implements BamAwareInterface {
        public $bam;
        public function setBam(Bam $bam){
            $this->bam = $bam;
        }
    }
    class Bam {
    }
    interface BamAwareInterface
    {
        public function setBam(Bam $bam);
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
