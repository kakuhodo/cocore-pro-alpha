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

## Guidelines
### Namespace
```php
<Production>\<Brand>\<package>
```