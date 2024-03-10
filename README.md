# cocore-pro-alpha
Continuous developing environment of CoCore

## Edition Pierre
This edition based on edition Chic of CoCore (ver. 0.9.0).

### Philosophy
- Establishes AWP concept.
- Makes plugin development easier.

### Concepts

#### concept AC/DC
リスト状に展開するコンテンツを、データ配列を基にHTML生成、出力する。

##### 概念
- _Convertor_: 一次元配列から`ArrayIterator`を生成、これを`Generator`に変換して、HTML出力。
- _Invertor_: 二(多)次元配列から`RecursiveArrayIterator`を生成、これを`RevursiveIteratorIterator`を介して`Generator`に変換、HTML出力。

```
$oneDimArray = [
    'key' => 'value',
    ...
];

$multiDimArray = [
    [
        'key' => 'value',
        ...
    ],
    [
        'key' => 'value',
        ...
    ],
    ...
]
```

> [!CAUTION]
> 任意の _notice_ 出力は `wp_admin_notice()` で事足りるため、`Awp\Nottingham` については開発中止の方向 (240219)
>
> ※ `Myt\Invertor` は引き続き開発

### Versions
| version | updated | memo |
|:---:|:---:|---|
| 0.10.5 | 2024-03-06 | Connecting theme, assets autoload |
| 0.10.4 | 2024-02-26 | Introducing package SuperCal |
| 0.10.3 | 2024-02-19 | Brushed concept Consulat upto concept AC/DC, Terminated `Abs_Citrus` |
| 0.10.2 | 2024-02-17 | Began Consulat developement |
| 0.10.1 | 2024-02-13 | Established this continuous environment |
| 0.10.0 | 2024-02-06 | Started on another repositry, Introducing concept Consulat |

### Environments
#### Local
- MAMP Pro
    - PHP 8.1.x

#### Remote
- Xrea plus
    - PHP 8.1.x
    - SuperCal (Live)
        - https://cal.rosypink.com

> [!WARNING]
> どうやら Xrea の PHP 8.2.x では、現状標準で MySQL (MariaDB) が使えないため、ローカルも含め、8.1.x に落とす。(2024-02-28)

> [!WARNING]
> どうやら、Xrea の CATCH ALL機能 (default.rosypink.com) では、無料SSLを設定できない模様。本番用のサブドメは、ドメインとサイトを新規作成して、サイト設定でメインドメインに同期させる必要あり。(2024-02-28)

## Plans

### CoCore
- [ ] _SuperCal_
    - [ ] 曜日
    - [ ] 十干十二支（干支）
    - [ ] 12星座
    - [ ] 月齢
    - [ ] 六曜
    - [ ] 九星
    - [ ] 二十四節気
    - [ ] 四柱推命
    - [ ] 六星占術

#### AWP
- [ ] ~~_Nottingham_~~
- [x] _Consulat_
- [ ] Menu build via JSON

#### MyT

##### _Lemon_
- [ ] Table maker

##### _Tribune_

## Notes
- AWPに求める機能
    - Sandy
    - 簡便な _Notice_ 表示
- Augmented WordPress (AWP)
    - オブジェクト指向に基づき、テーマおよびプラグインをより容易に開発、実装する。
        - 設定ファイル（JSON形式）に入力するだけで、基本的、汎用的な機能をカバー。
        - YAMLのほうが入力面では好ましいが、PECLのインストールを要するため、現状はJSONで先行し、将来的に両対応を目指す。
            - ➡️ ローカル MAMP Pro (PHP 8.2.0) には PECL yaml インストール済み (240211)
- 開発用コードレビュー画面 (Console的なやつ、subconcept _Consulat_)
    - Sandy に具備する
    - 表示させたいデータのシンプルな登録機能を有し、まとめて（一箇所に）出力
    - どこで登録するかによって、一部データが出力されない可能性
        - WPのhookのタイミングに因る？（下記「Consulat入出力タイミング」参照）
- Concept AC/DC の導入に伴い、_Myt_ に `class Convertor`, `class Invertor` を増設する。(0.10.3)
    - `Awp\Consulat` は `Convertor`、`Awp\Nottingham` は `Invertor` をそれぞれ継承。
- SuperCal の構成
    - `Cal`
        - 個別の日付に対応、`DateTimeImmutable` の拡張
    - `Crystal`
        - **年、月、日、その他 に分けるか、要検討**
            - 分けるなら、`ArrayIterator`、統合型なら `RecursiveArrayIterator`
                - → **一旦統合型で** (2024-02-25)
    - `Integrator`
        - エンコーダ、静的メソッドのライブラリ
        - 日付を各要素（サブセット）を生成するための値 (int) に変換
    - `Diviner`
        - デコーダ、シングルトン

> [!NOTE]
> `enqueue` の `deps` については、直系の Brand-Product 間のみ設定する。 
>
> ```
> // e.g. ⬇️以外は $deps = []
> cocore > cocore-pro-alpha, aquamonte > aquamonte-pro-alpha
> ```
>
> `-admin` や `-front` の実装は稀なうえ、テーマからプラグインの参照はあまり現実的でないし、実質的にも意味はほとんどないと考えられる。そのため、これらを実装する場合も依存関係は考慮しない。 (2024-03-06)

> [!IMPORTANT]
> (ver. 0.10.1-)
>
> _CoCore_ が備える個別機能群の単位として、従来_package_等、複数の呼称が混在しているが、以後**component**に統一する。

