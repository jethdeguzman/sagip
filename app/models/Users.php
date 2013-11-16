<?php



class Users extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	public $timestamps = false;

	public function authLogin($useremail, $password){
		// $result = DB::table('users')->where('password',$password)->where('username',$useremail)->get();
     
		$result = DB::table('users')
					->where('password','=',$password)
					->where(function($query)use($useremail){
							$query->where('username','=',$useremail)
								  ->orWhere('email','=',$useremail);
						})
					->first();
		
		return $result;
		
		
	}

	public function checkUser($username){
		$result = DB::table('users')
					->where('username',$username)
					->first();
		return $result;
	}

	public function getRecentUsers(){
		$result = DB::table('users')
					->leftjoin('profile','users.id','=','profile.usersid')
					->select('users.username','profile.profilepic')
					->orderby('users.id', 'desc')
					->take(3)
					->get();
		return $result;
	}
	public function getOnline(){
		$result = DB::table('users')
				->leftjoin('profile','users.id','=','profile.usersid')
				->where('online','=','1')
				->get();
		return $result;
	}
	public function getAllUsers(){
		$result = DB::table('users')
					->leftjoin('profile','users.id','=','profile.usersid')
					->select('users.id','users.username','profile.profilepic')
					->orderby('users.id', 'desc')
					->get();
		return $result;
	}


}



