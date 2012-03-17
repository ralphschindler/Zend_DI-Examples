<?php

namespace MovieApp {
    class Lister {
        public $dbFinder;
        public function __construct(DbFinder $dbFinder){
            $this->dbFinder = $dbFinder;
        }
    }
    class DbFinder {
        public $username, $password = null;
        public function __construct($username, $password)
        {
            $this->username = $username;
            $this->password = $password;
        }
    }
}

namespace {
    // bootstrap
    include 'zf2bootstrap' . ((stream_resolve_include_path('zf2bootstrap.php')) ? '.php' : '.dist.php');

    $di = new Zend\Di\Di;
    $di->instanceManager()->setParameters(
        'MovieApp\DbFinder',
        array(
            'username' => 'my-username',
            'password' => 'my-password'
        )
    );
    $lister = $di->get('MovieApp\Lister');
    
    
    // expression to test
    $works = (
        $lister->dbFinder instanceof MovieApp\DbFinder
        && $lister->dbFinder->username == 'my-username'
        && $lister->dbFinder->password == 'my-password'
    );

    // display result
    echo (($works) ? 'It works!' : 'It DOES NOT work!') . PHP_EOL;
    
}
