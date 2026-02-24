<?php

use App\Services\Javascript\ViteService;
use function App\Helpers\render;
?>

<?php render('layouts.header'); ?>

<script type="module" src="<?= ViteService::asset('resources/js/entrypoints/javascript-test.ts') ?>"></script>

<h2 class="app-h2">development.javascript</h2>

<div class="space-y-2">
    <div id="react" class="border-2"></div>
    <div id="vue" class="border-2"></div>
</div>

<?php render('layouts.footer'); ?>