<?php
namespace Pearlpuppy\CoCore\Awp;

use Pearlpuppy\CoCore\Myt;
use Pearlpuppy\CoCore\Myt\Lime;

/**
 *  @file    Nottingham
 *
 */

/**
 *
 */
class Nottingham extends Myt\Invertor
{

    // Mixins

    /**
     *
     */

    // Constructor

    /**
     *  !!![PND]
     */
    public function __construct(array|object $array = [], int $flags = 0)
    {
        // $this->verify('dl');
        // $this->classify('nottingham');
        parent::__construct($array, $flags);
    }

    // Methods

    /**
     *  !!![PND]
     */
    public function geneCon(): \Generator
    {
        $this->rewind();
        while ($this->valid()) {
            // yield new ConsPair($this->key(), $this->current());
            $this->next();
        }
    }

    /**
     *
     */

    /**
     *
     */

    /**
     *
     */

//[EOC]*/
}
