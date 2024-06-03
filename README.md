# cocore-pro-alpha
Continuous developing environment of CoCore

## Edition Pierre
This edition based on edition Chic of CoCore (ver. 0.9.0).

### Philosophy
- Establishes AWP concept.
- Makes plugin development easier.

### Documents
- [Principles](/documents/principles.md)
- [Studies](/documents/studies.md)

### Versions
| version | updated | memo |
|:---:|:---:|---|
| 0.12.2 | 2024-06-03 | PetitTrianon elemental implements |
| 0.12.1 | 2024-06-02 |  |
| 0.12.0 | 2024-05-31 | Indroducing PetitTrianon |
| 0.11.2 | 2024-05-29 |  |
| 0.11.1 | 2024-05-14 |  |
| 0.11.0 | 2024-05-12 | Introducing Hook objects |
| 0.10.6 | 2024-05-10 | Begining of CoCore Entities |
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
_CoCore_ 内部で、WordPress の Theme と Plugin を総称。 _Tuner_ インターフェイスを実装。

### Product
Scheme自身（主にプラグインを想定）の代名詞。当プラグインなら、cocore-pro-alpha を指す。

### Project
Productに設定される案件（ユースケースや企画等）を指す。

### _Lemon_ object
_Myt_ が具備する HTML element 生成オブジェクトの総称。 _PQueue_ インターフェイスを実装。

### Entity
_CoCore_ を介して登録する _Custom Post Type_ や _Custom Taxonomy_ の総称。
