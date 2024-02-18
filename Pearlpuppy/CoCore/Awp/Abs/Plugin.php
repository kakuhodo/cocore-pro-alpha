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
        echo '<div class="notice notice-error is-dismissible"><p>via <code>' . __FUNCTION__ . '</code> of <code>' . __CLASS__ . '</code></p></div>';
        echo '<div class="notice notice-info"><p>Info</p></div>';
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
     *  @since  ver. 0.10.1 (edit. Pierre)
     */
    protected function sandyWidget()
    {
        $args = array(
            'widget_id' => 'cocore-sandy',
            'widget_name' => 'Samdy',
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
        $file = $this->productIncDir('sandy.php');
        if (!file_exists($file)) {
            $no_file = new Lime('p', __("There's no sandy.php file.", $this->plugin_data['TextDomain']));
            $no_file->expose();
            return;
        }
        include_once($file);
        $this->console->expose();
    }

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     */
    public function wcbSandyControl()
    {
        
    }

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     */
    public function productDir(): string
    {
        return plugin_dir_path($this->product_file);
    }

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     */
    public function productIncDir(string $file): string
    {
        return $this->productDir() . $this->conf->dir->inc . "/$file";
    }

    /**
     *  @since ver. 0.10.2 (edit. Pierre)
     */
    public function consoler(mixed $output, string|int|null $label = null)
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
     *
     */
    public static function stac()
    {
        return static::class;
    }

    /**
     *
     */

    /**
     *
     */

//[EOC]*/
}
