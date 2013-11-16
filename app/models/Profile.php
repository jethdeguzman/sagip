<?php

class Profile extends Eloquent{

	public $timestamps = false;
	public function getProfile($userid){
		 $result = DB::table('profile')
		 			 ->where('usersid','=',$userid)
		 			 ->first();
		 return $result;
	}


}
?>