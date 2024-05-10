<?php
namespace Pearlpuppy\CoCore\Awp;

use Pearlpuppy\CoCore\Myt;

/**
 *  @file   Whip
 *      renamed from 'WPXtra' (ver. 0.10.5)
 */

/**
 *
 */
final class Whip
{

    // Mixins

    /**
     *
     */
    use Tr_WpxLime;
    use Tr_WpxHooks;

    /**
     *  @since  ver. 0.10.6 (edit. Pierre)
     */
    use Tr_WpxLabels;

    /**
     *
     */
    use Myt\Tr_Inconstructible;

    // Constants

    /**
     *
     */

    // Properties

    /**
     *
     */
    public static $wpx_formats = array(
        'admin_page' => array(
            '<div class="wrap%s">' . "\n",
            '</div><!--//.wrap%s-->' . "\n",
        ),
        'options_form' => array(
            '<form method="post" action="options.php"%s>' . "\n",
            '</form><!--//%s-->' . "\n",
        ),
    );

    /**
     *
     */
    public static $plugin_headers = array(
        'Name'        => 'Plugin Name',
        'PluginURI'   => 'Plugin URI',
        'Version'     => 'Version',
        'Description' => 'Description',
        'Author'      => 'Author',
        'AuthorURI'   => 'Author URI',
        'TextDomain'  => 'Text Domain',
        'DomainPath'  => 'Domain Path',
        'Network'     => 'Network',
        // Site Wide Only is deprecated in favor of Network.
        '_sitewide'   => 'Site Wide Only',
    );

    /**
     *  @since ver. 0.10.5 (edit. Pierre)
     */
    public static $theme_gens = array(
        'template',
        'stylesheet',
    );

    /**
     *  @since ver. 0.10.5 (edit. Pierre)
     */
    public static $enqueue_arg_keys = array(
        'handle',
        'src',
        'deps',
        'ver',
        '_plus',        // for style (string) $media, for script (array) $args ['strategy' => (str) 'async'|'defer', 'in_footer' =>(bool)] (default: [])
    );

    /**
     *  @since ver. 0.10.5 (edit. Pierre)
     */
    public static $enqueues = array(
        'style',
        'script',
    );

    /**
     *  WP builtin assets
     *  @since ver. 0.10.5 (edit. Pierre)
     */
    public static $optional_enqueues = array(
        'dashicons' => 'style',
        'jquery' => 'script',
    );

    // Methods

    /**
     *
     */
    public static function greet()
    {
        echo 'Hi! This is ' . __CLASS__ . PHP_EOL;
    }

    /**
     *    From anywhere but under a Product plugin, returns Product directory full uri with slash tailed.
     *    @param    $file    __FILE__
     */
    public static function product_dir_uri($file) {
        return self::wpx_product_dir('url', $file);
    }

    /**
     *    From anywhere but under a Product plugin, returns Product directory full path with slash tailed.
     *    @param    $file    __FILE__
     */
    public static function product_dir_path($file) {
        return self::wpx_product_dir('path', $file);
    }

    /**
     *    From anywhere but under a Product plugin, returns Edition directory full path with slash tailed.
     *    @param    $file    __FILE__
     */
    public static function edition_dir_path($file) {
        global $genome;
        $edition_dir = strtolower($genome->edition);
        return self::wpx_product_dir('path', $file) . "$edition_dir/";
    }

    /**
     *
     */
    public static function wpx_path2uri($file) {
        $uri_pre = home_url('/');
        // $path_pre = \get_home_path();
        $path_pre = ABSPATH;
        return esc_url(str_replace($path_pre, $uri_pre, $file));
    }

    /**
     *
     */
    public static function wpx_product_dir($mode, $file) {
        $func = "plugin_dir_$mode";
        $path_from_product_root = plugin_basename($file);        // no slash on head and toe, but end with exact file.ext.
        $full_version = $func($file);
        $dirs = explode(DIRECTORY_SEPARATOR, $path_from_product_root);
        $product_dirname = array_shift($dirs);
        array_pop($dirs);        // just remove needless filename.
        $too_much = implode(DIRECTORY_SEPARATOR, $dirs);
        if (!$too_much) {
            return $full_version;
        }
        $rpos = strrpos($full_version, $too_much);
        if ($rpos === false) {
            return $full_version;
        }
        return substr($full_version, 0, $rpos);
    }

