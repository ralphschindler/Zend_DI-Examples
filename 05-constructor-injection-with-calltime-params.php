<?php

namespace Foo\Bar {
    class Baz {
        public $bam;
        public function __construct(Bam $bam){
            $this->bam = $bam;
        }
    }
    class Bam {
        public $username, $password = null;
        public function __construct($username, $password)
        {
            $this->username = $username;
            $this->password = $password;
        }
    }
}

namespace {
    include 'zf2bootstrap.php';
    $di = new Zend\Di\Di;
    $baz = $di->get('Foo\Bar\Baz', array(
        'username' => 'my-username',
        'password' => 'my-password'
    ));
    
    // expression to test
    $works = (
        $baz->bam instanceof Foo\Bar\Bam
        && $baz->bam->username == 'my-username'
        && $baz->bam->password == 'my-password'
    );

    // display result
    echo (($works) ? 'It works!' : 'It DOES NOT work!');
}
