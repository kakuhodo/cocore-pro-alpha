<?php
namespace Pearlpuppy\CoCore\Awp;

use Pearlpuppy\CoCore\Geny;
use Pearlpuppy\CoCore\{
    Myt,
    Myt\Tribune,
};

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
    use Geny;
    use Tr_Passer;

    // Constants

    /**
     *
     */

    // Properties

    /**
     *
     */
    public static Trooper $trooper;

    /**
     *  Brand root relative path to 
     *  @since  ver. 0.12.0 (edit. Pierre)
     */
    public static string $scheme_file;

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     *      ex-name $product_labels
     *  @rename ver. 0.12.0 (edit. Pierre)
     */
    protected array $labels;

    /**
     *  @since  ver. 0.12.0 (edit. Pierre)
     */
    protected \ReflectionClass $reflector;

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     */
    protected object $awp_settings;

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     */
    protected object $info;

    // Constructor

    /**
     *  This class descendants will be Singleton.
     *  @since  ver. 0.12.0 (edit. Pierre)
     */
    protected function __construct()
    {
        $this->assignProduct();
        $this->inform();
        $this->configure();
        static::$trooper = new Trooper();
    }

    // Methods

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    abstract protected function inform();

    /**
     *  @since  ver. 0.10.4 (edit. Pierre)
     *
    abstract public function productDir(bool $uri = false, ?string $dir = null, ?string $file = null): string;

    /**
     *
     *  @since  ver. 0.12.1 (edit. Pierre)
     */
    public static function inst(string $file): static
    {
        if (empty(static::$scheme_file)) {
            static::$scheme_file = $file;
        }
        return static::getInstance();
    }

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     *  @update ver. 0.12.0 (edit. Pierre)
     */
    protected function assignProduct(): void
    {
        $this->reflector = new \ReflectionClass(static::class);
        $this->labels = Tribune::typify($this->productNamespace());
    }

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     *  @update ver. 0.10.5 (edit. Pierre)
     */
    protected function configure()
    {
        $dir = $this->productDir();
        $this->awp_settings = Tribune::parseJsonFile("$dir/product.json");
    }

    /**
     *  @since  ver. 0.12.0 (edit. Pierre)
     */
    public function productFile()
    {
        return $this->reflector->getFileName();
    }

    /**
     *  @since  ver. 0.12.0 (edit. Pierre)
     */
    public function productNamespace()
    {
        return $this->reflector->getNamespaceName();
    }

    /**
     *  @since  ver. 0.12.0 (edit. Pierre)
     */
    public function productDir()
    {
        return dirname($this->productFile());
    }

    /**
     *  @since  ver. 0.12.2 (edit. Pierre)
     */
    public function roll()
    {
        static::$trooper->roll();
    }

    /**
     *
     */
    public function trawler()
    {
        return static::$trooper;
    }

    /**
     *
     */

//[EOAC]*/
}
