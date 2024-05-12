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
    use Tr_Enq;
    use Tr_SchemeHooks;

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
    protected object $info;

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    public array $phases = [];

    /**
     *  @since  ver. 0.11.0 (edit. Pierre)
     */
    protected \Generator $hooks;

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
        $this->troop();
    }

    // Methods

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     *  @update ver. 0.11.0 (edit. Pierre)
     */
    public function queue($hook_suffix = null)
    {
        $this->enqueueVia(__FUNCTION__);
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     *  @update ver. 0.11.0 (edit. Pierre)
     */
    public function adminQueue($hook_suffix = null)
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
     *  @since  ver. 0.11.0 (edit. Pierre)
     */
    protected function troop(): void
    {
        // Tribune::frankensteiner(static::$scheme_actions, self::$universal_actions, true);
        // Tribune::frankensteiner(static::$scheme_filters, self::$universal_filters, true);
        $this->hooks = $this->genHooks(static::$scheme_filters, static::$scheme_actions);
    }

    /**
     *  @since  ver. 0.11.0 (edit. Pierre)
     */
    protected function genHooks($filters, $actions)
    {
        Tribune::frankensteiner($filters, self::$universal_filters, true);
        Tribune::frankensteiner($actions, self::$universal_actions, true);
        foreach ($filters as $hook_name => $methods) {
            yield new Filter($this, $hook_name, $methods);
        }
        foreach ($actions as $hook_name => $methods) {
            yield new Action($this, $hook_name, $methods);
        }
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
            call_user_func($afunc, $hook_name, [$this, $pmeth], 10, 999);
        }
        if (method_exists($this, $cmeth)) {
            call_user_func($afunc, $hook_name, [$this, $cmeth], 10, 999);
        }
        if (function_exists($cfunc)) {
            call_user_func($afunc, $hook_name, $cfunc, 10, 999);
        }
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     *  @update ver. 0.11.0 (edit. Pierre)
     */
    public function screen(string $caller): string
    {
        return stripos($caller, 'admin') === false ? 'front' : 'admin';
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    protected function _screen(string $caller)
    {
        $matched = preg_match('/(Action|Filter)([A-Z][^A-Z]+)[A-Z]/', $caller, $matches);
        if (!$matched) {
            return $matched;
        }
        switch ($matches[2]) {
            case 'Admin':
                $screen = strtolower($matches[2]);
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
     *  @since  ver. 0.10.6 (edit. Pierre)
     */
    protected function sound(string $prop)
    {
        return isset($this->awp_settings->$prop) && $this->awp_settings->$prop;
    }

    /**
     *  @since  ver. 0.10.6 (edit. Pierre)
     */
    public function vox(string $prop): mixed
    {
        return $this->awp_settings->$prop;
    }

    /**
     *  @since  ver. 0.11.0 (edit. Pierre)
     */
    public function roll()
    {
        foreach ($this->hooks as $hook) {
            $hook->hook();
        }
        // foreach ($this->filters as $hook_name => $methods) {
        //     $filter = new Filter($this, $hook_name, $methods);
        //     $filter->hook();
        // }
        // foreach ($this->actions as $hook_name => $methods) {
        //     $action = new Action($this, $hook_name, $methods);
        //     $action->hook();
        // }
    }

    /**
     *  @since  ver. 0.11.0 (edit. Pierre)
     */
    protected function roller(array $hooks)
    {
        foreach ($hooks as $hook_name => $meth) {
            
        }
    }

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     *
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
     *  @since  ver. 0.10.6 (edit. Pierre)
     */
    public function productImgPath(string $file = null): string
    {
        return $this->productDir(false, 'img', $file);
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
     *  @update ver. 0.10.6 (edit. Pierre)
     */
    protected function assignPhases()
    {
        $brand = $this->nice('brand', true);
        $this->phases['brand'] = $brand;
        $brand .= '-';
        $product = $this->info->get('TextDomain');
        $this->phases['product'] = strpos($product, $brand) === 0 ? str_replace($brand, '', $product) : $product;
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
     *  @since  ver. 0.10.6 (edit. Pierre)
     *
    protected function dirJunction()
    {
        
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
    public function doDyna($arg = null)
    {
        return $this->screen($arg);
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

//[EOAC]*/
}
