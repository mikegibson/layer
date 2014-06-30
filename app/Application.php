<?php

namespace App;

use Sentient\Blog\BlogPlugin;
use Sentient\Pages\PagesPlugin;

class Application extends \Sentient\Application {

	/**
	 * Register any additional plugins and service providers required for the app here
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
		$app['name'] = 'Sentient';

		/**
		 * Register CSS assets
		 */
		$app['assets.register_scss']('app', ['scss/app.scss']);

		/**
		 * Register javascript assets
		 */
		// $app['assets.register_js']('app', ['js/app.js']);

	}

	/**
	 * Connect routes and mount controllers for the app here
	 */
	protected function connectRoutes() {

		$app = $this;

		/**
		 * Mount the base app controller
		 */
		$app->mount('/', $app['app.controllers']);

	}

}