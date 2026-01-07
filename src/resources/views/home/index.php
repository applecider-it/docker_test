<?php include(APP_ROOT . '/resources/views/layouts/header.php'); ?>

<h1 class="text-3xl font-bold text-blue-600">
    Vite + Tailwind v3 OK
</h1>
<div class="space-y-2">
    <div id="react" class="border-2"></div>
    <div id="vue" class="border-2"></div>
</div>
<div>
    <pre><?php print_r($users->toArray()); ?></pre>
    <pre><?php print_r($usersArray); ?></pre>
</div>

</div>

<?php include(APP_ROOT . '/resources/views/layouts/footer.php'); ?>