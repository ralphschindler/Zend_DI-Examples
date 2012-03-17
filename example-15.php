<?php

namespace System {
    class Mapper {
        public $drivers;
        public function addDriver(Driver $driver, $name){
            $this->drivers[] = array($driver, $name);
        }
    }
    interface Driver {
    }
}

namespace DifferentNs {
    class DriverOne implements \System\Driver {}
    class DriverTwo implements \System\Driver {}
}

namespace {
    // bootstrap
    include 'zf2bootstrap' . ((stream_resolve_include_path('zf2bootstrap.php')) ? '.php' : '.dist.php');

    $di = new Zend\Di\Di;
    $di->configure(new Zend\Di\Configuration(array(
        'definition' => array(
            'class' => array(
                'System\Mapper' => array(
                    'addDriver' => array(
                        'driver' => array('type' => 'System\Driver', 'required' => true),
                        'name' => array('required' => true)
                    )
                )
            )
        ),
        'instance' => array(
            'System\Mapper' => array(
                'injections' => array(
                    'addDriver' => array(
                        array('driver' => 'DifferentNs\DriverOne', 'name' => 'foo'),
                        array('driver' => 'DifferentNs\DriverTwo', 'name' => 'bar')
                    )
                )
            )
        )
    )));
    $mapper = $di->get('System\Mapper');

    // expression to test
    $works = (
        $mapper->drivers[0][0] instanceof DifferentNs\DriverOne
        && $mapper->drivers[1][0] instanceof DifferentNs\DriverTwo
    );

    // display result
    echo (($works) ? 'It works!' : 'It DOES NOT work!') . PHP_EOL;
}
