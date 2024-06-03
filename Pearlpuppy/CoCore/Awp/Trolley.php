<?php
namespace Pearlpuppy\CoCore\Awp;

use Pearlpuppy\CoCore\{
    Gene,
    Geny,
    Star,
    Myt,
    Myt\Tribune,
};

/**
 *  @file   Trolley
 *      In this file, defines only WP hooks 
 *      being provided by CoCOre system in advance.
 */

/**
 *  The definitions of WP hooks
 *  @since  ver. 0.11.2 (edit. Pierre)
 */
final class Trolley implements Gene
{

	// Mixins

    /**
     *
     */
    use Geny;
    use Myt\Tr_Inconstructible;

    /**
     *
     */

    // Constants

    /**
     *
     */

    // Properties

    /**
     *  Main Product object
     *  @since  ver. 0.12.2 (edit. Pierre)
     */
    public static Abs_Plugin $wheel;

    /**
     *  Theme Product object
     *  @since  ver. 0.12.2 (edit. Pierre)
     */
    public static Abs_Theme $dress;

    /**
     *  @since  ver. 0.11.0 (edit. Pierre) in Tr_PluginHooks
     *  @update ver. 0.12.2 (edit. Pierre)
     */
    public static $actions = array(
        'admin_menu' => [
            'mainMenu',
        ],
        // 'init' => [
        //     'registerCoreType',
        //     'registerCoreTax',
        //     'registerCoreTypeMeta',
        //     'boostTypes',
        // ],
        // 'widgets_init' => [
        // ],
    );

    /**
     *  @since  ver. 0.11.0 (edit. Pierre) in Tr_PluginHooks
     *  @update ver. 0.12.2 (edit. Pierre)
     */
    public static $filters = array(
        // 'admin_body_class' => [
        //     'adminScreenCssClass',
        // ],
    );

    /**
     *
     */

    // Constructor

    /**
     *
     */

    // Methods

    /**
     *  @since  ver. 0.10.6 (edit. Pierre)
     *  @ref    https://developer.wordpress.org/reference/functions/add_menu_page/
     */
    public static function mainMenu()
    {
        $menu_slug = Tribune::starGaze();
        $brand_name = Tribune::starGaze(false);
        $svgb64 = static::productSvgB64("icon-$menu_slug.svg");
        add_menu_page("$brand_name Settings", $brand_name, 'manage_options', $menu_slug, [static::class, 'wcbMainPage'], $svgb64);
    }

    /**
     *
     */
    public static function wcbMainPage()
    {
        echo '<h1>hoge</h1>';
    }

    /**
     *  @since  ver. 0.11.1 (edit. Pierre)
     */
    protected static function productSvgB64($svg_file_name)
    {
        $svg = file_get_contents(static::$wheel->productImgPath($svg_file_name));
        $b64 = base64_encode($svg);
        return Whip::$b64_prefix . $b64;
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
