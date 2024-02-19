<?php
namespace Pearlpuppy\CoCore\Myt;

/**
 *    @file    Citrus
 *        Much autonomic subversion of Citron.
 */
abstract class Abs_Citrus extends Abs_Citron
{

    // Mixins

    /**
     *
     */

    // Constants

    /**
     *
     */

    // Properties

    /**
     *
     */

    // Constructor

    /**
     *    @param    $selector    (string)    CSS selector
     */
    public function __construct(?string $selector = null, mixed $contents = array())
    {
        if ($selector) {
            $this->cracker($selector);
        }
        $this->content = $this->cleanContent($contents);
        $this->listen();
    }

    // Methods

    /**
     *
     */

//[EOAC]*/
}
