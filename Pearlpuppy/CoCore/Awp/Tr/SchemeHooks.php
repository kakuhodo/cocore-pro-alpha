<?php
namespace Pearlpuppy\CoCore\Awp;

use Pearlpuppy\CoCore\Myt\Tribune;
use Pearlpuppy\CoCore\Myt\Lime;

/**
 *  @since  ver. 0.10.6 (edit. Pierre)
 */
trait Tr_SchemeHooks {

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
    protected static $universal_actions = array(
        'wp_enqueue_scripts' => [
            'queue',
        ],
        'admin_enqueue_scripts' => [
            'adminQueue',
        ],
    );

    /**
     *  @since  ver. 0.11.0 (edit. Pierre)
     */
    protected static $universal_filters = array(
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