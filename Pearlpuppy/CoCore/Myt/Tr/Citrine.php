<?php
namespace Pearlpuppy\CoCore\Myt;

/**
 * @file
 */

/**
 *	Universal dynamic methods for Citrons.
 */
trait Tr_Citrine {

	// Mixins

	/**
	 *
	 */
	use Tr_HypreLime;

	// Properties

	/**
	 *
	 */

	// Methods

	/**
	 *
	 */
	protected function init_stats() {
		self::$pat_alpha = tribune::pat('alphacap');
	}

	/**
	 *
	 */
	protected function cracker($selector) {
		$original = $selector;
		$this->crackAttr($selector);		// !!! define screwAttr() to extract attributes from a selector.
		$this->crackClass($selector);
		$this->crackId($selector);
		$this->crackTag($selector);
	}

	/**
	 *
	 */
	protected function crackAttr(&$selector) {
		// check
		$matched = preg_match_all("/\[(.*)\]/", $selector, $matches);
		// exclude
		if (!$matched) {
			return;
		}
		// prep
		$attrs = array();
		$glue = '=';
		// sweep
		$selector = str_replace($matches[0], '', $selector);
		// store
		foreach ($matches[1] as $match) {
			$eqs = substr_count($match, $glue);
			$pos = strpos($match, $glue);
			if ($eqs > 1 || !$match || $pos === 0) {
				continue;
			} elseif ($pos === false) {
				$pos = strlen($match);
			}
			$key = substr($match, 0, $pos);
			$value = substr($match, $pos + 1);
			$attrs[$key] = $value;
		}
		$this->specify($attrs);
	}

	/**
	 *	Compiles HTML classes from a selector.
	 */
	protected function crackClass(&$selector) {
		// check
		$matched = preg_match_all("/\.([a-zA-Z]+[\w|-]*)/", $selector, $matches);
		// exclude
		if (!$matched) {
			return;
		}
		// store
		$this->classify($matches[1]);
		// sweep
		$selector = str_replace($matches[0], '', $selector);
	}

	/**
	 *
	 */
	protected function crackId(&$selector) {
		// check
		$matched = preg_match("/#([a-zA-Z]+[\w|-]*)/", $selector, $matches);
		// exclude
		if (!$matched) {
			return;
		}
		// store
		$this->identify($matches[1]);
		// sweep
		$selector = str_replace($matches[0], '', $selector);
	}

	/**
	 *
	 */
	protected function crackTag(&$selector) {
		// check
		$matched = preg_match("/^(h[1-6]|[a-z]+)/", $selector, $matches);
		// exclude
		if (!$matched) {
			return;
		}
		// store
		$this->verify($matches[1]);
		// sweep
		$selector = str_replace($matches[0], '', $selector);
	}

	/**
	 *
	 */
	protected function clean_content($contents) {
		return $contents;
	}

	protected function validate() {
	}

	/**
	 *	Makes a list for ul|ol|dl|?select
	 *
	 *		For now, only usable for ul|ol. 181113 v0.2.4
	 */
	public function listen() {
		if (!array_key_exists($this->tag, static::$menages)) {
			return false;
		}
		$row = static::$menages[$this->tag];
		if (is_array($row)) {
		}
		if ($this->content instanceof self && $this->content->tag == $row) {
			return;
		} elseif (is_array($this->content)) {
			$contents = array();
			foreach ($this->content as $key => $content) {
				$obj = new static();
				$obj->verify($row);
				$obj->gratify($content);
				$contents[$key] = $obj;
			}
			$this->content = $contents;
		} else {
			$obj = new static();
			$obj->verify($row);
			$obj->gratify($this->content);
			$this->content = $obj;
		}
	}

	// Methods inspired by jQuery

	/**
	 *
	 */
	public function addClass() {
	}

	/**
	 *
	 */
	public function attr($name_or_map, $value = null) {
		// for map
		if (is_array($name_or_map)) {
			foreach ($name_or_map as $name => $value) {
				if (is_null($value)) {
					$value = '';
				}
				$this->attr($name, $value);
			}
			return;
		}
		// define, refine
		$name = $name_or_map;
		if ($name == 'class') {
			$name = 'classes';
		}
		// retrieve
		if (is_null($value)) {
			if (isset($this->attributes[$name])) {
				return $this->attributes[$name];
			} else {
				return false;
			}
		}
		// validate
		$valid = preg_match("/^[a-z]+[\w|-]*$/", $name);
		if (!$valid) {
			return false;
		}
		// assign
		$this->attributes[$name] = $value;
		return;
	}

	/**
	 *
	 */
	public function hasClass() {
	}

	/**
	 *
	 */
	public function prop() {
	}

	/**
	 *
	 */
	public function removeAttr() {
	}

	/**
	 *
	 */
	public function removeClass() {
	}

	/**
	 *
	 */
	public function removeProp() {
	}

	/**
	 *
	 */
	public function toggleClass() {
	}

	/**
	 *
	 */
	public function val() {
	}

	/**
	 *
	 */

//[EOT]*/
}
