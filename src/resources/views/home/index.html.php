<?php

use App\Services\Javascript\Vite;
?>
<?php (fn() => include(APP_VIEW . '/layouts/header.html.php'))(); ?>

<script type="module" src="<?= Vite::asset('resources/js/entrypoints/home.ts') ?>"></script>

<h2 class="app-h2">Home</h2>

<div class="space-y-2">
    <div id="react" class="border-2"></div>
    <div id="vue" class="border-2"></div>
</div>
<div>
    <h3 class="app-h3">Eloquent</h3>
    <pre><?php
            foreach ($data['users'] as $user) {
                echo $user->id . ' - ' . $user->name . PHP_EOL;
            }
            ?></pre>

    <h3 class="app-h3">Pdo</h3>
    <pre><?php
            foreach ($data['usersP'] as $user) {
                echo $user['id'] . ' - ' . $user['name'] . PHP_EOL;
            }
            ?></pre>

    <h3 class="app-h3">Doctrine</h3>
    <pre><?php
            foreach ($data['usersD'] as $user) {
                echo $user->getId() . ' - ' . $user->getName() . PHP_EOL;
            }
            ?></pre>

    <h3 class="app-h3">Laminas</h3>
    <pre><?php
            foreach ($data['usersL'] as $user) {
                echo $user['id'] . ' - ' . $user['name'] . PHP_EOL;
            }
            ?></pre>
</div>

</div>

<?php (fn() => include(APP_VIEW . '/layouts/footer.html.php'))(); ?>