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

    /**
     *
     *
    use Tr_Citrine, Tr_LemonPie {
        Tr_LemonPie::impose insteadof Tr_Citrine;
        Tr_Citrine::impose as originalImpose;
    }

    // Constructor

    /**
     *
     */
    public function __construct(?string $selector = null, array|object $array = [], int $flags = 0)
    {
        if ($selector) {
            $this->cracker($selector);
        }
        parent::__construct($array, $flags);
    }

    /**
     *  Pushes data into the stream
     *  @since  ver. 0.12.2 (edit. Pierre)
     */
    public function hop(mixed $output, string|int|null $label = null): void
    {
        $this[$label] = $output;
    }

    /**
     *
     */

//[EOAC]*/
}
