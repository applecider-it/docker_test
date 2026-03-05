<?php

use function App\Helpers\env;

$env = env('APP_ENV');

return [
    'database' => [
        'host' => 'mysql',
        'database' => 'app',
        'username' => 'app',
        'password' => 'secret',
    ],
    'vite' => [
        'port' => '4173',
        'dev' => $env === 'local',
    ],
];
