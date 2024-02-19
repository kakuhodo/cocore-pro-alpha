<?php
namespace Pearlpuppy\CoCore\Myt;

/**
 * @file    LemonPie
 */

/**
 *
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
     *  !!![PND]
     */
    public function geneCon(): \Generator
    {
        $this->rewind();
        while ($this->valid()) {
            // yield new ConsPair($this->key(), $this->current());
            $this->next();
        }
    }

    /**
     *
     */

//[EOT]*/
}
