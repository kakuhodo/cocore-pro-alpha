<?php
namespace Pearlpuppy\CoCore\Myt;

/**
 *  @file   Bough
 *  @since  ver. 0.1.0 (edit. Sovereign 117)
 */

/**
 *    Utilities for files, directories, objects, and namespaces.
 */
trait Tr_Bough {

    // Mixins

    /**
     *
     */

    // Properties

    /**
     *  @since  ver. 0.1.x (edit. Sovereign)
     *  @update ver. 0.10.5 (edit. Pierre)
     */
    public static $resourse_extensions = array(
        'style' => 'css',
        'script' => 'js',
        'image' => array(
            'png',
            'jpg',
            'gif',
        ),
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
     *    Integrated aliasing by the unit of namespace.
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
     *    Returns an extension with leading dot.
     */
    public static function x10sn($resource_type) {
        return '.' . self::$resourse_extensions[$resource_type];
    }

    /**
     *    Provides the last part of namespace.
     *        !! given fullname won't be shorten.
     */
    public static function forename($fullname) {
        return self::strPop('\\', $fullname);
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    public static function parseJsonFile(string $file, ?bool $associative = null, int $depth = 512, int $flags = 0): mixed
    {
        $json = file_get_contents($file);
        return json_decode($json, $associative, $depth, $flags);
    }

    /**
     *
     */

//[EOT]*/
}
