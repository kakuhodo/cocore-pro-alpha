<?php
namespace Pearlpuppy\CoCore\Myt;

/**
 *  @file    PqRecursiveIterator
 */

/**
 *
 */
abstract class Abs_PqRecursiveIterator extends \RecursiveArrayIterator implements Int_PqPie
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
