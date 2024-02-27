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
     *  @since  ver. 0.7.0 (edit. Sovereign)
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

    /**
     *  @since  ver. 0.10.4 (edit. Pierre)
     */
    public static $dome_branches = array(
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
        'yang' => '%sのえ%s',
        'yin' => '%sのと%s',
    );

    /**
     *    The seven colours for stars.
     *  @since  ver. 0.7.0 (edit. Sovereign)
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
     *        Each star has a pair of index number for colour and Wu Xing phase.
     *  @since  ver. 0.7.0 (edit. Sovereign)
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
     *  @since  ver. 0.7.0 (edit. Sovereign)
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
     *  @since  ver. 0.7.0 (edit. Sovereign)
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
     *
    public static $zodiac_elements = array(
        'fire',
        'earth',
        'wind',
        'water',
    );

    /**
     *
     *
    public static $zodiac_modalities = array(
        'cardinal',
        'fixed',
        'mutable',
    );

    /**
     *  @since  ver. 0.7.0 (edit. Sovereign)
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

    /**
     *  Solar term (24 terms of seasons)
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    public static $solar_terms = array(
        'Lichun' => 'Spring commences',
        'Yushui' => 'Rain water',
        'Jingzhe' => 'Insects waken',
        'Chunfen' => 'Vernal equinox',
        'Qingming' => 'Bright and clear',
        'Guyu' => 'Corn rain',
        'Lixia' => 'Summer commences',
        'Xiaoman' => 'Corn forms',
        'Mangzhong' => 'Corn on ear',
        'Xiazhi' => 'Summer solstice',
        'Xiaoshu' => 'Moderate heat',
        'Dashu' => 'Great heat',
        'Liqiu' => 'Autumn commences',
        'Chushu' => 'End of heat',
        'Bailu' => 'White dew',
        'Qiufen' => 'Autumnal equinox',
        'Hanlu' => 'Cold dew',
        'Shuangjiang' => 'Frost',
        'Lidong' => 'Winter commences',
        'Xiaoxue' => 'Light snow',
        'Daxue' => 'Heavy snow',
        'Dongzhi' => 'Winter solstice',
        'Xiaohan' => 'Moderate cold',
        'Dahan' => 'Severe cold',
    );

    /**
     *  Operands numbers (float) to get the day (number) of month, each Solar term.
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    public static $solterm_operands = array(
        [4.8693, 0.242713],         // Lichun
        [19.7062, 0.242627],        // Yushui
        [6.3968, 0.242512],         // Jingzhe
        [21.4471, 0.242377],        // Chunfen
        [5.628, 0.242231],          // Qingming
        [20.9375, 0.242083],        // Guyu
        [6.3771, 0.241945],         // Lixia
        [21.93, 0.241825],          // Xiaoman
        [6.5733, 0.241731],         // Mangzhong
        [22.2747, 0.241669],        // Xiazhi
        [8.0091, 0.241642],         // Xiaoshu
        [23.7317, 0.241654],        // Dashu
        [8.4102, 0.241703],         // Liqiu
        [24.0125, 0.241786],        // Chushu
        [8.5186, 0.241898],         // Bailu
        [23.8896, 0.242032],        // Qiufen
        [9.1414, 0.242179],         // Hanlu
        [24.2487, 0.242328],        // Shuangjiang
        [8.2396, 0.242469],         // Lidong
        [23.1189, 0.242592],        // Xiaoxue
        [7.9152, 0.242689],         // Daxue
        [22.6587, 0.242752],        // Dongzhi
        [6.3811, 0.242778],         // Xiaohan
        [21.1046, 0.242765],        // Dahan
    );

    /**
     *  Astrological signs
     *  @since  ver. 0.10.5 (edit. Pierre)
     *
    public static $astro_signs = array(
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
     *  Astrological signs modalities
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    public static $sign_modality = array(
        'Cardinal',
        'Fixed',
        'Mutable',
    );

    /**
     *  Astrological signs triplicities
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    public static $sign_triplicity = array(
        'Fire',
        'Earth',
        'Air',
        'Water',
    );

    /**
     *  Astrological signs polarities
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    public static $sign_polarity = array(
        'Positive',
        'Negative',
    );

    // Methods

    /**
     *    @param    $key    integer|string
     *  @since  ver. 0.7.0 (edit. Sovereign)
     */
    public static function wxPhase($key) {
        return \tribune::elbowDrop($key, self::$wu_xing);
    }

    /**
     *    @param    $key    integer|string
     *  @since  ver. 0.7.0 (edit. Sovereign)
     */
    public static function starColour($key) {
        return \tribune::elbowDrop($key, self::$star_colours);
    }

    /**
     *    @param    $number    integer    1-9
     *  @since  ver. 0.7.0 (edit. Sovereign)
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
     *  @since  ver. 0.7.0 (edit. Sovereign)
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
     *  @since  ver. 0.7.0 (edit. Sovereign)
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
     *  @since  ver. 0.7.0 (edit. Sovereign)
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