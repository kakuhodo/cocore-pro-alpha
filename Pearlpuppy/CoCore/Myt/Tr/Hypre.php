<?php
namespace Pearlpuppy\CoCore\Myt;

/**
 * @file
 */

/**
 *
 */
trait Tr_Hypre {

	// Mixins

	use Tr_HypreLime;

	// Methods

	/**
	 *
	 */
	public static function marq(Abs_Citron $lmnt) {
		$format = in_array($lmnt->tag, self::$empties) ? self::$emp_format : self::$ht_format;
		$nl = self::$line_breaker;
		$format = in_array($lmnt->tag, self::$inlines) && is_string($lmnt->content) ? $format : "{$nl}{$format}{$nl}";
		$vars = array(
			$lmnt->tag,
			self::tribe($lmnt->attributes),
		);
		if (!in_array($lmnt->tag, self::$empties)) {
			if ($lmnt->content instanceof Abs_Citron) {
				$vars[2] = self::marq($lmnt->content);
			} elseif (is_array($lmnt->content)) {
				$vars[2] = '';
				foreach ($lmnt->content as $content) {
					$vars[2] .= $content instanceof Abs_Citron ? self::marq($content) : $content;
				}
			} else {
				$vars[2] = $lmnt->content;
			}
		}
		$markup = vsprintf($format, $vars);
		return str_replace("\n\n", "\n", $markup);
	}

	/**
	 *	Simple Lmntor arguments.
	 */
	public static function argent($tag, $classes = []) {
		$args = array(
			'#tag' => $tag,
			'classes' => $classes
		);
		return $args;
	}

	/**
	 *	Dresses variable up.
	 */
	public static function preyer($var, $label = 'Preyer', $mode = 0, $return = false) {
		$methods = array(
			'self::prePrint',
			'self::varDispose',
		);
		$format = "<pre>$label: %s</pre>";
		$prey = forward_static_call($methods[$mode], $var);
		if ($return) {
			return sprintf($format, $prey);
		}
		printf($format, $prey);
	}

	/**
	 *
	 */
	public static function varDispose($var) {
		ob_start();
		var_dump($var);
		$pose = ob_get_contents();
		ob_end_clean();
		return $pose;
	}

	/**
	 *
	 */
	public static function prePrint($var) {
		return print_r($var, true);
	}

	/**
	 *
	 */
	public static function is_input($operator) {
		return in_array($operator, self::$input_types);
	}

	/**
	 *
	 */
	public static function is_checker($operator) {
		return in_array($operator, self::$checkers);
	}

	/**
	 *
	 */
	public static function is_multi($operator) {
		return in_array($operator, self::$multiples);
	}

	/**
	 *
	 */
	public static function is_formal($tag) {
		$is = false;
		if (in_array($tag, self::$form_parts) || $tag == 'input') {
			$is = true;
		}
		return $is;
	}

	/**
	 *
	 */
	public static function op2tag($operator) {
		foreach (self::$operators as $key => $val) {
			if ($key == $operator || $val == $operator || (is_array($val) && in_array($operator, $val))) {
				return $key;
			}
		}
		return false;
	}

	/**
	 *
	 */
	public static function uilmnt($operator, $values) {
	}

	/**
	 *
	 */
	public static function breed($tag, $classes = array()) {
		if (is_string($classes)) {
			$classes = [$classes];
		}
		if (!is_array($classes)) {
			$classes = array();
		}
		$bred = array(
			'#tag' => $tag,
			'classes' => $classes,
		);
		return $bred;
	}

	/**
	 *
	 */
	public static function breeder($tag, $classes = array()) {
		$args = self::breed($tag, $classes);
		return new Lmntor($args);
	}

	/**
	 *	Detect what child should born from passed parent tag.
	 *	@returns	(array|mixed)	leader: heading, led: content body
	 *
	 *	CAUTION!
	 *		Returned values are for the child (not for the parent).
	 */
	public static function bear($tag, $key = null) {
		// defaults
		$kid = array(
			'leader' => null,
			'led' => null,
			'tailor' => null,
		);

		// check and define
		switch ($tag) {
			case 'dl':
				$kid['leader'] = 'dt';
				$kid['led'] = 'dd';
				break;
			case 'ol':
			case 'ul':
				$kid['led'] = 'li';
				break;
			case 'select':
				$kid['led'] = 'option';
				break;
			case 'tr':
				$kid['leader'] = 'th';
				$kid['led'] = 'td';
				break;
			case 'article':
		#	case 'main':
			case 'aside':
			case 'section':
				$kid['leader'] = 'header';
				$kid['led'] = 'section';
				$kid['tailor'] = 'footer';
				break;
			case 'table':
				$kid['leader'] = 'thead';
				$kid['led'] = 'tbody';
				$kid['tailor'] = 'tfoot';
				break;
			case 'tbody':
			case 'thead':
			case 'tfoot':
				$kid['led'] = 'tr';
				break;
		}

		// release
		return $key ? $kid[$key] : $kid;
	}

	/**
	 *
	 */
	public static function spanky($strig) {
		return sprintf(self::$span_format, $strig);
	}

	/**
	 *
	 */

//[EOT]*/
}
