<?php
namespace Kakuhodo\CoCore;

use Pearlpuppy\CoCore\Awp;

/*
Plugin Name: CoCore Pro Alpha
Plugin URI: https://cocore.biz
Description: Continuous developing environment of CoCore
Author: princepink
Version:	0.11.1
Author URI: https://kakuhodo.com
Text Domain: cocore-pro-alpha
Domain Path: /languages
Since: 2024-02-13
Update: 2024-05-12
*/

/**
 *  The minimum requirements
 */
require_once('sesame.php');

/**
 *
 */
$cocore = new Product(__FILE__);
$cocore->roll();
#$cocore->hook();


/**
 *
 *
function fuga()
{
    add_management_page('Coco Test', 'Coco test menu', 'edit_posts', 'coco_test');
}

function foo($classes)
{
    $classes .= ' foooo';
    return $classes;
}

function boo($classes)
{
    $classes .= ' boooo';
    return $classes;
}

$f = new Awp\Filter('admin_body_class', ['Kakuhodo\CoCore\foo','Kakuhodo\CoCore\boo']);
$f->hook();


$a = new Awp\Action('admin_menu', ['Kakuhodo\CoCore\fuga']);
$a->hook();
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
 *  ---------------------------
 *  
 *  ---------------------------
 */

/**
 *  ---------------------------
 *  ---------------------------
 */

/**
 *
 */

//[EOF]*/
