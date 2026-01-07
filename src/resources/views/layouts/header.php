<?php

use App\Services\Frontend\Vite;
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">

    <?= Vite::init() ?>
    <link rel="stylesheet" href="<?= Vite::asset('resources/css/app.css') ?>">
    <script type="module" src="<?= Vite::asset('resources/js/app.ts') ?>"></script>
</head>

<body class="p-8">