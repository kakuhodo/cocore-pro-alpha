<?php
namespace Kakuhodo\CoCore;

/**
 *
 */
use Pearlpuppy\CoCore\Awp;
use Pearlpuppy\CoCore\Myt;
use Pearlpuppy\CoCore\Myt\Lime;

/**
 *  @file   
 *      
 */

/**
 *
 */
global $product;

/**
 *
 */
$array = [
    1,
    2,
    [3, 4, 5],
    6,
    [7, [8, 9]],
];
$rai = new \RecursiveArrayIterator($array);

$rai['hoge'] = ['mage' => 'fuga'];

$product->consoler($rai);


/**
 *
 */
$hoge = new Lime('h1#99', 'Wii!');
$product->consoler($hoge);

/**
 *
 */

/**
 *
 *
$product->consoler('hoge');
$product->consoler($product);
#$product->consoler('mage', 1);

#$product->consExpose();

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
RecursiveArrayIterator

/**
 *
 *
$CONSL[] = $CONSL;
$CONSL->expose();

/**
 *
 *
Myt\Tribune::peel($CONSL, false, 'hoge', true, false);

/**
 *
 *
$CONSL->expose();

/**
 *
 */

/**
 *
 *
#$ite = $CONSL->getIterator();
$CONSL['why'] = 'not';

#$CONSL->expose();

#$CONSL[] = 'boo';

$CONSL[] = 777;
$CONSL->expose();

echo '<hr>';
$CONSL->offsetUnset('natto');

$CONSL[0] = $CONSL;

$CONSL->expose();

$CONSL->geneCon();

/**
 *
 *
echo '<pre><code>';
print_r($CONSL);
echo '</code></pre>';


#$CONSL->expose();

/**
 *
 */

/**
 *
 */

/**
 *
 *
$foo = [['banana', 'yellow'], ['strawberry', 'pink'], ['bar', 'Natto!']];

$CONSL = new Awp\Consulat($foo);
$CONSL[] = ['foo', 'Peach!!'];
#$CONSL->trans();
#$CONSL->verify('dl');

$CONSL->expose();


/**
 *
 *
Cons::$data[] = 'added on sandy';
echo '<pre><code>';
print_r(Cons::$data);
echo '</code></pre>';


/**
 *
 *
global $product;
echo '<pre><code>';
print_r($CONSL);
echo '</code></pre>';


/**
 *
 *
echo '<pre><code>';
foreach ($CONSL->content as $row) {
    print_r($row);
#    $row->expose();
}
echo '</code></pre>';

/**
 *
 *
?>
<pre>cons: <code><?php print_r($fuga); ?></code></pre>

<?php
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
 *
$dl = new Lime('dl.foo', ['banana' => 'yellow', 'strawberry' => 'pink', 'Natto!']);
$dl->expose();


/**
 *
 *
?>
<pre>dl: <code><?php print_r($dl); ?></code></pre>
<?php

/**
 *
 */

/**
 *
 */

/**
 *
 *
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
