<?php
namespace Pearlpuppy\CoCore\Awp;

/**
 *  @file   Action
 */

/**
 *  @since  ver. 0.11.0 (edit. Pierre)
 */
class Action extends Abs_Hook
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
     *
     */

    // Methods

    /**
     *
     */
    public function hook()
    {
        call_user_func($this->funk, $this->hook_name, [$this, 'crock']);
    }

    /**
     *
     */
    public function crock(...$args)
    {
        foreach ($this->callees as $method) {
#            call_user_func([$this->roller, $method], ...$args);
            call_user_func([__NAMESPACE__ . '\Trolley', $method], ...$args);
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

//[EOFC]*/
}
