<?php
namespace Pearlpuppy\CoCore\Myt;

/**
 *  @since  ver. 0.7.0 (edit. Sovereign)
 */
trait Tr_Zodiac {

    // Mixins

    /**
     *
     */

    // Properties

    /**
     *    The sexagenary cycle is composed of ten Heavenly Stems and twelve Earthly Branches.
     */
    public static $sexagenary_cycle = array(
        'stems' => array(
            'yang_wood'        => '甲',
            'yin_wood'        => '乙',
            'yang_fire'        => '丙',
            'yin_fire'        => '丁',
            'yang_earth'    => '戊',
            'yin_earth'        => '己',
            'yang_metal'    => '庚',
            'yin_metal'        => '辛',
            'yang_water'    => '壬',
            'yin_water'        => '癸',
        ),
        'branches' => array(
            'rat'        => '子',
            'ox'        => '丑',
            'tiger'        => '寅',
            'rabbit'    => '卯',
            'dragon'    => '辰',
            'snake'        => '巳',
            'horse'        => '午',
            'goat'        => '未',
            'monkey'    => '申',
            'rooster'    => '酉',
            'dog'        => '戌',
            'pig'        => '亥',
        ),
    );

    /**
     *    The Wu Xing, also known as the Five Elements, Five Phases, the Five Agents ...
     */
    public static $wu_xing = array(
        'wood'    => '木',
        'fire'    => '火',
        'earth'    => '土',
        'metal'    => '金',
        'water'    => '水',
    );

    /**
     *  The Wu Xing pronounce in Japanese, used for Sexagenary Cycle
     *  @since  ver. 0.10.4 (edit. Pierre)
     */
    public static $dome_wu_xing = array(
        'き',
        'ひ',
        'つち',
        'か',
        'みず',
    );

    puclic static $dome_branches = array(
        'ね',
        'うし',
        'とら',
        'う',
        'たつ',
        'み',
        'うま',
        'ひつじ',
        'さる',
        'とり',
        'いぬ',
        'い',
    );

    /**
     *  @since  ver. 0.10.4 (edit. Pierre)
     */
    public static $yinyang_dome_format = array(
        '%sのえ%s',
        '%sのと%s',
    );

    /**
     *    The seven colours for stars.
     */
    public static $star_colours = array(
        'white'        => '白',
        'black'        => '黒',
        'blue'        => '碧',
        'green'        => '緑',
        'yellow'    => '黄',
        'red'        => '赤',
        'purple'    => '紫',
    );

    /**
     *    The nine stars.
     *        Each star has a pair of index number for colour and wuxing.
     */
    public static $nine_stars = array(
        array(0, 4),
        array(1, 2),
        array(2, 0),
        array(3, 0),
        array(4, 2),
        array(0, 3),
        array(5, 3),
        array(0, 2),
        array(6, 1),
    );

    /**
     *  @since  ver. 0.7.0 (edit. Sovereign)
     */
    public static $six_stars = array(
        'earth'    => '土',
        'metal'    => '金',
        'fire'    => '火',
        'uran'    => '天王',
        'wood'    => '木',
        'water'    => '水',
    );

    /**
     *  @since  ver. 0.10.4 (edit. Pierre)
     */
    public static $hexaplanetary = array(
        array(
            'en' => 'Mercury',
            'ja' => '水星',
            'hex_order' => 6,
        ),
        array(
            'en' => 'Venus',
            'ja' => '金星',
            'hex_order' => 2,
        ),
        array(
            'en' => 'Mars',
            'ja' => '火星',
            'hex_order' => 3,
        ),
        array(
            'en' => 'Jupiter',
            'ja' => '木星',
            'hex_order' => 5,
        ),
        array(
            'en' => 'Saturn',
            'ja' => '土星',
            'hex_order' => 1,
        ),
        array(
            'en' => 'Uranus',
            'ja' => '天王星',
            'hex_order' => 4,
        ),
    );

    /**
     *    
     */
    public static $hexaster_destinies = array(
        'seed'            => '種子',
        'sprout'        => '緑生',
        'bloom'            => '立花',
        'weakness'        => '健弱',
        'attainment'    => '達成',
        'breakdown'        => '乱気',
        'reunion'        => '再会',
        'wealth'        => '財成',
        'steady'        => '安定',
        'darkness'        => '陰影',
        'passive'        => '停止',
        'senility'        => '減退',
    );

