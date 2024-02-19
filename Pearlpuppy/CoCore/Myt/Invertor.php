<?php
namespace Pearlpuppy\CoCore\Myt;

/**
 *  @file    Invertor
 */

/**
 *
 */
class Invertor extends Abs_PqRecursiveIterator
{

    // Mixins

    /**
     *
     */
    use Tr_LemonPie;

    // Constructor

    /**
     *
     */
    public function __construct(array|object $array = [], int $flags = 0)
    {
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
