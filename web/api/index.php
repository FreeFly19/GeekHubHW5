<?php

require __DIR__ . '/../../config/autoload.php';

use App\Application;

$app = new Application($dbConfig);

$app->run();
