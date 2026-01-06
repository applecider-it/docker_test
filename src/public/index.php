<?php
function vite_asset(string $entry): string
{
    static $manifest = null;

    if ($manifest === null) {
        $path = __DIR__ . '/assets/.vite/manifest.json';
        $manifest = json_decode(file_get_contents($path), true);
    }

    return '/assets/' . $manifest[$entry]['file'];
}
?>
<!doctype html>
<html>

<head>
    <?php if (getenv('APP_ENV') === 'local'): ?>
        <script type="module" src="http://localhost:5173/@vite/client"></script>
        <link rel="stylesheet" href="http://localhost:5173/resources/app.css">
        <script type="module" src="http://localhost:5173/resources/app.ts"></script>
    <?php else: ?>
        <link rel="stylesheet" href="<?= vite_asset('resources/app.css') ?>">
        <script type="module" src="<?= vite_asset('resources/app.ts') ?>"></script>
    <?php endif; ?>
</head>

<body class="p-8">
    <h1 class="text-3xl font-bold text-blue-600">
        Vite + Tailwind v3 OK
    </h1>
</body>

</html>