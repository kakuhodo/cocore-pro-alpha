<?php
namespace Pearlpuppy\CoCore\Awp;

use Pearlpuppy\CoCore\Myt\Tribune;
use Pearlpuppy\CoCore\Myt\Lime;

/**
 *  @file   Plugin
 *      Automates action and filter hooks.
 *  @since  ver. 0.10.1 (edit. Pierre)
 */

abstract class Abs_Plugin extends Abs_Core implements Int_Scheme
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
     *  Full path to plugin file
     *  @since  ver. 0.10.1 (edit. Pierre)
     */
    protected string $product_file;

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     */
    protected ?string $product_ns;

    /**
     *  @since ver. 0.10.2 (edit. Pierre)
     */
    protected Consulat $console;

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     */
    public object $conf;

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     */
    public array $plugin_data;

    // Constructor

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     */
    public function __construct(string $file, ?string $namespace = null)
    {
        parent::__construct();
        $this->product_file = $file;
        $this->product_ns = $namespace;
        $this->configure();
        $this->plugin_data = WpXtra::pregetPluginData($file);
        $this->console = new Consulat();
    }

    // Methods

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     */
    protected function configure()
    {
        $dir = dirname($this->product_file);
        $json = file_get_contents("$dir/product.json");
        $this->conf = json_decode($json);
    }

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     *  @update  ver. 0.10.2 (edit. Pierre)
     */
    protected function assignHook(string $hook_type, string $hook_name)
    {
        $afunc = "add_$hook_type";
        $pmeth = 'hook';
        $cmeth = $this->conf->prefix;
        $suffix = ucfirst($hook_type) . Tribune::snake2Stud($hook_name);
        $pmeth .= $suffix;
        $cmeth .= $suffix;
        $cfunc = '';
        if ($this->product_ns) {
            $cfunc .= $this->product_ns . "\\";
        }
        $cfunc .= $cmeth;
        if (method_exists($this, $pmeth)) {
            call_user_func($afunc, $hook_name, [$this, $pmeth]);
        }
        if (method_exists($this, $cmeth)) {
            call_user_func($afunc, $hook_name, [$this, $cmeth]);
        }
        if (function_exists($cfunc)) {
            call_user_func($afunc, $hook_name, $cfunc);
        }
    }

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     */
    public function hook()
    {
        $iterator = Tribune::recursiveIterator(WpXtra::$hooks);
        foreach ($iterator as $key => $value) {
            if ($iterator->hasChildren()) {
                $hook_type = $key;
            } else {
                $this->assignHook($hook_type, $value);
            }
        }
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
        $classes .= ' cocore';
        return $classes;
    }

    /**
     *  @ref    https://developer.wordpress.org/reference/hooks/admin_enqueue_scripts/
     *  @param $hook_suffix string  The current admin page.
     *  @since  ver. 0.10.4 (edit. Pierre)
     */
    public function hookActionAdminEnqueueScripts($hook_suffix = null)
    {
        $handle = $this->nice('brand');
        $css = "$handle.css";
        $file = $this->productDir('path', 'css', $css);
        if (!file_exists($file)) {
            return;
        }
        $src = $this->productStyleUri($css);
        $deps = [];
        $ver = $this->plugin_data['Version'];
        wp_enqueue_style($handle, $src, $deps, $ver);
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
            $no_file = new Lime('p', __("There's no sandy.php file.", $this->plugin_data['TextDomain']));
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
     *  @since  ver. 0.10.4 (edit. Pierre)
     */
    public function productDir(string $prot, ?string $dir = null, ?string $file = null): string
    {
        $func = "plugin_dir_$prot";
        $responce = $func($this->product_file);
        $responce .= $dir ? $this->conf->dir->$dir . '/' : null;
        return $responce . $file;
    }

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     */
    public function productPath(): string
    {
        return $this->productDir('path');
    }

    /**
     *  @since  ver. 0.10.4 (edit. Pierre)
     */
    public function productUri(): string
    {
        return $this->productDir('url');
    }

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     *  @update  ver. 0.10.4 (edit. Pierre)
     */
    public function productIncPath(string $file = null): string
    {
        return $this->productDir('path', 'inc', $file);
    }

    /**
     *  @since  ver. 0.10.4 (edit. Pierre)
     */
    public function productAssetUri(string $file = null): string
    {
        return $this->productDir('url', 'asset', $file);
    }

    /**
     *  @since  ver. 0.10.4 (edit. Pierre)
     */
    public function productStyleUri(string $file = null): string
    {
        return $this->productDir('url', 'css', $file);
    }

    /**
     *  Pushes data into Consulat stream
     *  @since ver. 0.10.2 (edit. Pierre)
     */
    public function slap(mixed $output, string|int|null $label = null)
    {
        $this->console[$label] = $output;
    }

    /**
     *  @since ver. 0.10.2 (edit. Pierre)
     */
    public function consExpose()
    {
        $this->console->expose();
    }

    /**
     *  Do test something
     */
    public function doDyna()
    {
        $reflector = new \ReflectionClass(static::class);
        return $reflector->getNamespaceName();
    }

    /**
     *  Do test something
     */
    public static function doStat()
    {
        
    }

    /**
     *
     */

//[EOC]*/
}
