<?php
namespace Pearlpuppy\CoCore\Myt;

/**
 * @file
 */

/**
 *	Utilities for files, directories, objects, and namespaces.
 */
trait Tr_Bough {

	// Mixins

	/**
	 *
	 */

	// Properties

	/**
	 *
	 */
	public static $resourse_extensions = array(
		'style' => 'css',
		'script' => 'js',
	);

	// Methods

	/**
	 *
	 */
	public static function get_files($dir, $extension = null) {
		$files = scandir($dir);
		if ($extension) {
			$files = preg_grep("/^[a-zA-Z].+\.{$extension}$/", $files);
		}
		return $files;
	}

	/**
	 *	Integrated aliasing by the unit of namespace.
	 */
	public static function holynames($names, $namespace) {
		foreach ($names as $key => $value) {
			if (is_string($key)) {
				$name = $key;
				$holy = $value;
			} else {
				$name = $holy = $value;
			}
			class_alias($namespace . "\\$name", $holy);
		}
	}

	/**
	 *	Returns an extension with leading dot.
	 */
	public static function x10sn($resource_type) {
		return '.' . self::$resourse_extensions[$resource_type];
	}

	/**
	 *	Provides the last part of namespace.
	 *		!! given fullname won't be shorten.
	 */
	public static function forename($fullname) {
		return self::strPop('\\', $fullname);
	}

	/**
	 *
	 */

//[EOT]*/
}
