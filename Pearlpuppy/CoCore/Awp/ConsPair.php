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
    protected function dlContents(string $dt, string $dd): array
    {
#        $contents = ['dt' => new Myt\Lime('dt', $dt), 'dd' => new Myt\Lime('dd', $dd)];
        return parent::dlContents($dt, $dd);
    }

    /**
     *
     */

    /**
     *
     */

//[EOC]*/
}
