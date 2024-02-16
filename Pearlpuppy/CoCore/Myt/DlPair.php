<?php
namespace Pearlpuppy\CoCore\Myt;

/**
 *
 */
class DlPair extends Abs_Citrus {

    // Properties
 
    /**
     *
     */
    private array $inputs = [];

    // Constructor

    /**
     *
     */
    public function __construct(string $dt, mixed $dd)
    {
        $contents = ['dt' => new Lime('dt', $dt), 'dd' => new Lime('dd', $dd)];
        parent::__construct('div.row', $contents);
    }

    // Methods

    /**
     *
     *
    public function reverseVal(Int_PQueue $object = $this->content['dd'])
    {
        if ($object->content instanceof Int_PQueue) {
            $this->reverseVal($object->content);
        } else {
            return $object->content;
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
