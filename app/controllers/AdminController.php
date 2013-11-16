<?php

class AdminController extends \BaseController {
	protected $layout = "landing.default";
	public function getIndex(){
		$users = new Users;
		$result = $users->getAllUsers();
		$this->layout->title = "Admin Sagip.ph";
		$this->layout->head = View::make('landing.headadmin');
		$this->layout->foot = View::make('landing.footadmin');	
		$this->layout->body = View::make('landing.bodyadmin')->with(array("data" => $result));
	}


	public function getOnline(){
		$users = new Users;
		return json_encode($users->getOnline());
	}

}