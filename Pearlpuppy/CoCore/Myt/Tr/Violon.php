<?php
namespace Pearlpuppy\CoCore\Myt;

/**
 * @file
 */

/**
 *    Utilities for strings.
 */
trait Tr_Violon {

    // Properties

    /**
     *    Default mask of trim().
     */
    public static $character_mask = " \t\n\r\0\x0B";

    /**
     *
     */
    public static $patterns = array(
        'alphacap' => "/^[a-zA-Z]/",
    );

    // Methods

    /**
     *
     */
    public static function pat($key) {
        return self::$patterns[$key];
    }

    /**
     *
     *  !!! DEPRECATE 240526    refine to reuse
     */
    public static function prefix($string, $glue = '_') {
        $brand = \Pedigree::ranker('brand');
        return $brand . $glue . $string;
    }

    /**
     *
     *  !!! DEPRECATE 240526    refine to reuse
     */
    public static function deprefix($string) {
        $brand = \Pedigree::ranker('brand');
        $pos = strpos($string, $brand);
        $len = strlen($brand);
        if ($pos === 0) {
            return substr_replace($string, '', 0, $len + 1);
        }
    }

    // Methods from CoCore Jessica ver. 0.71.11

    /**
     *    Provides a snake_case.
     */
    public static function snake($string) {
        $search = ['-', ' '];
        return strtolower(str_replace($search, '_', $string));
    }

    /**
     *    Provides a kebab-case.
     */
    public static function kebab($string) {
        $search = ['_', ' '];
        return strtolower(str_replace($search, '-', $string));
    }

    /**
     *    Refines a kebab-case to PascalCase.
     *  @update ver. 0.12.3 (edit. Pierre)
     */
    public static function keb2pasc($string) {
        $xp = explode('-', $string);
        $pascs = array_map('ucfirst', $xp);
        $pasc = implode('', $pascs);
        return $pasc;
    }

    /**
     *    Refines a snake_case to kebab-case.
     */
    public static function snake2keb($string) {
        return strtolower(str_replace('_', '-', $string));
    }

    /**
     *
     */
    public static function is_alpha($string) {
        $pattern = '/[^a-zA-Z_\-]/';        // Hit to the characters who are not alphabets or numerics or underscore or dash.
        return preg_match($pattern, $string) ? false : true;
    }

    /**
     *    Makes the word plural.
     */
    public static function plur($word, $locale = 'en') {
        if (strpos($locale, 'en') !== 0) {
            return $word;
        }
        $unchangables = array(
            'news',
            'meta',
        );
        $exceptions = array(
            'child' => 'children',
            'medium' => 'media',
            'datum' => 'data',
        );
        $handle = strtolower($word);
        if (array_key_exists($handle, $exceptions)) {
            $plur = $exceptions[$handle];
        } else {
            $plur = $word;
            if (!in_array($handle, $unchangables)) {
                $tail = substr($word, -1);
                switch ($tail) {
                    case 'y':
                        $plur = substr_replace($word, 'ies', -1);
                        break;
                    case 's':
                        $plur .= 'es';
                        break;
                    default:
                        $plur .= 's';
                        break;
                }
            }
        }
        return $plur;
    }

    /**
     *    Makes machine name human readable.
     */
    public static function mn2hn($machine_name, $cap = 2) {
        $name = str_replace('_', ' ', $machine_name);
        switch ($cap) {
            case 1:
                $human_name = ucfirst($name);
                break;
            case 2:
                $human_name = ucwords($name);
                break;
            default:
                $human_name = $name;
                break;
        }
        return $human_name;
    }

    /**
     *    Makes machine name human readable and plural.
     */
    public static function mn2hnpl($machine_name, $locale = 'en', $cap = 2) {
        $hn = $this->mn2hn($machine_name, $cap);
        $pl = $this->plur($hn, $locale);
        return $pl;
    }

    /**
     *    Picks one from glued string.
     */
    public static function candy($string, $index = 0, $glue = '|') {
        $candies = explode($glue, $string);
        return $candies[$index];
    }

    /**
     *
     */
    public static function randstr($length = 8) {
        $chars = array_merge(range(0, 9), range('a', 'z'));
        $rstr = '';
        for ($i = 0; $i < $length; ++$i) {
            $rstr .= $chars[mt_rand(0, 35)];
        }
        return $rstr;
    }

    /**
     *    Translates a number from Arabic to Roman.
     */
    public static function arab2rome($arabic) {
        // prep
        $di = 10;
        $x = 3;        // max involution of digit
        $major = $di / 2;        // half a digit (5)
        $minor = $major - 1;    // (4)
        $max = PHP_VERSION_ID < 50600 ? pow($di, $x) : $di ** $x;        // max digit

        // exclusive
        if ($arabic >= $max * $minor) {        // over 4000
            return $arabic;
        }

        // prep 2
        $roman = '';
        $cardinals = ['i','x','c','m'];
        $lieutenants = ['v','l','d'];

        // do
        for ($c = $max; $c >= 1; $c /= $di) {
            if (!isset($i)) {
                $i = $arabic;
            }

            $k = log10($c);
            $n = floor($i / $c);        // number of digit [0-9]
            $hi = floor($n / $major);        // is $n higher than 4 or not.
            if ($hi) {
                $n %= $major;        // knock down [0-4]
                if ($n != $minor) {        // for 5 upper
                    $roman .= $lieutenants[$k];
                }
            }

            switch ($n) {
                case $minor:
                    $roman .= $cardinals[$k];
                    if ($hi) {        // for 9
                        $roman .= $cardinals[$k + 1];
                    } else {        // for 4
                        $roman .= $lieutenants[$k];
                    }
                    break;
                default:
                    $roman .= str_repeat($cardinals[$k], $n);
                    break;
            }

            $i %= $c;        // throw
        }

        return strtoupper($roman);
    }

    /**
     *
     */
    public static function holy2Nice(string $holy) {
        return strtolower(str_replace(' ', '_', $holy));
    }

    /**
     *
     */
    public static function strPop($glu, &$str) {
        $arr = explode($glu, $str);
        $pop = array_pop($arr);
        $str = implode($glu, $arr);
        return $pop;
    }

    /**
     *    Reverse version of preg_grep().
     *    @return    (array) matched patterns
     */
    public static function pregGrepRev(string $subject, array $patterns, array &$matches = null) {
        $matched = array();
        foreach ($patterns as $key => $pattern) {
            if (preg_match($pattern, $subject, $_matches)) {
                $matched[$key] = $pattern;
                $matches[$key] = $_matches;
            }
        }
        return $matched;
    }

    /**
     *  Refines snake_case to camelCase
     *  @since 0.10.0
     */
    public static function snake2Camel(string $snake)
    {
        $words = explode('_', $snake);
        $camel = array_shift($words);
        foreach ($words as $word) {
            $camel .= ucfirst($word);
        }
        return $camel;
    }

    /**
     *  Refines snake_case to StudlyCaps
     *  @since 0.10.0
     *  @update ver. 0.12.3 (edit. Pierre)
     */
    public static function snake2Pasc(string $snake)
    {
        $words = explode('_', $snake);
        $pascs = array_map('ucfirst', $words);
        $pasc = implode('', $pascs);
        return $pasc;
    }

    /**
     *
     */

//[EOT]*/
}
