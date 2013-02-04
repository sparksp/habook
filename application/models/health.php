<?php

class Health extends Eloquent {
	public static $table = 'health';

	public function __construct($attributes = array(), $exists = false)
	{
		$this->hash = Str::random(8);

		parent::__construct($attributes, $exists);
	}

}