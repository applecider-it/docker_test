<?php

use function App\Helpers\render;
?>
<?php render('layouts.header'); ?>

<h2 class="app-h2">development.database</h2>

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

<?php render('layouts.footer'); ?>