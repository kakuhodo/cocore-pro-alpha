<?php
namespace Pearlpuppy\CoCore\Myt;

/**
 * @file
 *	Utilities for addresses, locations and also locales, datetimes.
 */
trait Tr_Loca {

	// Mixin

	use Tr_Zodiac;

	// Properties

	/**
	 *
	 */
	public static $days_of_week = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

	/**
	 *
	 */
	public static $months = array(1 => 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');

	/**
	 *	Administrative divisions of Japan
	 */
	public static $jprefs = array(
		1 => '北海道',
		'青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県', '茨城県', '栃木県', '群馬県', '埼玉県', '千葉県', '東京都', '神奈川県', '新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県', '岐阜県', '静岡県', '愛知県', '三重県', '滋賀県', '京都府', '大阪府', '兵庫県', '奈良県', '和歌山県', '鳥取県', '島根県', '岡山県', '広島県', '山口県', '徳島県', '香川県', '愛媛県', '高知県', '福岡県', '佐賀県', '長崎県', '熊本県', '大分県', '宮崎県', '鹿児島県', '沖縄県',
	);

	// Methods

	/**
	 *	@param	$mode	(int.)	0: full-spell, 1: 3 letters, 2: without 'day'
	 */
	public static function days_of_week($mode = 1) {
		if ($mode == 1) {
			return substr_replace(self::$days_of_week, '', 3);
		} elseif ($mode == 2) {
			return str_replace('day', '', self::$days_of_week);
		} else {
			return self::$days_of_week;
		}
	}

	/**
	 *	Converts iCalendar datetime string to PHP dateTime object.
	 */
	public static function dt_i2p($ical_dt, $immutable = false) {
	}

	/**
	 *
	 */
	public static function l10n_dows($mode = 1) {
		if ($mode) {
			return Tongue::lex('dows_abbr');
		}
		return Tongue::lex('dows');
	}

	/**
	 *
	 */
	public static function wday_name($wday_number) {
		return self::$days_of_week[$wday_number];
	}

	/**
	 *
	 */
	public static function wday_number($wday_name) {
		return array_flip(self::$days_of_week)[$wday_name];
	}

	/**
	 *
	 */

//[EOT]*/
}
