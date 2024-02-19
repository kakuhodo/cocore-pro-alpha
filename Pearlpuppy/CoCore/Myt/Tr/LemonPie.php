<?php
namespace Pearlpuppy\CoCore\Myt;

/**
 * @file    LemonPie
 */

/**
 *  Members for PqPie implement
 */
trait Tr_LemonPie {

    // Mixins

    /**
     *
     */

    // Properties

    /**
     *
     */

    // Methods

    /**
     *
     */
    public function impose(): string
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
            yield static::seed($this->key(), $this->current(), $this->tag);
            $this->next();
        }
    }

    /**
     *
     */

//[EOT]*/
}
