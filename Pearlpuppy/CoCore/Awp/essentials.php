<?php
namespace Pearlpuppy\CoCore\Awp;

use Pearlpuppy\CoCore\Myt\{
    Consul,
    Lime,
};

/**
 *  ---------------------------
 *  Minimal implements
 *      for development use
 *  ---------------------------
 */

/**
 *
 */
$console = new Consul();

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
    global $console;
    include_once(dirname(__DIR__, 3) . '/inclusions/sandy.php');
    $console->expose();
}

/**
 *
 */
function minId()
{
    return strtolower(str_replace('\\', '-', __NAMESPACE__));
}
