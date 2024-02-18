<?php
namespace Pearlpuppy\CoCore\Myt;

/**
 *
 */
class DlPair extends Lime {

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
        $contents = $this->dlContents($dt, $dd);
        parent::__construct('div.row', $contents);
    }

    // Methods

    /**
     *
     */
    protected function dlContents(string $dt, mixed $dd): array
    {
        return ['dt' => new Lime('dt', $dt), 'dd' => new Lime('dd', $dd)];
    }

    /**
     *
     */

    /**
     *
     */

//[EOC]*/
}
