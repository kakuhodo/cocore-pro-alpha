<?php
namespace Pearlpuppy\CoCore\Myt;

/**
 *    Utilities for developement like debugs, errors.
 */
trait Tr_Survayor {

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

    // Methods

    /**
     *  @since  ver. 0.6.1 (edit. Sovereign)
     *  @update ver. 0.10.2 (edit. Pierre)
     */
    public static function peel($expression, $dumpy = false, $label = 'Peeled', $echo = false, $force = false)
    {
        if (defined('WP_DEBUG')) {
            if (!WP_DEBUG && !$force) {
                return;
            }
        } elseif (!$force) {
            return;
        }
        $param_arr = [$expression, true];
        $output = "<pre class=\"dev\">$label: <code>";
        if ($dumpy) {
            $function = 'var_export';
        } else {
            $function = 'print_r';
        }
        $output .= call_user_func_array($function, $param_arr);
        $output .= '</code></pre>';
        if ($echo) {
            echo $output;
        } else {
            return $output;
        }
    }

    /**
     *
     */

//[EOT]*/
}