<?php

// 開始時
$startTime = microtime(true);
$startMemory = memory_get_usage();

require dirname(__DIR__) . '/vendor/autoload.php';

require dirname(__DIR__) . '/bootstrap/app.php';

(new App\Core\Routing)->exec();

// 終了時
$endTime = microtime(true);
$endMemory = memory_get_usage();

$executionTime = $endTime - $startTime;
$memoryUsed = ($endMemory - $startMemory) / 1024 / 1024; // MB単位

$opcacheStatus = opcache_get_status();

$trace = [
    '処理時間（秒）' => $executionTime,
    'メモリ使用量（MB）' => $memoryUsed,
    'メモリ使用量（MB）開始時' => $startMemory / 1024 / 1024,
    'メモリ使用量（MB）終了時' => $endMemory / 1024 / 1024,
    'opcache使用量（MB）'=> $opcacheStatus['memory_usage']['used_memory'] / 1024 / 1024,
    'opcache.scripts.count' => count($opcacheStatus['scripts']),
    'opcache_get_status()' => $opcacheStatus,
];


$out = '
    <div style="font-size: 0.7rem;">
        <div>--------------- performance trace begin ---------------</div>
            <div>performance:</div>
            <pre>' . json_encode($trace, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . '</pre>
        <div>--------------- performance trace end ---------------</div>
    </div>
';

echo $out;
