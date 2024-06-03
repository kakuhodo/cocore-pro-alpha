<?php
namespace Pearlpuppy\CoCore\Awp;

/**
 *  @file   Filter
 */

/**
 *  @since  ver. 0.11.0 (edit. Pierre)
 */
final class Filter extends Abs_Hook
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
        foreach ($this->callees as $method) {
#            call_user_func($this->funk, $this->hook_name, [$this->roller, $method]);
            call_user_func($this->funk, $this->hook_name, [__NAMESPACE__ . '\Trolley', $method]);
       }
    }

    /**
     *
     */

    /**
     *
     */

//[EOFC]*/
}
