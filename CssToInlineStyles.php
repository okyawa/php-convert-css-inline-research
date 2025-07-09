<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use TijsVerkoyen\CssToInlineStyles\CssToInlineStyles;

// HTMLをファイルから読み込む
$html = file_get_contents(__DIR__ . '/sample.html');

// CssToInlineStylesのインスタンスを作成
$cssToInlineStyles = new CssToInlineStyles();

// CSSをインライン化
$inlinedHtml = $cssToInlineStyles->convert($html);

// 結果をファイルに保存
$outputDir = __DIR__ . '/results';
if (!is_dir($outputDir)) {
    mkdir($outputDir, 0755, true);
}
file_put_contents($outputDir . '/css-to-inline-styles.html', $inlinedHtml);

echo "CssToInlineStyles: 変換が完了しました。 results/css-to-inline-styles.html を確認してください。\n";
