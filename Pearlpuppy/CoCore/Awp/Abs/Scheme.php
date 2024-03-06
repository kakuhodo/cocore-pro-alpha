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
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    protected array $product_labels;

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
     *  @since  ver. 0.10.2 (edit. Pierre)
     */
    protected Consulat $console;

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     */
    protected object $awp_settings;

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     */
    protected object|array $info;

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    public array $phases = [];

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
        $this->inform();
        $this->configure();
        $this->assignPhases();
        $this->console = new Consulat();
    }

    // Methods

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    public function hookActionWpEnqueueScripts($hook_suffix = null)
    {
        $this->enqueueVia(__FUNCTION__);
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    public function hookActionAdminEnqueueScripts($hook_suffix = null)
    {
        $this->enqueueVia(__FUNCTION__);
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    abstract protected function inform();

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     *  @update ver. 0.10.5 (edit. Pierre)
     */
    protected function configure()
    {
        $dir = dirname($this->product_file);
        $this->awp_settings = Tribune::parseJsonFile("$dir/product.json");
    }

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     */
    protected function bapt(): void
    {
        $this->system_labels = Tribune::typify(__NAMESPACE__);
    }

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     */
    protected function assignProduct(string $file): void
    {
        $this->product_file = $file;
        $ref = new \ReflectionClass(static::class);
        $this->product_ns = $ref->getNamespaceName();
        $this->product_labels = Tribune::typify($this->product_ns);
    }

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     *  @update ver. 0.10.5 (edit. Pierre)
     */
    public function nice(string $key, bool $product = false): string
    {
        $phase = 'system';
        if ($product) {
            $phase = 'product';
        }
        $prop = "{$phase}_labels";
        return strtolower($this->$prop[$key]);
    }

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     *  @update ver. 0.10.2 (edit. Pierre)
     */
    protected function assignHook(string $hook_type, string $hook_name)
    {
        $afunc = "add_$hook_type";
        $pmeth = 'hook';
        $cmeth = $this->awp_settings->prefix;
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
        $iterator = Tribune::recursiveIterator(Whip::$hooks);
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
    abstract public function productDir(bool $uri = false, ?string $dir = null, ?string $file = null): string;

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     */
    public function productPath(): string
    {
        return $this->productDir();
    }

    /**
     *  @since  ver. 0.10.4 (edit. Pierre)
     */
    public function productUri(): string
    {
        return $this->productDir(true);
    }

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     *  @update ver. 0.10.4 (edit. Pierre)
     */
    public function productIncPath(string $file = null): string
    {
        return $this->productDir(false, 'inc', $file);
    }

    /**
     *  @since  ver. 0.10.4 (edit. Pierre)
     */
    public function productAssetUri(string $file = null): string
    {
        return $this->productDir(true, 'asset', $file);
    }

    /**
     *  @since  ver. 0.10.4 (edit. Pierre)
     */
    public function productStyleUri(string $file = null): string
    {
        return $this->productDir(true, 'css', $file);
    }

    /**
     *  Pushes data into Consulat stream
     *  @since  ver. 0.10.2 (edit. Pierre)
     */
    public function slap(mixed $output, string|int|null $label = null)
    {
        $this->console[$label] = $output;
    }

    /**
     *  @since  ver. 0.10.2 (edit. Pierre)
     */
    public function consExpose()
    {
        $this->console->expose();
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     *
    protected function enqueue(string $caller, string $handle)
    {
        $screen = $this->screen($caller);
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    protected function screen(string $caller)
    {
        $matched = preg_match('/Action(\w+)Enqueue/', $caller, $matches);
        if (!$matched) {
            return $matched;
        }
        switch ($matches[1]) {
            case 'Admin':
                $screen = strtolower($matches[1]);
                break;
            case 'Wp':
                $screen = 'front';
                break;
            default:
                $screen = null;
        }
        return $screen;
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    protected function enqueueVia(string $caller)
    {
        $brand = null;
        $suffix = '-';
        $screen = $this->screen($caller);
        if ($this->isCross($screen)) {
            $suffix .= $screen;
        } else {
            $suffix = '';
        }
        foreach ($this->phases as $phase => $handle) {
            $handle .= $suffix;
            if ($phase == 'brand') {
                $brand = $handle;
                $asc = null;
            } else {
                $asc = $brand;
            }
            $this->enqueueAssets($handle, $asc);
        }
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    protected function assignPhases()
    {
        $this->phases['brand'] = $this->nice('brand', true);
        $this->phases['product'] = $this->info->get('TextDomain');
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    protected function isCross(string $screen): bool
    {
        switch ($screen) {
            case 'admin':
                $ans = $this->isScheme('theme');
                break;
            case 'front':
                $ans = $this->isScheme('plugin');
                break;
            default:
                $ans = false;
                break;
        }
        return $ans;
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    protected function enqueueAssets(string $handle, ?string $asc = null)
    {
        foreach (Whip::$enqueues as $asset) {
            $callback = "wp_enqueue_$asset";
            $args = $this->enqArgue($asset, $handle, $asc);
            if (!$args) {
                continue;
            }
            call_user_func_array($callback, $args);
        }
    }

    /**
     *  @return file path if alive, else false
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    protected function assetFileAlive(string $asset, string $handle)
    {
        $xt = $this->assetXtens($asset);
        $file = "$handle.$xt";
        $file_path = $this->productDir(false, $xt, $file);
        return file_exists($file_path) ? $file_path : false;
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    protected function enqArgue(string $asset, string $handle, ?string $asc = null)
    {
        $file = $this->assetFileAlive($asset, $handle);
        if (!$file) {
            return false;
        }
        $src = Whip::wpx_path2uri($file);
        $deps = $this->assetDepsArgue($asset, $asc);
        $ver = $this->info->get('Version');
        $_plus = $this->assetPlusArgue($asset);
        $_args = compact(Whip::$enqueue_arg_keys);
        $re_plus = array_pop($_args);
        $args = array_values($_args);
        $args[] = $re_plus;
        return $args;
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    protected function assetPlusArgue(string $asset)
    {
        switch ($asset) {
            case 'style':
                $p = 'all';
                break;
            case 'script':
                $p = array(
                    'strategy' => 'defer',
                    'in_footer' => true,
                );
                break;
            default:
                $p = false;
                break;
        }
        return $p;
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    protected function assetDepsArgue(string $asset, ?string $asc)
    {
        $chk_funk = "wp_{$asset}_is";
        if ($asc && $chk_funk($asc)) {
            $deps = [$asc];
        } else {
            $deps = [];
        }
        return $deps;
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    public function assetXtens(string $asset)
    {
        return Tribune::$resourse_extensions[$asset];
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    public function scheme()
    {
        $ans = false;
        if ($this instanceof Abs_Plugin) {
            $ans = 'plugin';
        } elseif ($this instanceof Abs_Theme) {
            $ans = 'theme';
        }
        return $ans;
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    public function isScheme(string $scheme)
    {
        $abs = __NAMESPACE__ . '\Abs_' . ucfirst($scheme);
        return $this instanceof $abs;
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
