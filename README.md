# cocore-pro-alpha
Continuous developing environment of CoCore

## Edition Pierre
This edition based on edition Chic of CoCore (ver. 0.9.0).

### Philosophy
- Establishes AWP concept.
- Makes plugin development easier.

## Versions
| version | updated | memo |
|:-:|:-:|-|
| 0.10.1 | 2024-02-13 ||
| 0.10.2 | 2024-02-17 | Introducing concept Consulat |

## Notes
- AWPに求める機能
    - Sandy
    - 簡便な *Notice* 表示
- Augmented WordPress (AWP)
    - オブジェクト指向に基づき、テーマおよびプラグインをより容易に開発、実装する。
        - 設定ファイル（JSON形式）に入力するだけで、基本的、汎用的な機能をカバー。
        - YAMLのほうが入力面では好ましいが、PECLのインストールを要するため、現状はJSONで先行し、将来的に両対応を目指す。
            - ➡️ ローカル MAMP Pro (PHP 8.2.0) には PECL yaml インストール済み (240211)
- 開発用コードレビュー画面 (Console的なやつ、subconcept *Consulat*)
    - Sandy に具備する
    - 表示させたいデータのシンプルな登録機能を有し、まとめて（一箇所に）出力
    - どこで登録するかによって、一部データが出力されない可能性
        - WPのhookのタイミングに因る？（下記「Consulat入出力タイミング」参照）

> [!IMPORTANT]
> (ver. 0.10.1-)
>
> *CoCore*が備える個別機能群の単位として、従来*package*等、複数の呼称が混在しているが、以後**component**に統一する。

> [!WARNING]
> (ver. 0.10.1-)
>
> 現状具備するコンポーネントは以下の2つ。
> - **Myt** 汎用コンポーネント
> - **Awp** WP環境拡張コンポーネント
>
> *Myt*は特定の環境に依存せず利用可能とする必要がある。したがって、*Myt*から*Awp*等、**他のコンポーネントの参照は不可**。
>
> *Myt*は、いわば*CoCore*の基底コンポーネントなので、他のコンポーネントからの*Myt*の参照は随時可能。
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

### `Iterator | Generator` (なんつーか、*Great Pre-trained Teacher* ですわ) 
GTPセンセから `Generator` について教わったときは、
> Generatorが最後の値をyieldした後、それを再び開始することはできません。全ての値を生成した後、Generatorは終了状態になり、再度イテレートしようとすると何も返しません。この意味で、「使用後に破棄される」と解釈することはできますが、これはGeneratorが一度に1つの値を出力するたびに起こるわけではなく、全ての値が生成された後の話です。

てことで、あとから参照できないなんて不便としか思えず、`Iterator` に軍配を上げたけど、よく考えたら参照したいのは、あとから編集したいというのが主な動機。
*Consulat* のように入出力を別系統とするケースでは、事後の編集をどうやって反映させるかを検討する際に、*Lemon* タイプの複雑なオブジェクト生成後となると、かなり込み入ったロジックを構築しなきゃなんない。
そんな不確かなものに手間をかけるくらいなら、`Iterator` よりさらに速い `Generator` の使いどころって、まさにこれじゃね、という感じ。

そんなわけで、入力 = `Iterator`, 出力 = `Generator` で決着（？） (2024-02-17)

### *Consulat*入出力タイミング
`admin_notices` VS `wp_dashboard_setup`
従来、*Sandy* は、`wp_dashboard_setup` で `wp_add_dashboard_widget` しているが、ダッシュボードウィジェットは、2-4カラムの構成なので、幅が狭い。
コードビューは基本的に `<pre>` なので、幅は広いほうが好ましい。

`admin_notices` であれば、最大幅を使用できるからこの用途に最適かと思ったけど、検証の結果、どうやら *hook* のタイミングの関係で、*Sandy* で追加したものは、`admin_notices` で *Consulat* を展開してもでは出力されない。
こういうときにPHPの**遅延静的束縛**が有効なのもと思ったけど、こちらも試してみた結果どうやらダメっぽい。
`admin_notices` の `$priority` を下げてみてもやはりダメ。(2024-02-16)

## Guidelines
### Namespace
```php
<Production>\<Brand>\<Component>
```
