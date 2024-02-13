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
    protected function assignHook(string $hook_type, string $hook_name)
    {
        $afunc = "add_$hook_type";
        $suffix = ucfirst($hook_type) . Tribune::snake2Stud($hook_name);
        $dfunc = 'hook' . $suffix;
        $pfunc = '';
        if ($this->product_ns) {
            $pfunc .= $this->product_ns . "\\";
        }
        $pfunc .= $this->conf->prefix . $suffix;
        if (method_exists($this, $dfunc)) {
            call_user_func($afunc, $hook_name, [$this, $dfunc]);
        }
        if (function_exists($pfunc)) {
            call_user_func($afunc, $hook_name, $pfunc);
        }
    }

    /**
     *
     */
    public function hook()
    {
        /*
        $recursive = new \RecursiveArrayIterator(WpXtra::$hooks);
        foreach ($recursive as $hook_type => $values) {
            foreach ($values as $hook_name) {
                $this->assignHook($hook_type, $hook_name);
            }
        }

        */
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveArrayIterator(WpXtra::$hooks),
            \RecursiveIteratorIterator::SELF_FIRST
        );
        foreach ($iterator as $key => $value) {
            if ($iterator->hasChildren()) {
                $hook_type = $key;
            } else {
                $this->assignHook($hook_type, $value);
            }
        }
    }

    /**
     *
     */
    public function hookActionWpDashboardSetup()
    {
        $this->sandyWidget();
    }

    /**
     *
     */
    public function hookActionAdminNotices()
    {
        echo '<div class="notice notice-error is-dismissible"><p>Error</p></div>';
        echo '<div class="notice notice-info"><p>Info</p></div>';
    }

    /**
     *
     *
    public function hookFilterBodyClass($classes)
    {
        $classes[] = 'foo';
        return $classes;
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