    /**
     *
     */
    public static $zodiac_signs = array(
        'Aries',
        'Taurus',
        'Gemini',
        'Cancer',
        'Leo',
        'Virgo',
        'Libra',
        'Scorpio',
        'Sagittarius',
        'Capricorn',
        'Aquarius',
        'Pisces',
    );

    /**
     *
     */
    public static $zodiac_elements = array(
        'fire',
        'earth',
        'wind',
        'water',
    );

    /**
     *
     */
    public static $zodiac_modalities = array(
        'cardinal',
        'fixed',
        'mutable',
    );

    /**
     *
     */
    public static $astro_formats = array(
        'star'        => '%s星',
        'starman'    => '%s星人',
        'horoscope'    => '%s宮',
        'sign'        => '%s座',
    );

    /**
     *  12 zodiac (signs) starting date (month * 100 + day)
     *  of western (tropical) astrology. 
     *  @since  ver. 0.7.0 (edit. Sovereign)
     */
    public static $zodiac_tropical_starts = array(
        321,
        420,
        521,
        622,
        723,
        823,
        923,
        1024,
        1123,
        1222,
        120,
        219,
    );

    /**
     *
     *  @since  ver. 0.10.4 (edit. Pierre)
     */
    public static $seasonal_subsolar_points = array(
        array(
            'ecliptic_longitude' => 0,       // deg. (°)
            'month' => 'March',
            'pos' => 'Northward',
            'n_hemisphere' => 'Vernal',
            's_hemisphere' => 'Autumnal',
        ),
        array(
            'ecliptic_longitude' => 90,       // deg. (°)
            'month' => 'June',
            'pos' => 'Northern',
            'n_hemisphere' => 'Estival',
            's_hemisphere' => 'Hibernal',
        ),
        array(
            'ecliptic_longitude' => 180,       // deg. (°)
            'month' => 'September',
            'pos' => 'Southward',
            'n_hemisphere' => 'Autumnal',
            's_hemisphere' => 'Vernal',
        ),
        array(
            'ecliptic_longitude' => 270,       // deg. (°)
            'month' => 'December',
            'pos' => 'Southerh',
            'n_hemisphere' => 'Hibernal',
            's_hemisphere' => 'Estival',
        ),
    );

    // Methods

    /**
     *    @param    $key    integer|string
     */
    public static function wxPhase($key) {
        return \tribune::elbowDrop($key, self::$wu_xing);
    }

    /**
     *    @param    $key    integer|string
     */
    public static function starColour($key) {
        return \tribune::elbowDrop($key, self::$star_colours);
    }

    /**
     *    @param    $number    integer    1-9
     */
    public static function num2star9($number, $shorty = false) {
        if ($number > 9 || $number < 1) {
            return false;
        }
        $i = $number - 1;
        $col_code = self::$nine_stars[$i][0];
        $star = self::$kanji_digit[$number] . self::starColour($col_code);
        if (!$shorty) {
            $phase_code = self::$nine_stars[$i][1];
            $star .= self::wxPhase($phase_code);
            self::sufAstro($star, 'star');
        }
        return $star;
    }

    /**
     *    @param    $number    integer    1-60: The star number.
     */
    public static function num2star6($number, $shorty = false) {
        if ($number > 60 || $number < 1) {
            return false;
        }
        $i = (int) ceil($number / 10) - 1;
        $star = \tribune::elbowDrop($i, self::$six_stars);
        if (!$shorty) {
            self::sufAstro($star, 'starman');
        }
        return $star;
    }

    /**
     *
     */
    public static function sufAstro(&$string, $type) {
        $format = self::$astro_formats[$type];
        $string = sprintf($format, $string);
    }

    /**
     *    Calculates the number of the Lichun day of February for a year.
     *
     *    @param    $year    (int)
     *    @return    $dom    (int)    3|4|5, the day of February
     */
    public static function lichunDay($year) {
        $dom = floor(4.8693 + (0.242713 * ($year - 1901)) - floor(($year - 1901) / 4));
        return (int) $dom;
    }

    /**
     *
     */

//[EOT]*/
}