cocore-pro-alpha
# Studies

## Substream studies
### Info
* そのまま子テーマの情報を取得
* 親テーマの情報にアクセスしたい場合は、 `$info->parent`

### Supports
* デフォルトは親テーマの設定を**原則上書き(?)**

### AWP Settings
* デフォルトは親テーマの設定を**原則上書き(?)**

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
- _Hook_ オブジェクト
    - `Filter` および `Action` を導入 (0.11.0)
- dash widget _CoCore Spec_ の導入を検討 (0.12.x)
    - CoCore の稼働 Scheme (Plugin | Theme)
    - PHP ver.
    - ...

```
this line is just for testing purpose
```

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
>
> _Hook_ のオブジェクト化を検討。実行するなら、バージョンを ver. 0.11.x とする。(2024-05-10)

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

### ChatGTP 曰く
(2024-05-14)
WordPress には、meta_type, object_type, post_type という似通った用語がありますが、それぞれの違いを教えてください。

ChatGPT
WordPressでは、meta_type, object_type, post_type という用語があり、それぞれ異なる概念を表しています。以下、各用語の意味と違いについて詳しく説明します。

meta_type

meta_type は、メタデータがどの種類のWordPressオブジェクトに関連付けられているかを示します。WordPressには様々なタイプのメタデータが存在し、これには post, comment, user, term などが含まれます。たとえば、post_meta は投稿に関連付けられたメタデータ、user_meta はユーザーに関連付けられたメタデータを指します。これらのメタデータはそれぞれ専用のテーブル（wp_postmeta, wp_usermeta など）に保存され、関連するオブジェクトに対して追加情報を提供します。
object_type

object_type は、特定の機能やAPIが対象とするデータの種類を指します。これは meta_type と関連がありますが、もっと広範囲のAPIや機能に適用される場合が多いです。たとえば、カスタム投稿タイプ、デフォルトの投稿タイプ（post, page）、タクソノミータイプ（category, tag）などがこれに該当します。object_type を指定することで、そのタイプに固有の機能や振る舞いをカスタマイズできます。
post_type

post_type は、WordPress内で異なる種類の投稿を区別するためのラベルです。WordPressの投稿タイプには post（標準の投稿）、page（ページ）、およびユーザーが定義するカスタム投稿タイプが含まれます。各投稿タイプは特定の機能やテンプレートを持ち、それぞれの需要に応じた管理が可能です。カスタム投稿タイプを作成することで、ポートフォリオ、製品データベース、イベントカレンダーなど、様々な内容を独自の方法で表示・管理することができます。
これらの用語は、WordPressの構造の中で異なる役割を持っており、特にプラグインやテーマを開発する際にはこれらの違いを理解しておくことが重要です。それぞれがどのようにデータを扱い、どのようにWordPressのシステム内で機能するかを把握することで、より効果的で柔軟な開発が可能になります。

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
