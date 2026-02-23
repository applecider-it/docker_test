<?php

use App\Services\Javascript\ViteService;
?>
<?php (fn() => include(APP_VIEW . '/layouts/header.html.php'))(); ?>

<script type="module" src="<?= ViteService::asset('resources/js/entrypoints/javascript-test.ts') ?>"></script>

<h2 class="app-h2">development.javascript</h2>

<div class="space-y-2">
    <div id="react" class="border-2"></div>
    <div id="vue" class="border-2"></div>
</div>

<?php (fn() => include(APP_VIEW . '/layouts/footer.html.php'))(); ?>