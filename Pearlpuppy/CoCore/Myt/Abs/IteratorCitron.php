<?php
namespace Pearlpuppy\CoCore\Myt;

/**
 *  @file    IteratorCitron
 *
 */

/**
 *
 */
abstract class Abs_IteratorCitron extends \ArrayIterator implements Int_PQueue
{

    // Mixins

    use Tr_Citrine;

    // Constructor

    /**
     *
     */
    public function __construct(array|object $array = [], int $flags = 0)
    {
#        $this->content = new \ArrayIterator();
        parent::__construct($array, $flags);
    }

    /**
     *
     */

//[EOAC]*/
}
