<?php
namespace Pearlpuppy\CoCore\Awp;

use Pearlpuppy\CoCore\Myt\Tribune;
use Pearlpuppy\CoCore\Myt\Lime;

/**
 *  @file   Plugin
 *      Automates action and filter hooks.
 *  @since  ver. 0.10.1 (edit. Pierre)
 */

/**
 *
 */
abstract class Abs_Plugin extends Abs_Scheme implements Int_Wheeler
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
     *  This class descendants will be Singleton.
     *  @since  ver. 0.12.0 (edit. Pierre)
     */

    // Methods

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     *  @update ver. 0.12.0 (edit. Pierre)
     */
    protected function inform()
    {
        $this->info = new WpxPlugin(Whip::pregetPluginData($this->reflector->getFileName()));
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
