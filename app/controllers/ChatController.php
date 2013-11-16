<?php

class ChatController extends \BaseController {

	public function getIndex(){
		$chat = new Chat;
		$result = $chat->getChat(Session::get('username'));
		return json_encode($result);
	}

	public function getChatbody(){
		// $username = Input::get('username');
		// $username = "jethdeguzman";
		return View::make("landing.bodychat");
		//return 

	}

	 public function getSpecific(){
	 	$username = Input::get('username');
	 	$chat = new Chat;
	 	$result = $chat->getChat($username);
	 	return json_encode($result);
	 }

	

}