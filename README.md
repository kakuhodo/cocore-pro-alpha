# cocore-pro-alpha
Continuous developing environment of CoCore

## Edition Pierre
This edition based on edition Chic of CoCore (ver. 0.9.0).

### Philosophy
- Establishes AWP concept.
- Makes plugin development easier.

## Versions
| version | updated |
|:---:|:---:|
| 0.10.1 | 2024-02-13 |

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

> [!NOTE] *Consulat*入出力タイミング
> `admin_notices` VS `wp_dashboard_setup`
> 従来、*Sandy* は、`wp_dashboard_setup` で `wp_add_dashboard_widget` しているが、ダッシュボードウィジェットは、2-4カラムの構成なので、幅が狭い。
> コードビューは基本的に `<pre>` なので、幅は広いほうが好ましい。
> `admin_notices` であれば、最大幅を使用できるからこの用途に最適かと思ったけど、検証の結果、どうやら *hook* のタイミングの関係で、*Sandy* で追加したものは、｀admin_notices` で *Consulat* を展開してもでは出力されない。
> こういうときにPHPの**遅延静的束縛**が有効なのもと思ったけど、こちらも試してみた結果どうやらダメっぽい。
> `admin_notices` の `$priority` を上げてみてもやはりダメ。(2024-02-16)

## Guidelines
### Namespace
```php
<Production>\<Brand>\<package>
```