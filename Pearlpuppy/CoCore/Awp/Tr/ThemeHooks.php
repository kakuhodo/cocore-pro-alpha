<?php
namespace Pearlpuppy\CoCore\Awp;

use Pearlpuppy\CoCore\Myt\Tribune;
use Pearlpuppy\CoCore\Myt\Lime;

/**
 *  @since  ver. 0.10.6 (edit. Pierre)
 */
trait Tr_ThemeHooks {

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
     *  @since  ver. 0.11.0 (edit. Pierre)
     */
    protected static $scheme_actions = array(
        'wp_head' => [
            'frontHead',
        ],
        'after_setup_theme' => [
            'setup',
        ],
    );

    /**
     *  @since  ver. 0.11.0 (edit. Pierre)
     */
    protected static $scheme_filters = array(
    );

    // Methods

    /**
     *
     */

    /**
     *
     */

//[EOT]*/
}