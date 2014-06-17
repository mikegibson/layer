<?php

namespace App;

use Layer\Blog\BlogPlugin;
use Layer\Cms\CmsPlugin;
use Layer\Pages\PagesPlugin;
use Layer\Users\UsersPlugin;

class Application extends \Layer\Application {

	public function __construct() {

		parent::__construct();

		$app = $this;

		/**
		 * Set the app name
		 */
		$app['name'] = 'My App';

		/**
		 * Register plugins
		 */
		$app
			->register(new CmsPlugin())
			->register(new PagesPlugin())
			->register(new BlogPlugin())
			->register(new UsersPlugin());

		/**
		 * Create assets
		 */
		$app[$app->assets['css_app'] = 'assets.css_app'] = $app->share(function() use($app) {
			return $app['assetic.factory']->createAsset([
				'scss/app.scss',
				'@cms/scss/cms_header.scss'
			], [
				'compass',
				'?uglifycss'
			], [
				'output' => 'css/app.css'
			]);
		});

	}

}