<?php

namespace App;

use Layer\Blog\BlogPlugin;
use Layer\Pages\PagesPlugin;

class Application extends \Layer\Application {

	public function __construct() {

		parent::__construct();

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

	}

	protected function initializeAssets() {

		parent::initializeAssets();

		$this['assets.register_scss']('app', ['scss/app.scss', '@cms/scss/header.scss']);

	}

}