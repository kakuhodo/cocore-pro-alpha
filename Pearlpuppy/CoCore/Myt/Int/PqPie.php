<?php
namespace Pearlpuppy\CoCore\Myt;

/**
 *  @file    PqPie
 */

/**
 *  The 'Lemon' object that stores serial 'Lemon' objects, like a list.
 *  'Pie' derived from maltilayered dough of that.
 *  This pattern must have parallel storing system for input/output.
 */
interface Int_PqPie extends Int_PQueue, \Traversable {

    // Methods

    /**
     *  Transforms INPUT data-format (Iterator) to OUTPUT one (Generator)
     */
    public function trans(): void;

    /**
     *
     */

    /**
     *
     */

//[EOI]*/
}