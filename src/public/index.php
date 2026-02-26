<?php

require dirname(__DIR__) . '/app/Services/Development/Benchmark.php';
$benchmark = new App\Services\Development\Benchmark;

require dirname(__DIR__) . '/vendor/autoload.php';

require dirname(__DIR__) . '/bootstrap/app.php';

(new App\Core\Web)->exec();

$benchmark->closeBenchmark();
