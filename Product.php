<?php
namespace Kakuhodo\CoCore;

use Pearlpuppy\CoCore\Awp\Abs_Plugin;

/**
 *  @file   
 *      
 */

class Product extends Abs_Plugin
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
    public function hookActionAdminNotices()
    {
        echo '<div class="notice notice-error is-dismissible"><p>OVERRIDEN via <code>' . __FUNCTION__ . '</code> of <code>' . __CLASS__ . '</code></p></div>';
    }

    /**
     *
     */
    public function scActionAdminNotices()
    {
        echo '<div class="notice notice-info"><p>This info from <code>' . __CLASS__ . '</code></p></div>';
    }

    /**
     *
     */

//[EOC]*/
}
