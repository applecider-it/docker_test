<?php

require_once dirname(dirname(__DIR__)) . '/bootstrap.php';

(new App\Controllers\DevelopmentController)->index();
