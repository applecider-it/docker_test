<?php

use App\Services\Frontend\Vite;
?>
<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">

    <?= Vite::init() ?>
    <link rel="stylesheet" href="<?= Vite::asset('resources/css/app.css') ?>">
    <script type="module" src="<?= Vite::asset('resources/js/app.ts') ?>"></script>
</head>

<body>
    <h1 class="text-3xl font-bold text-gray-100 p-4 bg-slate-400">
        Vite + Tailwind v3 OK
    </h1>

    <div class="p-8">