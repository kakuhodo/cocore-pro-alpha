<?php
namespace Pearlpuppy\CoCore;

/**
 *  @file   Star
 */

/**
 *  @since  ver. 0.11.2 (edit. Pierre)
 */
final class Star implements Stellar
{

	// Mixins

    /**
     *
     */
    use Myt\Tr_Solo;

    // Constants

    /**
     *
     */
    const STARFILE = __FILE__;

    // Properties

    /**
     *
     */
    private string $production;

    /**
     *
     */
    private string $brand;

    // Constructor

    /**
     *
     */
    private function __construct()
    {
        $names = explode('\\', __NAMESPACE__);
        $this->production = array_shift($names);
        $this->brand = array_shift($names);
    }

    // Methods

    /**
     *
     */
    public function gaze(bool $nice = true)
    {
        return $nice ? strtolower($this->brand) : $this->brand;
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

//[EOFC]*/
}
