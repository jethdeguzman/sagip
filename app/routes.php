<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::controller('sample', 'SampleController');
Route::get('/flush',function(){
	$userid = Session::get('userid');
	DB::table('users')
		->where('id','=',$userid)
		->update(array('online' => 0));
	 Session::flush();
	 return Redirect::to('/');
});
Route::controller('aboutus', 'AboutusController');
Route::controller('admin', 'AdminController');
Route::controller('chat', 'ChatController');
Route::controller('save', 'PostController');
Route::controller('system', 'SystemController');
Route::controller('campaign', 'CampaignController');
Route::controller('contributor', 'ContributorController');
// Route::filter('/{username}', function($username)
// {
//   if (isset($username)){
//   	$user = new Users;
//   	$result = $user->checkUser($username);
//   	if ($result){
  
//   		Redirect::to('/{username}');
//   		//return $result;
//   	}else{
//   		return "No User";
//   	}
	  
//   }
//   else{
//      Redirect::to('/');
//   }
// });
Route::controller('/{username}', 'ProfileController');
Route::controller('/', 'HomeController');



// Route::get('/', function()
// {
// 	return View::make('hello');
// });