> [!WARNING]
> (ver. 0.10.1-)
>
> 現状具備するコンポーネントは以下の2つ。
> - **Myt** 汎用コンポーネント
> - **Awp** WP環境拡張コンポーネント
>
> _Myt_ は特定の環境に依存せず利用可能とする必要がある。したがって、 _Myt_ から _Awp_ 等、**他のコンポーネントの参照は不可**。
>
> _Myt_ は、いわば _CoCore_ の基底コンポーネントなので、他のコンポーネントからの _Myt_ の参照は随時可能。
>
> ```
> // これは NG
> namespace Pearlpuppy\CoCore\Myt;
> use Pearlpuppy\CoCore\Awp;
>
> // これは OK
> namespace Pearlpuppy\CoCore\Awp;
> use Pearlpuppy\CoCore\Myt;
> ```

### Subsets for _SuperCal_
- 二十四節気と十二宮（西洋占星術）には一定の相関性があるため、可能なかぎり共通の計算式を使用する
    - 月の干支等も同様

### 二十四節気 ほか、算出式
@ref    https://www.nishishi.com/blog/2022/06/calc_equinoxday.html

```
// 以下、各日付の "日" の整数値を算出
# 春分(March)
vernal_equinox =int(20.8431+0.242194*($year-1980)-int(($year-1980)/4))
# 秋分(September)
automnal_equinox =int(23.2488+0.242194*($year-1980)-int(($year-1980)/4))
# 夏至(June)
summer_solstice =int(22.2747+0.24162603*($year-1900)-int(($year-1900)/4))
# 冬至(December)
winter_solstice =int(22.6587+0.24274049*($year-1900)-int(($year-1900)/4))
# 節分(February) - 立春の前日
spring_commences_eve =int(4.8693+0.242713*($year-1901)-int(($year-1901)/4))-1

// 上記の int($val) は、PHP の (int) floor($val) に相当
```

### その他、算出式

```
# 六十干支
0: 甲子
1: 乙丑
...
N = (Y - 4) % 60
```

### `Iterator | Generator` (なんつーか、 _Great Pre-trained Teacher_ ですわ) 
GTPセンセから `Generator` について教わったときは、
> Generatorが最後の値をyieldした後、それを再び開始することはできません。全ての値を生成した後、Generatorは終了状態になり、再度イテレートしようとすると何も返しません。この意味で、「使用後に破棄される」と解釈することはできますが、これはGeneratorが一度に1つの値を出力するたびに起こるわけではなく、全ての値が生成された後の話です。

てことで、あとから参照できないなんて不便としか思えず、`Iterator` に軍配を上げたけど、よく考えたら参照したいのは、あとから編集したいというのが主な動機。
_Consulat_ のように入出力を別系統とするケースでは、事後の編集をどうやって反映させるかを検討する際に、 _Lemon_ タイプの複雑なオブジェクト生成後となると、かなり込み入ったロジックを構築しなきゃなんない。
そんな不確かなものに手間をかけるくらいなら、`Iterator` よりさらに速い `Generator` の使いどころって、まさにこれじゃね、という感じ。

そんなわけで、入力 = `Iterator`, 出力 = `Generator` で決着（？） (2024-02-17)

### _Consulat_ 入出力タイミング
`admin_notices` VS `wp_dashboard_setup`
従来、_Sandy_ は、`wp_dashboard_setup` で `wp_add_dashboard_widget` しているが、ダッシュボードウィジェットは、2-4カラムの構成なので、幅が狭い。
コードビューは基本的に `<pre>` なので、幅は広いほうが好ましい。

`admin_notices` であれば、最大幅を使用できるからこの用途に最適かと思ったけど、検証の結果、どうやら _hook_ のタイミングの関係で、 _Sandy_ で追加したものは、`admin_notices` で _Consulat_ を展開してもでは出力されない。
こういうときにPHPの**遅延静的束縛**が有効なのかもと思ったけど、こちらも試してみた結果どうやらダメっぽい。
`admin_notices` の `$priority` を下げてみてもやはりダメ。(2024-02-16)

## Guidelines
### Namespace
```php
<Production>\<Brand>\<Component>

<Production>\<Product>\<Project>
```

### Naming rules
#### ファイル名
- Brand や Project 毎に1ファイルで賄えるもの (e.g. CSS, JS) は、固有名とする（基本的にclass以外は小文字）。
- 汎用的なものなら、代名詞（概念の総称）。(e.g. `product.json`, `Project.php`)
- プラグインがフロント用に具備するなら、末尾に`-front`、テーマが管理画面用に具備するなら、末尾に`-admin`をそれぞれ追加する。(e.g. `cocore.js`, `cocore-front.js`, `aquamonte-admin.css`)

## Glossaries

### Component
_CoCore_ が具備する機能群の単位。`namespace`の3ブロック目に相当。

### Scheme
_CoCore_ 内部で、WordPress の Theme と Plugin を総称。

### Product
Scheme自身（主にプラグインを想定）の代名詞。当プラグインなら、cocore-pro-alpha を指す。

### Project
Productに設定される案件（ユースケースや企画等）を指す。

### _Lemon_ object
_Myt_ が具備する HTML element 生成オブジェクトの総称。 _PQueue_ インターフェイスを実装。

## Memo
### 二十四節気 (Solar terms)
> 赤道を境に正反対になる（例：北半球が大暑のとき南半球は大寒である）。

## References

- 暦計算室 / 国立天文台  https://eco.mtk.nao.ac.jp/koyomi/
- 六十干支 / 日本の暦  https://www.ndl.go.jp/koyomi/chapter3/s1.html
- Solar System Dynamics / NASA Jet Propulsion Laboratory    https://ssd.jpl.nasa.gov
- オブジェクトと参照 / PHP.net   https://www.php.net/manual/ja/language.oop5.references.php

## Sample codes

### Singleton pattern

```php
class Singleton {
    private static $instance = null;

    private function __construct() {
        // something initialise
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}

$solo = Singleton::getInstance();
```
