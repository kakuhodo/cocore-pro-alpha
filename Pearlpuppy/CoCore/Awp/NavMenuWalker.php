<?php
namespace Pearlpuppy\CoCore\Awp;

/**
 *  @file   NavMenuWalker
 */

/**
 *  This custom walker class (extended Walker_Nav_Menu) will be fired only on 2nd level or deeper in multi-leveled nav_menu.
 *  @ref    https://developer.wordpress.org/reference/classes/walker_nav_menu/
 *  @since  ver.0.10.6 (edit. Pierre)
 */
class NavMenuWalker extends \Walker_Nav_Menu
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
     *
    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        $output .= '<b>start!</b>';
        parent::start_lvl($output, $depth, $args);
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

//[EOC]*/
}
