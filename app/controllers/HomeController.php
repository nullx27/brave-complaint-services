<?php

class HomeController extends BaseController {

	public function homeView(){
		$this->layout = static::$_layout;
		$view = $this->_defaultView()->nest('content', 'home');;

		return $view;
	}

	public function errorView(){
		$this->layout = static::$_layout;

		$view = $this->_defaultView()->nest('content', 'error');

		return $view;
	}

}
