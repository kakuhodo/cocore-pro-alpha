<?php
namespace Kakuhodo\CoCore;

use Pearlpuppy\CoCore\Myt\Lime;

/**
 *  @file   
 *      
 */
 
class Boo extends \Pearlpuppy\CoCore\Awp\Abs_Plugin
{
    
}

$yaml = yaml_parse_file(dirname(__DIR__) . '/product.yaml');

$hoge = new Lime('pre', 'Hoge: <code>' . print_r('', true) . '</code>');
$hoge->expose();


$imp = new \DateTimeImmutable('-0659-02-11');
$iwa = new \DateTimeImmutable('1989-07-10');
$diff = $imp->diff($iwa);

$mage = new Lime('p', '<dfn>Mage: </dfn>' . ($diff->days + 17) % 60);
$mage->expose();

/**
 *  ---------------------------
 *  
 *  ---------------------------
 */

/**
 *
 *
?>
<h1>Hi, this is Sandy.</h1>
<?php
/**
 *  ---------------------------
 *  ---------------------------
 */

/**
 *
 */

//[EOF]*/
