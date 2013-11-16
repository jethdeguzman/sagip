<?php

class SampleController extends \BaseController {

	protected $layout = "sample.default";

	function getIndex(){
		$this->layout->head = View::make('sample.head');
		$this->layout->body = View::make('sample.body');
		$this->layout->foot = View::make('sample.foot');
		// // $name = Request::segment('3');
		// // return $name;
		// // return $this->$name;
		// $sample = new Sample;
		// $result = $sample->getName();
		// return View::make('sample')->with(array('names'=>$result));
	}
	function getText(){
		$name = Request::segment('3');
		return $name;
	}

}