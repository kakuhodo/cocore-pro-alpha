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
    use Tr_PluginHooks;

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
     *  @since  ver. 0.10.1 (edit. Pierre)
     */
    public function __construct(string $file)
    {
        parent::__construct($file);
        $this->inform();
    }

    // Methods

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    protected function inform()
    {
        $this->info = new WpxPlugin(Whip::pregetPluginData($this->product_file));
    }

    /**
     *  @since  ver. 0.10.4 (edit. Pierre)
     */
    public function productDir(bool $uri = false, ?string $dir = null, ?string $file = null): string
    {
        $prot = $uri ? 'url' : 'path';
        $func = "plugin_dir_$prot";
        $responce = $func($this->product_file);
        $responce .= $dir ? $this->awp_settings->dir->$dir . '/' : null;
        return $responce . $file;
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     *
    protected function enqueueAssets(array $deps = [], mixed $plus = null)
    {
        
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
