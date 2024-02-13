<?php
namespace Pearlpuppy\CoCore\Awp;

use Pearlpuppy\CoCore\Myt\Tribune;
use Pearlpuppy\CoCore\Myt\Lime;

/**
 *  @file   Plugin
 *      Automates action and filter hooks.
 */

abstract class Abs_Plugin implements Int_Gene
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
    protected string $product_file;

    /**
     *
     */
    protected ?string $product_ns;

    /**
     *
     */
    public object $conf;

    // Constructor

    /**
     *
     */
    public function __construct(string $file, ?string $namespace = null)
    {
        $this->product_file = $file;
        $this->product_ns = $namespace;
        $this->configure();
    }

    // Methods

    /**
     *
     */
    protected function configure()
    {
        $dir = dirname($this->product_file);
        $json = file_get_contents("$dir/product.json");
        $this->conf = json_decode($json);
    }

    /**
     *
     */
    protected function assignHook(string $hook_type, string $hook)
    {
        $afunc = "add_$hook_type";
        $suffix = Tribune::snake2Stud($hook);
        $dfunc = 'hook' . $suffix;
        $pfunc = '';
        if ($this->product_ns) {
            $pfunc .= $this->product_ns . "\\";
        }
        $pfunc .= $this->conf->prefix . ucfirst($hook_type) . $suffix;
        if (method_exists($this, $dfunc)) {
            call_user_func($afunc, $hook, [$this, $dfunc]);
        }
        if (function_exists($pfunc)) {
            call_user_func($afunc, $hook, $pfunc);
        }
    }

    /**
     *
     */
    public function hook()
    {
        foreach (WpXtra::$hooks as $htype => $hooks) {
            foreach ($hooks as $hook) {
                $this->assignHook($htype, $hook);
            }
        }
    }

    /**
     *
     */
    public function hookWpDashboardSetup()
    {
        $this->sandyWidget();
    }

    /**
     *
     */
    public function hookAdminNotices()
    {
        echo '<div class="notice notice-error is-dismissible"><p>Error</p></div>';
        echo '<div class="notice notice-info"><p>Info</p></div>';
    }

    /**
     *
     */
    protected function sandyWidget()
    {
        wp_add_dashboard_widget('sandy', 'Samdy', [$this, 'wcbSandy'], [$this, 'wcbSandyControl'], null, 'normal', 'high');
    }

    /**
     *
     */
    public function wcbSandy()
    {
        $dirs = [dirname($this->product_file)];
        $dirs[] = $this->conf->directories->inc;
        $dirs[] = 'sandy.php';
        $file = implode(DIRECTORY_SEPARATOR, $dirs);
        if (!file_exists($file)) {
            $no_file = new Lime('p', __("There's no sandy.php file."));
            $no_file->expose();
            return;
        }
        include_once($file);
    }

    /**
     *
     */
    public function wcbSandyControl()
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
