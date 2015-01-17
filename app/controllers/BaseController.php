<?php

class BaseController extends Controller {

	static protected $_layout = 'layout.default';

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	protected function _defaultView(){
		$this->layout = static::$_layout;

		return View::make(static::$_layout)
			->nest('navigation', 'parts/navigation')
			->nest('footer', 'parts/footer');
	}

}
