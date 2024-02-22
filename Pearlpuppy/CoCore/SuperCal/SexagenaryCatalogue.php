<?php
namespace Pearlpuppy\CoCore\SuperCal;

use Pearlpuppy\CoCore\Myt;
use Pearlpuppy\CoCore\Myt\Tribune;

/**
 *  @file   SexagenaryCatalogue
 */

/**
 *  Singleton
 */
class SexagenaryCatalogue extends \RecursiveArrayIterator
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

    // Properties

    /**
     *
     */
    private static array $data_keys = array(
        'label',        // (string) English name
        'kanji',        // (string) Japanese name
        'ruby',     // (string) Japanese sound
        'yinyang',      // (int) 0|1
        'stem',     // (int) Heavenly Stem number 1-10
        'branch',    // (int) Earthly Branch number 1-12
    );

    // Constructor

    /**
     *
     */
    private function __construct()
    {
        $this->circuler();
    }

    // Methods

    /**
     *
     */
    private function circuler()
    {
        for ($i = 0; $i < 60; $i++) {
            $data = [];
            foreach (self::$data_keys as $key) {
                $meth = 'cast' . ucfirst($key);
                $data[$key] = call_user_func([$this, $meth], $i);
            }
            $this[$i] = $data;
        }
    }

    /**
     *
     */
    private function castLabel(int $int)
    {
        // blow 2 lines should not do every time
        $elements = new \ArrayIterator(array_keys(Tribune::$wu_xing));
        $branches = new \ArrayIterator(array_keys(Tribune::$sexagenary_cycle['branches']));
        $index = floor(($int % (count($elements) * 2)) / 2);        // steps by 2
        $element = ucfirst($elements[$index]);
        $branch = ucfirst(Tribune::jenga($int, $branches));
        return "$element $branch";
    }

    /**
     *
     */
    private function castKanji(int $int)
    {
        
    }

    /**
     *
     */
    private function castRuby(int $int)
    {
        
    }

    /**
     *
     */
    private function castYinyang(int $int)
    {
        return $int % 2;
    }

    /**
     *
     */
    private function castStem(int $int)
    {
        return $int % 10;
    }

    /**
     *
     */
    private function castBranch(int $int)
    {
        return $int % 12;
    }

    /**
     *
     */

//[EOC]*/
}
