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
     *  @since  ver. 0.10.1 (edit. Pierre)
     */
    public function __construct(string $file)
    {
        parent::__construct($file);
        $this->inform();
    }

    /**
     *  ---------------------------
     *  Hooks
     *  ---------------------------
     */

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     *
    public function hookActionWpEnqueueScripts($hook_suffix = null)
    {
    }

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     */
    public function hookActionWpDashboardSetup()
    {
        $this->sandyWidget();
    }

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     */
    public function hookActionAdminNotices()
    {
        echo '<div class="notice notice-sccess is-dismissible"><p>via <code>' . __FUNCTION__ . '</code> of <code>' . __CLASS__ . '</code></p></div>';
    }

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     */
    public function hookFilterAdminBodyClass($classes)
    {
        $classes .= ' ' . $this->nice('brand');
        return $classes;
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
     *  @since  ver. 0.10.1 (edit. Pierre)
     *  @update ver. 0.10.5 (edit. Pierre)
     */
    protected function sandyWidget()
    {
        $args = array(
            'widget_id' => $this->nice('brand') . '-sandy',
            'widget_name' => 'Sandy',
            'callback' => [$this, 'wcbSandy'],
            'control_callback' => [$this, 'wcbSandyControl'],
            'callback_args' => null,
            'context' => 'normal',
            'priority' => 'high'
        );
        extract($args);
        wp_add_dashboard_widget($widget_id, $widget_name, $callback, $control_callback, $callback_args, $context, $priority);
    }

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     *  @update ver. 0.10.2 (edit. Pierre)
     */
    public function wcbSandy()
    {
        $file = $this->productIncPath('sandy.php');
        if (!file_exists($file)) {
            $no_file = new Lime('p', __("There's no sandy.php file.", $this->info['TextDomain']));
            $no_file->expose();
            return;
        }
        include_once($file);
        $console = new Lime('section#cocore-consulat', new Lime('h3', 'Consulat'));
        $console->gratify($this->console);
        $console->expose();
    }

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     */
    public function wcbSandyControl()
    {
        
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
