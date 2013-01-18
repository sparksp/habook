<?php

class Home_Controller extends Base_Controller {

	public $restful = true;

	public function get_index()
	{
		$this->layout->content = View::make('home.index');
	}

}
