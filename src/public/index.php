<?php

require dirname(__DIR__) . '/app/Services/Development/BenchmarkService.php';
$benchmarkService = new App\Services\Development\BenchmarkService;

require dirname(__DIR__) . '/vendor/autoload.php';

require dirname(__DIR__) . '/bootstrap/app.php';

(new App\Core\Web)->exec();

$benchmarkService->closeBenchmark();
