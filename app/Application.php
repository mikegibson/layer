<?php

namespace App;

use Layer\Blog\BlogPlugin;
use Layer\Pages\PagesPlugin;

class Application extends \Layer\Application {

	/**
	 * Register any plugins and service providers required for the app
	 */
	protected function registerServiceProviders() {

		parent::registerServiceProviders();

		$this
			->register(new PagesPlugin())
			->register(new BlogPlugin())
		;

	}

	/**
	 * Initialize the app
	 * Set any custom properties and initialize any services or resources here
	 * This method is called just before all services are booted
	 */
	protected function initialize() {

		$app = $this;

		/**
		 * Set the app name
		 */
		$app['name'] = 'Layer Skeleton App';

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