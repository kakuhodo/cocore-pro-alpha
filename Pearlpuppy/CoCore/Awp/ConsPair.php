<?php
namespace Pearlpuppy\CoCore\Awp;

use Pearlpuppy\CoCore\Myt;
use Pearlpuppy\CoCore\Myt\Lime;

/**
 *
 */
class ConsPair extends Myt\DlPair {

    // Properties
 
    /**
     *
     */

    // Constructor

    /**
     *
     */
    public function __construct(string $dt, mixed $dd)
    {
        parent::__construct($dt, $dd);
    }

    // Methods

    /**
     *
     */
    protected function dlContents(string $dt, mixed $dd): array
    {
        return parent::dlContents($dt, self::slap($dd));
    }

    /**
     *
     */

    /**
     *
     */

//[EOC]*/
}