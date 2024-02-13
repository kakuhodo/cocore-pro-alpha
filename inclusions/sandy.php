<?php
namespace Kakuhodo\CoCore;

use Pearlpuppy\CoCore\Myt\Lime;

/**
 *  @file   
 *      
 */
 
/**
 *
 *
$map = array(
    'name' => 'banana',
    'color' => 'yellow',
    'sort' => 'fruit',
);

$omap = (object) $map;

$imap = new \ArrayIterator($omap);
$imap[] = 'foo';

$arr = array();
foreach ($omap as $k => $v) {
    $arr[] = "$k: $v";
}

/**
 *
 *
$ul = new Lime('ul.foo[style=list-style-type: disc;]', ['aaa', 'bbb', 'ccc']);
$ul->expose();
/**
 *
 *
$hoge = new Lime('pre', 'Hoge: <code>' . print_r($ul, true) . '</code>');
$hoge->expose();

/**
 *
 */
$a = [
    "fruits" => ["apple", "banana", "grape"],
    "colors" => ["red" => "apple", "yellow" => "banana", "purple" => "grape"],
    "weights" => ["apple" => 50, "banana" => 70, "grape" => 100]
];

$iterator = new \RecursiveIteratorIterator(new \RecursiveArrayIterator($a), \RecursiveIteratorIterator::SELF_FIRST);

foreach ($iterator as $key => $value) {
    // 現在のイテレーションの深さを取得
    $depth = $iterator->getDepth();
    // 深さに応じたインデントを生成
    $indent = str_repeat('  ', $depth);
    
    echo '<pre>';
    if ($iterator->hasChildren()) {
        // 現在の要素が子を持つ場合（連想配列など）
        echo $indent . "$key($depth):\n";
    } else {
        // 現在の要素が子を持たない場合（最終的な値）
        echo $indent . "$key($depth) => $value\n";
    }
    echo '</pre>';
}


/**
 *
 *
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
 *  ---------------------------
 *  ---------------------------
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
