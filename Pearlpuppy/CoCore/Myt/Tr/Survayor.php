<?php
namespace Pearlpuppy\CoCore\Myt;

/**
 *    Utilities for security and development.
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
     *  @since  ver. 0.10.4 (edit. Pierre)
     */
    public static function scape(mixed $value, bool $dumpy = false)
    {
        $func = $dumpy ? 'var_export' : 'print_r';
        return $func($value, true);
    }

    /**
     *  @since  ver. 0.10.6 (edit. Pierre)
     */
    public static function isLocal(): bool
    {
        $dom = $_SERVER['SERVER_NAME'] ?? $_SERVER['HTTP_HOST'] ?? false;
        if (!$dom) {
            return false;
        } else {
            return (bool) preg_match('/\.local$/', $dom);
        }
    }

    /**
     *  Safe path for storing
     *  @return path from directly under the brand root directory, started with slash
     *      e.g. /Myt/Tribune.php
     *  @since  ver. 0.12.0 (edit. Pierre)
     */
    public static function brandRootRelPath(string $file): string|false
    {
        return self::safePath(true, $file);
    }

    /**
     *  @return full path to brand directory
     *  @since  ver. 0.12.0 (edit. Pierre)
     */
    public static function brandDir(): string|false
    {
        return self::safePath(false);
    }

    /**
     *  @since  ver. 0.12.0 (edit. Pierre)
     */
    public static function safePath(bool $safe = true, ?string $file = null): string|false
    {
        $fullpath = $file ?? __DIR__;
        $names = explode('\\', __NAMESPACE__);
        $needle = '/' . $names[1] . '/';
        $rpos = strrpos($fullpath, $needle);
        if ($rpos === false) {
            return false;
        }
        $offset_length = $rpos + strlen($needle) - 1;
        if (!$safe) {
            return substr($fullpath, 0, $offset_length);
        }
        return substr($fullpath, $offset_length);
    }

    /**
     *  @since  ver. 0.12.0 (edit. Pierre)
     */
    public static function unsafePath(string $safepath)
    {
        return self::brandDir() . $safepath;
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

//[EOT]*/
}