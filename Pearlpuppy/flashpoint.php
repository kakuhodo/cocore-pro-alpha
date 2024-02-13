<?php
namespace Pearlpuppy\NittyGritty;

/**
 *  @file   Flashpoint
 *      Activates core.
 *
 */

/**
 *  ---------------------------
 *  Autoloader
 *  ---------------------------
 */

/**
 *
 */
spl_autoload_register(__NAMESPACE__ . '\loadie');

/**
 *
 */
function loadie($class)
{
    $names = explode("\\", $class);
    $first_name = array_pop($names);
    $dir_name = str_replace('_', DIRECTORY_SEPARATOR, $first_name);
    $names[] = $dir_name;
    $file_path = implode(DIRECTORY_SEPARATOR, $names) . '.php';
    $full_path = dirname(__DIR__) . DIRECTORY_SEPARATOR . $file_path;
    if (!file_exists($full_path)) {
        return;
    }
    require_once($full_path);
}

/**
 *  ---------------------------
 *  ---------------------------
 */

/**
 *
 */

//[EOF]*/
