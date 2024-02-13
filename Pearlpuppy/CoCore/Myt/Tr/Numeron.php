<?php
namespace Pearlpuppy\CoCore\Myt;

/**
 *	Integers, floats, and any other numbers.
 */
trait Tr_Numeron {

	// Mixins

	/**
	 *
	 */

	// Properties

	/**
	 *
	 */
	public static $kanji_digit = array(
		'〇',
		'一',
		'二',
		'三',
		'四',
		'五',
		'六',
		'七',
		'八',
		'九',
	);

	/**
	 *
	 */

	// Methods

	/**
	 *	Reduces an ordinal of circular numbers from passed integer.
	 *
	 *	@param	$number	(int)	Any integer - non-float, negative or positive.
	 *	@param	$cardinal	(int)	Natural number - non-float, positive. (N>=0) The numbers quantity per unit.
	 *		e.g.	16 for hexadecimal
	 *	@return	(int)	Natural number.
	 *		e.g.	[0-15] for hexadecimal
	 */
	public static function circulate($number, $cardinal) {
		$n = $number < 0 ? ($number % $cardinal) + $cardinal : $number;
		return $n % $cardinal;
	}
	
	/**
	 *	Checks the number is odd or not.
	 */
	public static function isOdd(int $number) {
		$return = $number & 1;
		return (bool) $return;
	}
	
	/**
	 *	Checks summed number of power of 2 having the number or not.
	 */
	public static function hasP2sum(int $number, int $sum) {
		$div = intdiv($sum, $number);
		return isOdd($div);
	}

	/**
	 *
	 */

//[EOT]*/
}