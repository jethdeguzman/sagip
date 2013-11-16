<?php

class Sample extends Eloquent{

	public $timestamps = false;
	public $table = 'sample';

	public function getName(){
		$result = DB::table('sample')
					
					->get();
		return $result;

	}
}

