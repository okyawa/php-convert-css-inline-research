<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use Pelago\Emogrifier\CssInliner;

// HTMLをファイルから読み込む
$html = file_get_contents(__DIR__ . '/sample.html');

// sample.cssを読み込む
$css = file_get_contents(__DIR__ . '/sample.css');

// sample-additional.cssを読み込む
$additionalCss = file_get_contents(__DIR__ . '/sample-additional.css');

// CSSをインライン化（CSSを明示的に渡す）
$inlinedHtml = CssInliner::fromHtml($html)->inlineCss($css)->render();

// sample-additional.cssの内容を<head>末尾に<style>で追加
$inlinedHtml = preg_replace_callback(
    '/(<style[^>]*>.*?<\/style>)(\s*)(<\/head>)/is',
    function ($matches) use ($additionalCss) {
        return $matches[1] . "\n<style>\n" . rtrim($additionalCss) . "\n</style>\n" . $matches[3];
    },
    $inlinedHtml
);

// 結果をファイルに保存
$outputDir = __DIR__ . '/results';
if (!is_dir($outputDir)) {
    mkdir($outputDir, 0755, true);
}
file_put_contents($outputDir . '/pelago-emogrifier.html', $inlinedHtml);

echo "PelagoEmogrifier: 変換が完了しました。 results/pelago-emogrifier.html を確認してください。\n";