    /**
     *
     */
    public static function wcb_field($args) {
        $attrs = array();
        if (isset($args['label_for'])) {
            $attrs['id'] = $args['label_for'];
            unset($args['label_for']);
        }
        if (isset($args['class'])) {
            $attrs['classes'][] = $args['class'];
            unset($args['class']);
        }
        $attrs = array_merge($args, $attrs);
        $input = new Lemon('input');
        $input->specify($attrs);
        $input->expose();
    }

    /**
     *
     */
    public static function wpx_optform_open($id = null, $class = null, $echo = true) {
        $arg = '';
        if ($id) {
            $arg .= " id=\"$id\"";
        }
        if ($class) {
            $arg .= " class=\"$class\"";
        }
        $mu = sprintf(self::$wpx_formats['options_form'][0], $arg);
        if ($echo) {
            echo $mu;
        } else {
            return $mu;
        }
    }

    /**
     *
     */
    public static function wpx_optform_close($id = null, $class = null, $echo = true) {
        $arg = '';
        if ($id) {
            $arg .= "#$id";
        }
        if ($class) {
            $arg .= ".$class";
        }
        $mu = sprintf(self::$wpx_formats['options_form'][1], $arg);
        if ($echo) {
            echo $mu;
        } else {
            return $mu;
        }
    }

    /**
     *
     */
    public static function wpx_menu_header($echo = true) {
        $brand = \Pedigree::ranker('brand');
        $page_title = get_admin_page_title();
        $mu = sprintf(self::$wpx_formats['admin_page'][0], " $brand");
        $mu .= "<h1>$page_title</h1>\n";
        if ($echo) {
            echo $mu;
        } else {
            return $mu;
        }
    }

    /**
     *
     */
    public static function is_dev() {
        if (!WP_DEBUG) {
            return false;
        }
        $devmen = array(
            'prince',
        );
        $cu = wp_get_current_user();
        if (!in_array($cu->user_login, $devmen)) {
            return false;
        }
        return true;
    }

    /**
     *
     */
    public static function wpx_menu_footer($echo = true) {
        $brand = \Pedigree::ranker('brand');
        $ped = \Pedigree::trooper($brand);
        $brand_h = $ped->dub('Brand');
        $mu = '';
        if (self::is_dev()) {
            $mu .= '<hr /><section class="' . $brand . '-dev">' . "\n";
            $mu .= "<h3>$brand_h Developer Pannel</h3>\n";
            $mu .= "<p>This section appears only when the <code>WP_DEBUG</code> is <code>true</code>.</p>\n";
            $screen = get_current_screen();        // WP_Screen object
            $arg = print_r($screen, true);
            $mu .= "<pre><code>$arg</code></pre>\n";
            $mu .= "</section>\n";
        }
        $mu .= sprintf(self::$wpx_formats['admin_page'][1], ".$brand");
        if ($echo) {
            echo $mu;
        } else {
            return $mu;
        }
    }

    /**
     *    Gets plugin data before plugin.php loaded.
     */
    public static function pregetPluginData($file) {
        return get_file_data($file, self::$plugin_headers);
    }
    
    /**
     *    Detects from which installation the $file oriented.
     *    @return    string|array|false
     *        Scheme of orient - 'themes' or 'plugins', as default.
     *        If $in_detail, an array of scheme (indexed 0) and the name of folder (indexed 1) just under the scheme.
     */
    public static function oriented_from($file, $in_detail = false) {
        $ds = DIRECTORY_SEPARATOR;
        $wpcd = 'wp-content' . $ds;
        $pos = strpos($file, $wpcd);
        if ($pos === false) {
            return false;
        }
        $pos += strlen($wpcd);
        $shorten = substr($file, $pos);        // dir path after wp-content/
        $dirs = explode($ds, $shorten);
        if (!$in_detail) {
            return array_shift($dirs);
        }
        return array_slice($dirs, 0, 2);
    }

    /**
     *
     */
    public static function pathGetScheme($path) {
        $dirs = explode(DIRECTORY_SEPARATOR, $path);
        $index = array_search('wp-content', $dirs);
        if ($index === false) {
            return false;
        } else {
            $index += 1;
            return rtrim($dirs[$index], 's');
        }
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    public static function enqueue(string $asset_type, array $args)
    {
        return call_user_func_array("wp_enqueue_$asset_type", $args);
    }

    /**
     *  @since  ver. 0.10.6 (edit. Pierre)
     */
    public static function adminPageHooked(string $page_slug): bool
    {
        return !empty($GLOBALS['admin_page_hooks'][$page_slug]);
    }

    /**
     *
     */

    /**
     *
     */

//[EOT]*/
}