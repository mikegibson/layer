<?php

namespace App;

use Sentient\Action\SimpleAction;
use Sentient\Application as Sentient;
use Sentient\Blog\BlogPlugin;
use Sentient\Node\ControllerNode;
use Sentient\Pages\PagesPlugin;

class Application extends Sentient {

	public function __construct() {

		parent::__construct();

		$app = $this;

		/**
		 * Register additional plugins and service providers
		 */
		$app
			->register(new PagesPlugin())
			->register(new BlogPlugin())
		;

		/**
		 * Set the app name
		 */
		$app['name'] = 'Sentient';

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

	/**
	 * Initialize the app
	 * Set any custom properties and initialize any services or resources here
	 * This method is called just before all services are booted
	 */
	protected function initialize() {

		parent::initialize();

		/**
		 * Register CSS assets
		 */
		$this['assets.register_scss']('app', ['scss/app.scss']);

		/**
		 * Register javascript assets
		 */
		// $this['assets.register_js']('app', ['js/app.js']);

	}

}