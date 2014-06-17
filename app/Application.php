<?php

namespace App;

use Layer\Blog\BlogPlugin;
use Layer\Cms\CmsPlugin;
use Layer\Pages\PagesPlugin;
use Layer\Users\UsersPlugin;

class Application extends \Layer\Application {

	public function __construct() {

		parent::__construct();

		/**
		 * Set the app name
		 */
		$this['name'] = 'My App';

		/**
		 * Register plugins
		 */
		$this
			->register(new CmsPlugin())
			->register(new PagesPlugin())
			->register(new BlogPlugin())
			->register(new UsersPlugin());

	}

}