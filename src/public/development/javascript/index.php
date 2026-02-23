<?php

require_once dirname(dirname(dirname(__DIR__))) . '/bootstrap.php';

(new App\Controllers\DevelopmentController)->javascript();
