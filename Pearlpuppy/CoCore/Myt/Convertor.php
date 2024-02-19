<?php
namespace Pearlpuppy\CoCore\Myt;

/**
 *  @file    Convertor
 */

/**
 *
 */
class Convertor extends Abs_PqIterator
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
    public function __construct(?string $selector = null, array|object $array = [], int $flags = 0)
    {
        parent::__construct($selector, $array, $flags);
    }

    // Methods

    /**
     *  !!![PND]
     */
    public function geneCon(): \Generator
    {
        $this->rewind();
        while ($this->valid()) {
            // yield new DlPair($this->key(), $this->current());
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
