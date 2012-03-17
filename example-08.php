<?php

namespace Application {
    class Page {
        public $blocks;
        public function addBlock(Block $block){
            $this->blocks[] = $block;
        }
    }
    interface Block {
    }
}

namespace DifferentNs {
    class BlockOne implements \Application\Block {}
    class BlockTwo implements \Application\Block {}        
}

namespace {
    // bootstrap
    include 'zf2bootstrap' . ((stream_resolve_include_path('zf2bootstrap.php')) ? '.php' : '.dist.php');

    $di = new Zend\Di\Di;
    $di->configure(new Zend\Di\Configuration(array(
        'definition' => array(
            'class' => array(
                'Application\Page' => array(
                    'addBlock' => array(
                        'block' => array('type' => 'Application\Block', 'required' => true)
                    )
                )
            )
        ),
        'instance' => array(
            'Application\Page' => array(
                'injections' => array(
                    'DifferentNs\BlockOne',
                    'DifferentNs\BlockTwo'
                )
            )
        )
    )));
    $page = $di->get('Application\Page');

    // expression to test
    $works = (
        $page->blocks[0] instanceof DifferentNs\BlockOne
        && $page->blocks[1] instanceof DifferentNs\BlockTwo
    );

    // display result
    echo (($works) ? 'It works!' : 'It DOES NOT work!') . PHP_EOL;
}
