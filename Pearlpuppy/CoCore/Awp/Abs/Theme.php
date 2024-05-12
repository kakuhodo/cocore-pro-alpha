<?php
namespace Pearlpuppy\CoCore\Awp;

use Pearlpuppy\CoCore\Myt\Tribune;
use Pearlpuppy\CoCore\Myt\Lime;

/**
 *  @file   Theme
 *  @since  ver. 0.10.5 (edit. Pierre)
 */

/**
 *
 */
abstract class Abs_Theme extends Abs_Scheme implements Int_Dresser
{

    // Mixins

    /**
     *
     */
    use Tr_ThemeHooks;

    // Constants

    /**
     *
     */
    const DDARGKEYS = ['gen', 'uri', 'dir', 'file'];

    // Properties

    /**
     *  Whether the stream via child theme or not.
     *  @since  ver. 0.10.6 (edit. Pierre)
     */
    public bool $substream;

    /**
     *
     */
    protected iterable $supports;

    /**
     *
     */
    public array $menu_positions;

    // Constructor

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    public function __construct(string $file)
    {
        $this->substream = is_child_theme();
        parent::__construct($file);
        $this->setDefaults();
        $this->assignSupports();
        $this->support();
    }

    /**
     *  ---------------------------
     *  Hooks
     *  ---------------------------
     */

