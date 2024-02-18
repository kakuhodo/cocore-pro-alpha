<?php
namespace Pearlpuppy\CoCore\Awp;

use Pearlpuppy\CoCore\Myt;
use Pearlpuppy\CoCore\Myt\Lime;

/**
 *  @file    Nottingham
 *
 */

/**
 *
 */
class Nottingham extends Myt\Abs_PqIterator
{

    // Mixins

    /**
     *
     */

    // Constructor

    /**
     *
     */
    public function __construct(array|object $array = [], int $flags = 0)
    {
        $this->verify('dl');
        $this->classify('consulat');
        parent::__construct($array, $flags);
    }

    /**
     *
     */
    public function impose()
    {
        $this->trans();
        return parent::impose();
    }

    /**
     *
     */
    public function trans(): void
    {
        $this->content = $this->geneCon();
    }

    /**
     *
     */
    public function geneCon(): \Generator
    {
        $this->rewind();
        while ($this->valid()) {
            yield new ConsPair($this->key(), $this->current());
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

//[EOAC]*/
}
