<?php
namespace Pearlpuppy\CoCore\Awp;

use Pearlpuppy\CoCore\Myt\Tribune;

/**
 *  @file   Hook
 */

/**
 *  @since  ver. 0.11.0 (edit. Pierre)
 */
abstract class Abs_Hook implements Int_Hooky
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
    protected $priority = 10;

    /**
     *
     */
    protected $accepted_args = 1;

    /**
     *
     */
    protected $funk = 'add_';

    // Constructor

    /**
     *
     */
    public function __construct(protected object $roller, protected string $hook_name, protected array $callees)
    {
        $this->punk();
    }

    // Methods

    /**
     *
     */
    public function punk()
    {
        $names = explode('\\', static::class);
        $this->funk .= strtolower(array_pop($names));
    }

    /**
     *
     */
    public function prop(string $property, $value = null)
    {
        if (is_null($value)) {
            return $this-$property;
        }
        $this->$property = $value;
    }

    /**
     *
     */
    public function prior(?int $int = null)
    {
        return $this->prop('priority', $int);
    }

    /**
     *
     */
    public function accept(?int $int = null)
    {
        return $this->prop('accepted_args', $int);
    }

    /**
     *
     */

    /**
     *
     */

//[EOAC]*/
}
