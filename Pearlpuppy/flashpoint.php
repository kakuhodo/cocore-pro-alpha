<?php
namespace Pearlpuppy\NittyGritty;

use Pearlpuppy\CoCore\Myt\{
    Consul,
    Lime,
};

/**
 *  @file   Flashpoint
 *      Activates core.
 *
 */

/**
 *  ---------------------------
 *  Constants
 *  ===========================
 *  IMPORTANT
 *      DO NOT REMOVE!
 *      These are used in systems through Production, permanently.
 *  ===========================
 */

/**
 *
 */
define('D_S', DIRECTORY_SEPARATOR);
define('PRODUCTION_NS', __NAMESPACE__);

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
    $dir_name = str_replace('_', D_S, $first_name);
    $names[] = $dir_name;
    $file_path = implode(D_S, $names) . '.php';
    $full_path = dirname(__DIR__) . D_S . $file_path;
    if (!file_exists($full_path)) {
        return;
    }
    require_once($full_path);
}

/**
 *  ---------------------------
 *  System requirements
 *  ---------------------------
 */

/**
 *  Loads ALL CoCore/<Component>/essentials.php
 */
$dir = __DIR__ . D_S . 'CoCore';
$scanned = scandir($dir);
foreach ($scanned as $fd) {
    if (strpos($fd, '.') !== false) {
        continue;
    }
    $file = $dir . D_S . $fd . D_S . 'essentials.php';
    if (!file_exists($file)) {
        continue;
    }
    require_once($file);
}

/**
 *  ---------------------------
 *  ---------------------------
 */

/**
 *  ---------------------------
 *  ---------------------------
 *  ===========================
 */

/**
 *
 */

/**
 *
 */

/**
 *
 */

//[EOF]*/
