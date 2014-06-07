<?php

namespace App;

class Application extends \Layer\Application {

	public function __construct() {

		parent::__construct();

		/**
		 * Load all required plugins
		 */
		$this['plugins']->load([
			'Layer\Cms',
			'Layer\Pages',
			//'Layer\Users'
		]);

		/**
		 * Mount controllers
		 */
		$this->mount('/', $this['pages.controllers']);
		$this->mount('/admin', $this['cms.controllers']);

	}

}