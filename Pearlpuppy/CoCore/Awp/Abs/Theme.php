<?php
namespace Pearlpuppy\CoCore\Awp;

use Pearlpuppy\CoCore\Myt\Tribune;

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

    // Constants

    /**
     *
     */

    // Properties

    /**
     *
     */
    public iterable $test;

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
        parent::__construct($file);
        $this->setDefaults();
        $this->assignSupports();
        $this->support();
    }

    // Methods

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    protected function inform()
    {
        $this->info = wp_get_theme();
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
    public function hookActionAdminHead()
    {
        $fa = $this->awp_settings->fontawesome ?? null;
        if ($fa && $fa->admin) {
            $this->enableFontawesome($fa->id);
        }
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    public function hookActionAfterSetupTheme()
    {
        $this->navMenus();
        if (isset($this->supports['editor-styles']) && $this->supports['editor-styles']) {
            $this->enableEditorStyle();
        }
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    public function hookActionWpEnqueueScripts()
    {
        // wp_enqueue_style('dashicons');
        wp_enqueue_script('jquery');
        // aquamonte_queue_assets();
        // if (is_child_theme()) {
        //     aquamonte_queue_assets(get_stylesheet());
        // }
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
        echo '<script src="https://kit.fontawesome.com/' . $id . '.js" crossorigin="anonymous"></script>' . PHP_EOL;
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    protected function navMenus()
    {
        register_nav_menus($this->menu_positions);
    }

    /**
     *
     */

    /**
     *
     */

//[EOAC]*/
}
