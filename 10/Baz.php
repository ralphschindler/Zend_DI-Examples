<?php

namespace Foo\Bar;

class Baz {
    public $bam;
    public function __construct(Bam $bam){
        $this->bam = $bam;
    }
}
