<?php
namespace Pearlpuppy\CoCore\Myt;

/**
 *	@file	Citrus
 *		Much autonomic subversion of Citron.
 */
abstract class Abs_Citrus extends Abs_Citron {

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

	// Constructor

	/**
	 *	@param	$selector	(string)	CSS selector
	 */
	public function __construct($selector = null, $contents = array()) {
		$this->init_stats();
		$this->cracker($selector);
		$this->content = $this->clean_content($contents);
		$this->listen();
	}

	// Methods

	/**
	 *
	 */

//[EOAC]*/
}
