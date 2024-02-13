<?php
namespace Pearlpuppy\CoCore\Myt;

/**
 *
 */
trait Tr_Zodiac {

	// Mixins

	/**
	 *
	 */

	// Properties

	/**
	 *	The sexagenary cycle is composed of ten Heavenly Stems and twelve Earthly Branches.
	 */
	public static $sexagenary_cycle = array(
		'stems' => array(
			'yang_wood'		=> '甲',
			'yin_wood'		=> '乙',
			'yang_fire'		=> '丙',
			'yin_fire'		=> '丁',
			'yang_earth'	=> '戊',
			'yin_earth'		=> '己',
			'yang_metal'	=> '庚',
			'yin_metal'		=> '辛',
			'yang_water'	=> '壬',
			'yin_water'		=> '癸',
		),
		'branches' => array(
			'rat'		=> '子',
			'ox'		=> '丑',
			'tiger'		=> '寅',
			'rabbit'	=> '卯',
			'dragon'	=> '辰',
			'snake'		=> '巳',
			'horse'		=> '午',
			'goat'		=> '未',
			'monkey'	=> '申',
			'rooster'	=> '酉',
			'dog'		=> '戌',
			'pig'		=> '亥',
		),
	);

	/**
	 *	The Wu Xing, also known as the Five Elements, Five Phases, the Five Agents ...
	 */
	public static $wu_xing = array(
		'wood'	=> '木',
		'fire'	=> '火',
		'earth'	=> '土',
		'metal'	=> '金',
		'water'	=> '水',
	);

	/**
	 *	The seven colours for stars.
	 */
	public static $star_colours = array(
		'white'		=> '白',
		'black'		=> '黒',
		'blue'		=> '碧',
		'green'		=> '緑',
		'yellow'	=> '黄',
		'red'		=> '赤',
		'purple'	=> '紫',
	);

	/**
	 *	The nine stars.
	 *		Each star has a pair of index number for colour and wuxing.
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
	 *	
	 */
	public static $six_stars = array(
		'earth'	=> '土',
		'metal'	=> '金',
		'fire'	=> '火',
		'uran'	=> '天王',
		'wood'	=> '木',
		'water'	=> '水',
	);

	public static $hexaster_destinies = array(
		'seed'			=> '種子',
		'sprout'		=> '緑生',
		'bloom'			=> '立花',
		'weakness'		=> '健弱',
		'attainment'	=> '達成',
		'breakdown'		=> '乱気',
		'reunion'		=> '再会',
		'wealth'		=> '財成',
		'steady'		=> '安定',
		'darkness'		=> '陰影',
		'passive'		=> '停止',
		'senility'		=> '減退',
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
		'star'		=> '%s星',
		'starman'	=> '%s星人',
		'horoscope'	=> '%s宮',
		'sign'		=> '%s座',
	);

	/**
	 *
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
	 */

	// Methods

	/**
	 *	@param	$key	integer|string
	 */
	public static function wxPhase($key) {
		return \tribune::elbowDrop($key, self::$wu_xing);
	}

	/**
	 *	@param	$key	integer|string
	 */
	public static function starColour($key) {
		return \tribune::elbowDrop($key, self::$star_colours);
	}

	/**
	 *	@param	$number	integer	1-9
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
	 *	@param	$number	integer	1-60: The star number.
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
	 *	Calculates the number of the Lichun day of February for a year.
	 *
	 *	@param	$year	(int)
	 *	@return	$dom	(int)	3|4|5, the day of February
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