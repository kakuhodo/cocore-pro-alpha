<?php
namespace Pearlpuppy\CoCore\Myt;

/**
 *  @file   Solo
 */

/**
 *  Singleton pattern
 */
trait Tr_Solo
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
    private static ?object $instance = null;

    // Constructor

    /**
     *
     */
    private function __construct()
    {
        // something initialise
    }

    // Methods

    /**
     *
     */
    public static function getInstance(): object
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     *
     */

    /**
     *
     */

//[EOT]*/
}