    /**
     *  @since  ver. 0.10.6 (edit. Pierre)
     *  @update ver. 0.11.0 (edit. Pierre)
     */
    public function frontHead()
    {
        $fa = $this->vox('fontawesome') ?? null;
        if ($fa && $fa->front) {
            $this->enableFontawesome($fa->id);
        }
        $cc = $this->vox('theme_color') ?? null;
        if ($cc) {
            $this->metaThemeColor($cc);
        }
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     *  @update ver. 0.11.0 (edit. Pierre)
     */
    public function setup()
    {
        $this->navMenus();
        if (isset($this->supports['editor-styles']) && $this->supports['editor-styles']) {
            $this->enableEditorStyle();
        }
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     *  @update ver. 0.11.0 (edit. Pierre)
     */
    public function queue($hook_suffix = null)
    {
        parent::queue($hook_suffix);
        $this->optEnqueues();
    }

    /**
     *  @since  ver. 0.10.6 (edit. Pierre)
     *
    public function hookFilterPreWpNavMenu(?string $output, \stdClass $args)
    {
        // $this->slap($output, 'pre_wpnm');
        // $output .= '<p><b>foo</b></p>';
        return $output;
    }

    /**
     *  @since  ver. 0.10.6 (edit. Pierre)
     *
    public function hookFilterWpNavMenu(string $nav_menu, \stdClass $args)
    {
        // $nav_menu .= '<hr>';
        $this->slap($args);
        return $nav_menu;
    }

    /**
     *  @since  ver. 0.10.6 (edit. Pierre)
     */
    public function hookFilterWpNavMenuArgs(array $args)
    {
        $slug = is_string($args['menu']) ? $args['menu'] : null;
        $args['container'] = 'nav';
        $args['container_id'] = $slug;
        $args['container_class'] = 'menu';
        $args['items_wrap'] = $slug == 'gnb' ? '<label for="burger"><i>Burger</i><input type="checkbox" id="burger" /></label>' : '';
        $args['items_wrap'] .= '<ul>%3$s</ul>';
        return $args;
    }

    /**
     *  Cleans builtin lengthy class.
     *  @since  ver. 0.10.6 (edit. Pierre)
     */
    public function hookFilterNavMenuCssClass(array $classes, \WP_Post $menu_item, \stdClass $args, int $depth)
    {
        $_classes = [];
        if (in_array('menu-item-home', $classes))  {
            $_classes[] = 'home';
        }
        if (in_array('current-menu-item', $classes)) {
            $_classes[] = 'on';
        }
        $_classes[] = 'menu-item';
        // $this->slap($menu_item, $menu_item->post_name);
        return $_classes;
    }

    /**
     *  @raf    https://developer.wordpress.org/reference/hooks/body_class/
     *  @since  ver. 0.10.6 (edit. Pierre)
     */
    public function hookFilterBodyClass(array $classes, array $css_class)
    {
        $this->modeClassy($classes);
        $this->layout($classes);
        return $classes;
    }

    // Methods

    /**
     *  In case called from child theme, this returns the child theme object
     *      which contains parent object inside.
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    protected function inform()
    {
        $this->info = wp_get_theme();
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    public function productDir(bool $uri = false, ?string $dir = null, ?string $file = null): string
    {
        $gen = 'template';
        $args = compact(self::DDARGKEYS);
        return $this->dressertDir($args);
    }

    /**
     *  @since  ver. 0.10.6 (edit. Pierre)
     */
    public function subProductDir(bool $uri = false, ?string $dir = null, ?string $file = null): string
    {
        $gen = 'stylesheet';
        $args = compact(self::DDARGKEYS);
        return $this->dressertDir($args);
    }

    /**
     *  @since  ver. 0.10.6 (edit. Pierre)
     */
    public function dressertDir(array $args): string
    {
        extract($args);
        $func = "get_{$gen}_directory";
        $func .= $uri ? '_uri' : '';
        $responce = $func();
        $responce .= $dir ? '/' . $this->awp_settings->dir->$dir . '/' : null;
        return $responce . $file;
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    protected function setDefaults()
    {
        $this->menu_positions = array(
            'header' => __('Header', PROD_TXD),
            'footer' => __('Footer', PROD_TXD),
        );
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    protected function assignSupports()
    {
        $file = dirname($this->product_file) . '/support.ini';
        $sups = new \RecursiveArrayIterator(parse_ini_file($file, true, INI_SCANNER_TYPED));
        $this->validateArgs($sups);
        $this->supports = $sups;
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    protected function validateArgs(iterable &$iterator)
    {
        foreach ($iterator as &$arg) {
            if (is_iterable($arg)) {
                $this->validateArgs($arg);
            } elseif (is_string($arg)) {
                $this->validateStr($arg);
            }
        }
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    protected function support()
    {
        $supports = Tribune::recursiveIterator($this->supports);
        foreach ($supports as $feat => $arg) {
            if ($supports->hasChildren()) {
                if ($supports->getDepth() > 0) {
                    continue;
                }
                add_theme_support($feat, $arg);
            } else {
                add_theme_support($feat);
            }
        }
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    protected function validateStr(string &$str)
    {
        if ($this->argIsPath($str)) {
            $file = dirname($this->product_file) . $str;
            if (file_exists($file)) {
                $str = get_stylesheet_directory_uri() . $str;
            } else {
                $str = null;
            }
        }
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    protected function argIsPath(string $str)
    {
        return preg_match('/^\/.+\.\w+$/', $str);
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    protected function enableEditorStyle()
    {
        if (is_child_theme()) {
            add_editor_style(get_template_directory_uri() . '/editor-style.css');
        }
        add_editor_style('editor-style.css');
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    protected function enableFontawesome(string $id)
    {
        $src = "https://kit.fontawesome.com/$id.js";
        $fa = new Lime("script[src=$src][crossorigin=anonymous]");
        $fa->expose();
    }

    /**
     *  @since  ver. 0.10.6 (edit. Pierre)
     */
    protected function metaThemeColor(string $colorcode)
    {
        $meta = new Lime("meta[name=theme-color][content=$colorcode]");
        $meta->expose();
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    protected function navMenus()
    {
        register_nav_menus($this->menu_positions);
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    protected function optEnqueues()
    {
        foreach ($this->vox('front_use') as $handle => $do) {
            if (!$do) {
                continue;
            }
            $asset = Whip::$optional_enqueues[$handle];
            $func = "wp_enqueue_$asset";
            $func($handle);
        }
    }

    /**
     *  @since  ver. 0.10.6 (edit. Pierre)
     */
    protected function modeClassy(array &$classes)
    {
        if ($this->sound('dev_mode')) {
            $classes[] = 'mode-dev';
        }
    }

    /**
     *  @since  ver. 0.10.6 (edit. Pierre)
     */
    protected function layout(array &$classes)
    {
        if ($this->sound('layout')) {
            $classes[] = 'layout-' . $this->vox('layout');
        }
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
