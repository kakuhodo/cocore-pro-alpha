<?php
namespace Pearlpuppy\CoCore\Myt;

/**
 *  @file    Consul
 *
 */

/**
 *
 */
class Consul extends Convertor
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
