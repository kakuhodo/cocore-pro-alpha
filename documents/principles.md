cocore-pro-alpha
# Principles

## Concepts

### concept AC/DC
リスト状に展開するコンテンツを、データ配列を基にHTML生成、出力する。

#### 概念
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

### concept _PetitTrianon_
SHC (since Sovereign) の後継。
Brand - Scheme (Product) - Hook の3者の整理（明確な棲み分け）と適切な連携を模索する。
(0.12.x)

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
