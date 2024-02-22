<?php
namespace Pearlpuppy\CoCore\Awp;

/**
 *  @file   
 */

/**
 *
 */
abstract class Abs_Core implements Int_Gene
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
    protected array $names;

    /**
     *
     */

    // Constructor

    /**
     *
     */
    public function __construct()
    {
        $this->bapt();
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
        $this->names = array_combine($keys, $values);
    }

    /**
     *
     */
    public function nice(string $key): string
    {
        return strtolower($this->names[$key]);
    }

    /**
     *
     */

//[EOC]*/
}
