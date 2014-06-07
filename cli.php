#!/usr/bin/php -q
<?php

set_time_limit(0);

require_once __DIR__ . '/vendor/autoload.php';

$app = new \App\Application();

$app['console']->run();
