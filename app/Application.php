<?php

namespace App;

use Layer\Blog\BlogPlugin;
use Layer\Pages\PagesPlugin;

class Application extends \Layer\Application {

	protected function initialize() {

		$app = $this;

		/**
		 * Set the app name
		 */
		$app['name'] = 'Layer Skeleton App';

		/**
		 * Register plugins
		 */
		$app
			->register(new PagesPlugin())
			->register(new BlogPlugin())
		;

		$app['assets.register_scss']('app', ['scss/app.scss']);

	}

}