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
                    'addBlock' => array(
                        'driver' => array('type' => 'Application\Block', 'required' => true),
                        'name' => array('required' => true)
                    )
                )
            )
        ),
        'instance' => array(
            'System\Mapper' => array(
                'injections' => array(
                    array('block' => 'DifferentNs\DriverOne', 'name' => 'foo'),
                    array('block' => 'DifferentNs\DriverTwo', 'name' => 'bar')
                )
            )
        )
    )));
    $page = $di->get('System\Mapper');

    // expression to test
    $works = (
        $page->blocks[0][0] instanceof DifferentNs\DriverOne
        && $page->blocks[1][0] instanceof DifferentNs\DriverTwo
    );

    // display result
    echo (($works) ? 'It works!' : 'It DOES NOT work!');
}
