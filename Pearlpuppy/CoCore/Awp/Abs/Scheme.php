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
#    use Myt\Tr_Soliste;

    // Constants

    /**
     *
     */

    // Properties

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
    }

    // Methods

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    abstract protected function inform();

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
     *
     */

    /**
     *
     */

    /**
     *
     */

//[EOAC]*/
}
