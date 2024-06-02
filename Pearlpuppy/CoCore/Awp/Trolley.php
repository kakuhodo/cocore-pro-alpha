<?php
namespace Pearlpuppy\CoCore\Awp;

use Pearlpuppy\CoCore\Star;

/**
 *  @file   Trolley
 */

/**
 *  The definitions of WP hooks
 *  @since  ver. 0.11.2 (edit. Pierre)
 */
class Trolley
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
    private function __construct()
    {   /* BAN TO BE INSTANCE, STATIC USE ONLY */    }

    // Methods

    /**
     *
     */
    public static function bite(bool $nice = true)
    {
        $star = Star::getInstance();
        return $star->gaze($nice);
    }

    /**
     *  @since  ver. 0.10.6 (edit. Pierre)
     *  @ref    https://developer.wordpress.org/reference/functions/add_menu_page/
     *
    public static function mainMenu()
    {
        $menu_slug = self::bite();
        $svgb64 = $this->svgB64Code('icon-cocore.svg');
        add_menu_page('CoCore Settings', 'CoCore', 'manage_options', $menu_slug, [$this, 'wcbMainPage'], $svgb64);
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
