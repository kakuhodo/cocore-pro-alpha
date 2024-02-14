<?php
namespace Pearlpuppy\CoCore\Myt;

/**
 * @file
 */

/**
 *
 */
trait Tr_HypreLime {

	// Properties

	/**
	 *
	 */
	public static $operators = array(
		'input' => array(
			'text',
			'date',
			'time',
			'email',
			'url',
			'tel',
			'number',
			'checkbox',
			'radio',
		),
		'select' => array(
			'multiple',
		),
		'textarea' => array(),
	);

	/**
	 *
	 */
	public static $line_breaker = "\n";

	/**
	 *
	 */
	public static $inlines = ['a','abbr','acronym','applet','b','basefont','bdo','big','br','button','cite','code','dfn','em','font','i','iframe','img','input','kbd','label','map','object','q','s','samp','script','select','small','span','strike','strong','sub','sup','textarea','tt','u','var'];

	/**
	 *
	 */
	public static $empties = ['area','base','basefont','br','col','frame','hr','img','input','isindex','link','meta','param'];

	/**
	 *
	 */
	public static $input_types = ['text','search','tel','url','email','password','datetime','month','week','time','datetime-local','number','range','checkbox','radio','file','color','date','button','submit','reset','image'];

	/**
	 *
	 */
	public static $form_parts = ['select','datalist','textarea','keygen','progress','meter'];

	/**
	 *
	 */
	public static $checkers = ['checkbox','radio'];

	/**
	 *
	 */
	public static $multiples = ['checkbox','multiple'];

	/**
	 *
	 */
	public static $opt_valuables = ['checkbox','radio','select'];

	/**
	 *
	 */
	public static $lists = array(
		'ul' => 'li',
		'ol' => 'li',
		'dl' => ['div' => ['dt','dd']],
		'select' => ['optgroup' => 'option'],
		'datalist' => 'option',
	);

	/**
	 *
	 */
	public static $hexadecimals = array(
		'amp'		=> '26',		// &
		'angrt'		=> '221f',		// ∟
		'boxdr'		=> '250c',		// ┌
		'copy'		=> 'a9',		// ©
		'dtrif'		=> '25be',		// ▾
		'emsp'		=> '2003',		// (M space) 4
		'ensp'		=> '2002',		// (N space) 3
		'hellip'	=> '2026',		// …
		'laquo'		=> 'ab',		// «
		'lsaquo'	=> '2039',		// ‹
		'mdash'		=> '2014',		// —
		'nbsp'		=> 'a0',		// (Non-breaking space) 2
		'raquo'		=> 'bb',		// »
		'rdquo'		=> '201d',		// ”
		'rsaquo'	=> '203a',		// ›
		'sbquo'		=> '201c',		// “
		'thinsp'	=> '2009',		// (Thinner space) 1
		'yen'		=> 'a5',		// ¥
		'_lbsp'		=> '20',		// (Literal space, same width as nbsp but breakable) 2
		'_mbsp'		=> '3000',		// (MB char. width space) 4
		'_nwsp'		=> '200b',		// (No width space) 0
		'_circd'	=> '25ce',		// ◎ double circle
		'_circf'	=> '25cf',		// ● circle painted out
		'_cr'		=> '0d',		// CR "\r"
		'_lf'		=> '0a',		// NL "\n"
		'_triae'	=> '25b3',		// △ empty triangle
		'_xros'		=> '2715',		// ✕ multiplication x
	);

	/**
	 *
	 */
	public static $hex_format = '&#x%s;';

	/**
	 *
	 */
	public static $span_format = '<span>%s</span>';

	/**
	 *
	 */
	public static $ht_format = '<%1$s%2$s>%3$s</%1$s>';

	/**
	 *
	 */
	public static $emp_format = '<%1$s%2$s />';

	// Methods

	/**
	 *
	 */
	public static function tribe($attributes) {
		$attr = '';
		foreach ($attributes as $key => $val) {
			if ($key == 'classes') {
				$key = substr_replace($key, '', -2);
			}
			if (is_array($val)) {
				$val = array_unique($val);
				if (!empty($val)) {
					$val = array_diff($val, ['']);
					$val = implode(' ', $val);
				} else {
					unset($val);
				}
			} elseif (is_string($val)) {
				if (empty($val)) {
					unset($val);
				}
			}
			if (isset($val)) {
				$attr .= " {$key}=\"{$val}\"";
			}
		}
		return $attr;
	}

	/**
	 *	Encodes an HTML special character to hexadecimal code.
	 */
	public static function hex($keyword) {
		return sprintf(self::$hex_format, self::$hexadecimals[$keyword]);
	}

	/**
	 *	@param	$term	string
	 *	@param	$description	string|array
	 *	@return	$pair	array	A flat array of Lemon objects - one dt and dd(s).
	 */
	public static function dlPair($term, $description) {
		$dt = new Lemon('dt', null, $term);
		$pair = array($dt);
		if (is_array($description)) {
			foreach ($description as $desc) {
				$pair[] = new Lemon('dd', null, $desc);
			}
		} else {
			$pair[] = new Lemon('dd', null, $description);
		}
		return $pair;
	}

	/**
	 *
	 */

//[EOT]*/
}
