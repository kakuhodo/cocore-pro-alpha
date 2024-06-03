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
        $this->info = new WpxPlugin(Whip::pregetPluginData(static::$scheme_file));
        Trolley::$wheel = $this;
    }

    /**
     *  @since  ver. 0.10.4 (edit. Pierre)
     *  @update ver. 0.12.2 (edit. Pierre)
     */
    public function productDir(bool $uri = false, ?string $dir = null, ?string $file = null): string
    {
        $prot = $uri ? 'url' : 'path';
        $func = "plugin_dir_$prot";
        $responce = $func(static::$scheme_file);
        $responce .= $dir ? $this->awp_settings->dir->$dir . '/' : null;
        return $responce . $file;
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
