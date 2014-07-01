<?php

namespace App;

use Sentient\Action\SimpleAction;
use Sentient\Application as Sentient;
use Sentient\Blog\BlogPlugin;
use Sentient\Node\ControllerNode;
use Sentient\Pages\PagesPlugin;

class Application extends Sentient {

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

		/**
		 * Create an "about" action for displaying the About page
		 */
		$app['about_action'] = $app->share(function() {
			return new SimpleAction('about', 'About', 'view/about');
		});

		/**
		 * Add the about action to the home node
		 */
		$app['home_node'] = $app->share($app->extend('home_node', function(ControllerNode $homeNode) use($app) {
			$homeNode->wrapChildNode(new ControllerNode($app['about_action']));
			return $homeNode;
		}));

	}

}