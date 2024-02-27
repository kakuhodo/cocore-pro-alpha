<?php
namespace Kakuhodo\CoCore;

use Pearlpuppy\CoCore\Awp;

/*
Plugin Name: CoCore Pro Alpha
Plugin URI: https://cocore.biz
Description: Continuous developing environment of CoCore
Author: princepink
Version:	0.10.5
Author URI: https://kakuhodo.com
Text Domain: cocore-pro-alpha
Domain Path: /languages
Since: 2024-02-13
Update: 2024-02-26
*/

/**
 *  The minimum requirements
 */
require_once(__DIR__ . '/sesame.php');

/**
 *
 */
$product = new Product(__FILE__, __NAMESPACE__);
$product->hook();


/**
 *
 */
function scActionAdminNotices()
{
    echo '<div class="notice notice-info"><p>This info from <code>' . basename(__FILE__) . '</code></p></div>';
}


/**
 *
 *
function note()
{
    echo '<div class="notice notice-x"><p>This from product file</p><pre>' . print_r(Cons::$data, true) . '</pre></div>';
}
add_action('admin_notices', __NAMESPACE__ . '\note', 999999);

/**
 *
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

/**
 *
 *
$code = new \Pearlpuppy\Myt\Lime('code', print_r($awp->conf, true));
$pre = new \Pearlpuppy\Myt\Lime('pre', $code);
$pre->expose();

/**
 *
 *
\Pearlpuppy\Myt\AugmentedWp::greet();

/**
 *  ---------------------------
 *  
 *  ---------------------------
 */

/**
 *
 *
function scActionWp()
{
    echo __FUNCTION__;
}

/**
 *  ---------------------------
 *  ---------------------------
 */

/**
 *
 */

//[EOF]*/
