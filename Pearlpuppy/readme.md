# Edition Pierre

This edition based on edition Chic of CoCore (ver. 0.9.0).

Since this, trying to separate components like below.
- **CoCore**
    - Augmented WordPress.
    - Easier settings of Custom Post-type and Custom Taxonomy.
- **Myt**
    General methods available even without WP.

## Version
0.10.x

## Philosophy
- Augmented WordPress (AWP)
    - オブジェクト指向に基づき、テーマおよびプラグインをより容易に開発、実装する。
        - 設定ファイル（JSON形式）に入力するだけで、基本的、汎用的な機能をカバー。
        - YAMLのほうが入力面では好ましいが、PECLのインストールを要するため、現状はJSONで先行し、将来的に両対応を目指す。
            - ➡️ ローカル MAMP Pro (PHP 8.2.0) には PECL yaml インストール済み (240211)

## Guidelines
### Namespace
```php
<Production>\<Brand>
```