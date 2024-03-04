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

    // Constructor

    /**
     *  @since  ver. 0.9.1 (edit. Quartz)
     */
    public function __construct(string $file)
    {
        parent::__construct($file);
        $this->support();
    }

    // Methods

    /**
     *
     */
    protected function support()
    {
        $file = dirname($this->product_file) . '/support.conf';
        $sups = new \RecursiveArrayIterator(parse_ini_file($file, true, INI_SCANNER_TYPED));
        $this->validate($sups);
        $supports = Tribune::recursiveIterator($sups);
        $this->doSupport($supports);
    }

    /**
     *
     */
    protected function validate(iterable &$iterator)
    {
        foreach ($iterator as &$arg) {
            if (is_iterable($arg)) {
                $this->validate($arg);
            } elseif (is_string($arg)) {
                $this->validateStr($arg);
            }
        }
    }

    /**
     *
     */
    protected function doSupport(iterable $supports)
    {
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
     *
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
     *
     */
    protected function argIsPath(string $str)
    {
        return preg_match('/^\/.+\.\w+$/', $str);
    }

    /**
     *
     */

//[EOAC]*/
}
