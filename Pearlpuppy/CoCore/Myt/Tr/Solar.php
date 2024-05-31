<?php
namespace Pearlpuppy\CoCore\Myt;

/**
 *  @file   Solar
 */

/**
 *  Singleton pattern
 *      extendable version of Tr_Solo
 */
trait Tr_Solar
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
    protected static ?object $instance = null;

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
        if (static::$instance === null) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    /**
     *
     */

    /**
     *
     */

//[EOT]*/
}
