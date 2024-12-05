<?php
namespace Pearlpuppy\CoCore\Awp;

use Pearlpuppy\CoCore\{
    Gene,
    Geny,
};

/**
 *  @file   Trooper
 */

/**
 *
 */
class Trooper implements Gene
{

	// Mixins

    /**
     *
     */
    use Geny;

    // Constants

    /**
     *
     */

    // Properties

    /**
     *
     */
    public \Generator $hooks;

    // Constructor

    /**
     *
     */
    public function __construct()
    {
        $this->troop();
    }

    // Methods

    /**
     *  Assigns hooks generator
     *  @since  ver. 0.11.0 (edit. Pierre)
     */
    protected function troop(): void
    {
        $this->hooks = $this->genHooks(Trolley::$filters, Trolley::$actions);
    }

    /**
     *  Provides hooks generator
     *  @since  ver. 0.11.0 (edit. Pierre)
     */
    protected function genHooks($filters, $actions): \Generator
    {
        // Tribune::frankensteiner($filters, self::$universal_filters, true);
        // Tribune::frankensteiner($actions, self::$universal_actions, true);
        $hks = array(
            'Filter' => $filters,
            'Action' => $actions,
        );
        foreach ($hks as $class => $vals) {
            foreach ($vals as $hook_name => $methods) {
                yield $this->iHook($class, $hook_name, $methods);
            }
        }
    }

    /**
     *  @since  ver. 0.11.1 (edit. Pierre)
     */
    protected function iHook($class, $hook_name, $methods): Int_Caster
    {
        $prio = 10;
        $hc = __NAMESPACE__ . "\\$class";
        if (strpos($hook_name, '@') !== false) {
            $hs = explode('@', $hook_name);
            $hook_name = $hs[0];
            $prio = (int) $hs[1];
        }
        $aa = Whip::$hook_aas[$hook_name] ?? 1;
        $hooky = new $hc($this, $hook_name, $methods);
        if ($prio != 10) {
            $hooky->prior($prio);
        }
        if ($aa != 1) {
            $hooky->accept($aa);
        }
        return $hooky;
    }

    /**
     *  @since  ver. 0.11.0 (edit. Pierre)
     */
    public function roll()
    {
        foreach ($this->hooks as $hook) {
            $hook->hook();
        }
    }

    /**
     *
     */

//[EOC]*/
}
