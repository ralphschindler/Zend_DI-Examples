<?php

namespace Foo\Bar;

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