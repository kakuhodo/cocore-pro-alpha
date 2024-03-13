<?php
namespace Kakuhodo\CoCore;

use Pearlpuppy\CoCore\{
    Awp,
    Myt,
    Myt\Lime,
    Myt\Tribune,
    SuperCal,
    SuperCal\Cal,
};

/**
 *  @file   Sandy
 */
global $cocore;

/**
 *
 */

// $cocore->slap($cocore::$dependencies, 'deps');
$cocore->slap(Awp\Whip::wpx_path2uri(__FILE__), 'uri');
$cocore->slap($cocore, 'Product');
$cocore->slap(wp_style_is('cocore'), '_EQ');

/**
 *
 *
$caller = 'hookActionWpEnqueueScripts';
$caller2 = 'hookFilterAdminEnqueueScripts';
$matched = preg_match('/(Action|Filter)([A-Z][^A-Z]+)[A-Z]/', $caller, $matches);
$matched2 = preg_match('/(Action|Filter)([A-Z][^A-Z]+)[A-Z]/', $caller2, $matches2);
$cocore->slap($matches, 'matches:');
$cocore->slap($matches2, 'matches2:');

/**
 *
 *
$headers = [];
for ($i = 1; $i <= 6; $i++) {
    $n = 4 - $i;
    if ($n < 0) {
        $a = $n * 2 + 24;
    } else {
        $a = $n * 5 + 25;
    }
    $headers["H$i"] = $a * 5;
}
$cocore->slap($headers, 'headers');

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
for ($i = 0; $i < 24; $i++) {
    $l = ($i + 21) % 24 * 15;
    $m = floor(($i + 2) % 24 / 2) + 1;
    $s = SuperCal\Integrator::stGetSign($i);
    echo "<pre>i = $i, mon = $m, λ = $l, sign = $s</pre>";
}

/**
 *
 *
$lc = SuperCal\Integrator::annualTermDays(2, 1968);
$cocore->slap($lc, '_term');

/**
 *
 */

/**
 *
 *
$y = 100;
$z = 100;
$cocore->slap($y--, 'Y--');
$cocore->slap(--$z, '--Z');
$cocore->slap($y, 'Y');
$cocore->slap($z, 'Z');

/**
 *
 *
$cal = new Cal('1968-06-25');
$cocore->slap(intval(abs(-4.2)), '_-4.2');
$cocore->slap($cal->format('l'), 'was born on ');
$cocore->slap($cal, 'Cal');

/**
 *
 *
$hoge = new \DateTimeImmutable;
$cocore->slap($hoge, 'Hoge');

/**
 *
 *
class Fruits extends \RecursiveArrayIterator
{
    public $jamable = true;
}

$fruits = [
    'red' => ['apple', 'strawberry']
];
$i_fruits = new Fruits($fruits);

$i_fruits['jamable'] = false;

$cocore->slap($i_fruits->red, 'ite fruits');

/**
 *
 *
$cocore->slap($cal->getTimezone(), 'TZ');

$sexcat = SuperCal\SexagenaryCatalogue::getInstance();
$cocore->slap($sexcat, 'SexCat');

/**
 *
 */

/**
 *
 */

/**
 *
 *
$cocore->slap($cocore, 'Product');

/**
 *
 *
$cocore->slap($cocore->doDyna(), 'stac');

/**
 *
 */

/**
 *
 */

/**
 *
 *
$array = [
    1,
    2,
    [3, 4, 5],
    6,
    [7, [8, 9]],
];
$rai = new \RecursiveArrayIterator($array);

$rai['hoge'] = ['mage' => 'fuga'];

$cocore->slap($rai, 'test');


/**
 *
 *
$hoge = new Lime('h1#99', 'Wii!');
$cocore->slap($hoge);

wp_admin_notice('This UNHOOKED message via <code>' . basename(__FILE__) . '</code>', ['type' => 'success']);

$data = ['apple', 'banana', 'cherry'];
$ul = new Myt\Convertor('ul', $data);
$ul->verify('dl');
$ul->expose();

/**
 *
 */

/**
 *
 *
$cocore->slap('hoge');
$cocore->slap($cocore);
#$cocore->slap('mage', 1);

#$cocore->consExpose();

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
global $cocore;
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
