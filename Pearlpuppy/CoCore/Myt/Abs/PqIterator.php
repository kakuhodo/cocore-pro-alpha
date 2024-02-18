<?php
namespace Pearlpuppy\CoCore\Myt;

/**
 *  @file    PqIterator
 */

/**
 *
 */
abstract class Abs_PqIterator extends \ArrayIterator implements Int_PqPie
{

    // Mixins

    /**
     *
     */
    use Tr_Citrine;

    // Constructor

    /**
     *
     */
    public function __construct(array|object $array = [], int $flags = 0)
    {
        parent::__construct($array, $flags);
    }

    /**
     *
     */

//[EOAC]*/
}
