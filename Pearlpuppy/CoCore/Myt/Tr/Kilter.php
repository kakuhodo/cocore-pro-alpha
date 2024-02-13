<?php
namespace Pearlpuppy\CoCore\Myt;

/**
 *	Utilities for sanitizing and cleansing.
 */
trait Tr_Kilter {

	// Properties

	/**
	 *
	 */

	// Methods

	/**
	 *
	 */
	public static function nl2hentities($subject) {
		$replace = self::hex('_cr');
		$replace .= self::hex('_lf');
		$search = array(
			"\r\n",
			"\n\r",
			"\r",
			"\n",
		);
		return str_replace($search, $replace, $subject);
	}

	/**
	 *
	 */

//[EOT]*/
}