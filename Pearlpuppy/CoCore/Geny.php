<?php
namespace Pearlpuppy\CoCore;

/**
 *  @file   Geny
 *      
 */

trait Geny
{

    // Constants

    /**
     *
     */

    // Methods

    /**
     *  @since  ver. 0.11.2 (edit. Pierre)
     */
    public static function gaze(bool $nice = true)
    {
        $star = Star::getInstance();
        return $star->gaze($nice);
    }

    /**
     *
     */

    /**
     *
     */

//[EOT]*/
}
