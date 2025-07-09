PHPで、HTML内のCSSをインライン化するComposerパッケージの検証を行いたいです。

候補のComposerパッケージは、下記の表の通りです。

| 手段 | Composer パッケージ／サービス | 特徴・メリット |
|------|------------------------------|----------------|
| Pelago Emogrifier | pelago/emogrifier | メール向けに設計された古参ライブラリ。CSS を解析し、対応する要素へ style 属性を付与。擬似クラス・!important も処理できる。MIT ライセンスで導入が手軽。 https://github.com/MyIntervals/emogrifier |
| CssToInlineStyles | tijsverkoyen/css-to-inline-styles | 依存ゼロの軽量実装。Laravel の Markdown メールでも使われる定番。API がシンプルで学習コストが低い。BSD-3-Clause license https://github.com/tijsverkoyen/CssToInlineStyles |

それぞれのComposerパッケージを使い、下記ファイル名でサンプルコードを作りたいです。
- `PelagoEmogrifier.php`
- `CssToInlineStyles.php`

ファイルの設置は、カレントディレクトリ内にお願いします。

変換元となるHTMLは、メールマガジンとして送信するHTMLです。
`sample.html` で変換元のHTMLを設置し、PHP側でHTMLファイルのテキストを読み取って使うようにしてください。

PHPのコードは、PSR-12に則ったフォーマットでお願いします。

作成した検証PHPファイルは、ターミナルから実行し、変換結果を `results/` ディレクトリ内に、実行PHPファイル名をケバブ形式のファイル名にしたHTMLファイルとして保存してください。
