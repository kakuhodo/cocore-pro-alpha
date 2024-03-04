<?php
namespace Pearlpuppy\CoCore\Awp;

use Pearlpuppy\CoCore\Myt\Tribune;

/**
 *  @file   Scheme
 */

/**
 *
 */
abstract class Abs_Scheme implements Int_Tuner
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
     *  @since  ver. 0.10.4 (edit. Pierre)
     */
    protected array $system_labels;

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

    /**
     *
     */

    // Constructor

    /**
     *
     */
    public function __construct(string $file)
    {
        $this->bapt();
        $this->assignProduct($file);
        $this->console = new Consulat();
    }

    // Methods

    /**
     *
     */
    protected function bapt(): void
    {
        $keys = array(
            'production',
            'brand',
            'component',
        );
        $values = explode("\\", __NAMESPACE__);
        $this->system_labels = array_combine($keys, $values);
    }

    /**
     *
     */
    protected function assignProduct(string $file): void
    {
        $this->product_file = $file;
        $ref = new \ReflectionClass(static::class);
        $this->product_ns = $ref->getNamespaceName();
    }

    /**
     *
     */
    public function nice(string $key): string
    {
        return strtolower($this->system_labels[$key]);
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
