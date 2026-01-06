<?php

use App\Services\Frontend\Vite;
?>
<!doctype html>
<html>

<head>
    <?= Vite::init() ?>
    <link rel="stylesheet" href="<?= Vite::asset('resources/css/app.css') ?>">
    <script type="module" src="<?= Vite::asset('resources/js/app.ts') ?>"></script>
</head>

<body class="p-8">
    <h1 class="text-3xl font-bold text-blue-600">
        Vite + Tailwind v3 OK
    </h1>
    <div class="space-y-2">
        <div id="react" class="border-2"></div>
        <div id="vue" class="border-2"></div>
    </div>
</body>

</html>