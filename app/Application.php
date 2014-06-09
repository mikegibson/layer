<?php

namespace App;

class Application extends \Layer\Application {

	public function __construct() {

		parent::__construct();

		/**
		 * Set the app name
		 */
		$this['name'] = 'My App';

		/**
		 * Load all required plugins
		 */
		$this['plugins']->load([
			'Layer\Cms',
			'Layer\Pages',
			'Layer\Users'
		]);

	}

}