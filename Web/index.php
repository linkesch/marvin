<?php

// Require Composer's autoload function
require_once __DIR__ .'/../vendor/autoload.php';

// Require Marvin
$app = require_once __DIR__ .'/../vendor/marvin/core/bootstrap.php';

// Run the application
$app->run();
