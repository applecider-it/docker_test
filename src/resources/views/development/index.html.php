<?php

use function App\Helpers\render;
?>
<?php render('layouts.header'); ?>

<h2 class="app-h2">development.index</h2>

<p><a href="/development/database/" class="app-link-normal">database</a></p>
<p><a href="/development/javascript/" class="app-link-normal">javascript</a></p>

<?php render('layouts.footer'); ?>