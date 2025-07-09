# PHPでHTML内のCSSをインライン化するComposerパッケージの検証


| 手段 | Composer パッケージ／サービス | 特徴・メリット | class名の既定動作 | クラス削除／保持のオプション |
|------|------------------------------|----------------|---------|----------------------------|
| Pelago Emogrifier | pelago/emogrifier | メール向けに設計された古参ライブラリ。CSS を解析し、対応する要素へ style 属性を付与。擬似クラス・!important も処理できる。MIT ライセンスで導入が手軽。 https://github.com/MyIntervals/emogrifier | クラス属性は **保持** | `HtmlPruner::removeRedundantClasses()` または `removeRedundantClassesAfterCssInlined()` をチェーンすると、インライン化後に **未使用クラスだけ** を削除できる。必要なクラスを残したい場合は `-emogrifier-keep` などを付けておく。 |
| CssToInlineStyles | tijsverkoyen/css-to-inline-styles | 依存ゼロの軽量実装。Laravel の Markdown メールでも使われる定番。API がシンプルで学習コストが低い。BSD-3-Clause license https://github.com/tijsverkoyen/CssToInlineStyles | クラス属性は **保持** | `$converter->setCleanup(true)` を呼ぶと **id と class を丸ごと削除**。`false`（既定）ならそのまま保持。 |

