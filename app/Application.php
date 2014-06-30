<?php

namespace App;

use Layer\Blog\BlogPlugin;
use Layer\Pages\PagesPlugin;

class Application extends \Layer\Application {

	/**
	 * Initialize the app
	 * Any custom services and configuration for the app should be initialized here
	 */
	protected function initialize() {

		$app = $this;

		/**
		 * Set the app name
		 */
		$app['name'] = 'Layer Skeleton App';

		/**
		 * Register plugins and service providers
		 */
		$app
			->register(new PagesPlugin())
			->register(new BlogPlugin())
		;

		/**
		 * Register CSS assets
		 */
		$app['assets.register_scss']('app', ['scss/app.scss']);

		/**
		 * Register javascript assets
		 */
		// $app['assets.register_js']('app', ['js/app.js']);

	}

}