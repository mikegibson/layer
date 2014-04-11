#!/usr/bin/php -q
<?php

set_time_limit(0);

/**
 * Get the console app object
 */
$app = include __DIR__ . '/app.php';
$console = $app['console'];

/**
 * Add commands
 */
$console->add(new \Layer\Console\Command\SchemaCommand());

/**
 * Run the console
 */
$console->run();
