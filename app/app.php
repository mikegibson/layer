<?php

/**
 * Require the Composer autoloader
 */
require_once __DIR__ . '/../vendor/autoload.php';

/**
 * Instantiate the Application object
 */
$app = new \Layer\Application();

/**
 * Load config files
 */
$app['config']->load([
	'app' => [
		'nest' => false
	],
	'database',
	'routes',
	'local' => [
		'nest' => false,
		'ignoreMissing' => true
	]
]);

/**
 * Turn on some debugging features if in debug mode
 */
if ($app->config('debug')) {

	error_reporting(-1);

	\Symfony\Component\Debug\ErrorHandler::register();

	if ('cli' !== php_sapi_name()) {
		\Symfony\Component\Debug\ExceptionHandler::register();
		// CLI - display errors only if they're not already logged to STDERR
	} elseif (!ini_get('log_errors') || ini_get('error_log')) {
		ini_set('display_errors', 1);
	}

	$app->error(function (\Exception $e) {
		return new \Symfony\Component\HttpFoundation\Response(
			nl2br($e->getMessage() . PHP_EOL . $e->getTraceAsString())
		);
	});

}

/**
 * Load all required plugins
 */
$app['plugins']->load([
	'Layer\Admin',
	'App\Plugin\Pages'
]);

/**
 * Return the prepared Application object
 */
return $app;
