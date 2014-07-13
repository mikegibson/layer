<?php

$app['debug'] = true;

$app['dbs.options'] = [
	'default' => [
		'driver' => 'pdo_mysql',
		'host' => 'localhost',
		'dbname' => 'sentient',
		'user' => 'root',
		'password' => '',
		'charset' => 'utf8'
	]
];

$app['salt'] = 'CHANGE_ME_fg3d38fyst98y8943ut8945';

$app->register(new \Silex\Provider\WebProfilerServiceProvider(), [
	'profiler.cache_dir' => $app['paths.cache'] . '/profiler',
	'profiler.mount_prefix' => '/_profiler'
]);