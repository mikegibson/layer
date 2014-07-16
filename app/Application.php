<?php

namespace App;

use Sentient\Application as Sentient;
use Sentient\Blog\BlogPlugin;
use Sentient\Node\ControllerNodeListNode;
use Sentient\Node\ListNode;
use Sentient\Pages\PagesPlugin;

class Application extends Sentient {

	public function __construct() {

		parent::__construct();

		$app = $this;

		/**
		 * Set the app name
		 */
		$app['name'] = 'Sentient';

		/**
		 * Register additional plugins and service providers
		 */
		$app
			->register(new PagesPlugin())
			->register(new BlogPlugin())
		;

		/**
		 * Create the home route
		 */
		$app->get('/', function() use($app) {
			return $app['twig.view']->render('view/home');
		})->bind('home');

		/**
		 * Mount controllers from plugins
		 */
		$app->mount('/', $app['pages.controllers']);
		$app->mount('/blog', $app['blog.controllers']);

		/**
		 * Register CSS assets
		 */
		$this['assets.register_scss']('app', ['scss/app.scss']);

		/**
		 * Register javascript assets
		 */
		// $this['assets.register_js']('app', ['js/app.js']);

		/**
		 * Create the navigation structure
		 */
		$app['navigation'] = $app->share(function() use($app) {
			$rootNode = new ListNode();
			$rootNode->registerChild(new ListNode($rootNode, 'home', 'Home', $app['url_generator']->generate('home')));
			$rootNode->adoptChildren(
				new ControllerNodeListNode($app['pages.root_node'], 'pages', $app['url_generator'])
			);
			$rootNode->addChild('blog', 'Blog', $app['url_generator']->generate('blog'));
			return $rootNode;
		});

	}

}