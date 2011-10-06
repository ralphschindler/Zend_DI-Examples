<?php

namespace Foo\Bar;


class Baz implements BamAware {
    public $bam;
    public function setBam(Bam $bam){
        $this->bam = $bam;
    }
}


