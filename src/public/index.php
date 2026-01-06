<!doctype html>
<html>
<head>
  <?php if (getenv('APP_ENV') === 'local'): ?>
    <script type="module" src="http://localhost:5173/@vite/client"></script>
    <link rel="stylesheet" href="http://localhost:5173/src/resources/app.css">
    <script type="module" src="http://localhost:5173/src/resources/app.js"></script>
  <?php else: ?>
    <link rel="stylesheet" href="/assets/app.css">
  <?php endif; ?>
</head>
<body class="p-8">
  <h1 class="text-3xl font-bold text-blue-600">
    Vite + Tailwind v3 OK
  </h1>
</body>
</html>
