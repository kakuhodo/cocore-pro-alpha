<?php
namespace Pearlpuppy\NittyGritty;

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
 *  Minimal implements
 *      for development use
 *  ---------------------------
 */

/**
 *
 */
if (defined('WP_DEBUG') && WP_DEBUG) {
    add_action('wp_dashboard_setup', __NAMESPACE__ . '\sandyWidget');
}

/**
 *
 */
function sandyWidget()
{
    wp_add_dashboard_widget(minId() . '-sandy', 'Sandy', __NAMESPACE__ . '\hcbSandyScreen');
}

/**
 *
 */
function hcbSandyScreen()
{
    include_once(dirname(__DIR__) . '/inclusions/sandy.php');
}

/**
 *
 */
function minId()
{
    return strtolower(str_replace('\\', '-', __NAMESPACE__));
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
