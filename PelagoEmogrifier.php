<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use Pelago\Emogrifier\CssInliner;

// HTMLをファイルから読み込む
$html = file_get_contents(__DIR__ . '/sample.html');

// sample.cssを読み込む
$css = file_get_contents(__DIR__ . '/sample.css');

// CSSをインライン化（CSSを明示的に渡す）
$inlinedHtml = CssInliner::fromHtml($html)->inlineCss($css)->render();

// 結果をファイルに保存
$outputDir = __DIR__ . '/results';
if (!is_dir($outputDir)) {
    mkdir($outputDir, 0755, true);
}
file_put_contents($outputDir . '/pelago-emogrifier.html', $inlinedHtml);

echo "PelagoEmogrifier: 変換が完了しました。 results/pelago-emogrifier.html を確認してください。\n";
