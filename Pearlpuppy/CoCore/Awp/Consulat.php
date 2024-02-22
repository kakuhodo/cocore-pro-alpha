<?php
namespace Pearlpuppy\CoCore\Awp;

use Pearlpuppy\CoCore\Myt;
use Pearlpuppy\CoCore\Myt\Lime;

/**
 *  @file    Consulat
 *
 */

/**
 *
 */
class Consulat extends Myt\Convertor
{

    // Mixins

    /**
     *
     */

    // Properties
 
    /**
     *
     */

    // Constructor

    /**
     *
     */
    public function __construct(array|object $array = [], int $flags = 0)
    {
        parent::__construct('dl.consulat', $array, $flags);
    }

    // Methods

    /**
     *
     */
    public function geneCon(): \Generator
    {
        $this->rewind();
        while ($this->valid()) {
            yield new ConsPair($this->key(), $this->current());
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
