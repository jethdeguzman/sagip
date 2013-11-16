<?php
use Carbon\Carbon;

class PostController extends \BaseController {
	
	public function getName(){
		$name = Input::get('name');
		$sample = new Sample;
		$sample->name = $name;
		$sample->save();
		return "success";
	}
	public function getSavesample(){
		// DB::table('sample')->insert(array('name'=>"jeth"));
		$sample = new Sample;
		$sample->name = "jimbo";
		$sample->save();
		return "inserted";
		
	}
	public function getUpdatename(){
		$id = Request::segment(3);
		$name = Request::segment(4);
		
		// // $id = Input::get('id');
		// // $name = Input::get('name');
		// $array = '{"id" : "1","name" : "jeth"}';
		// $data = json_decode(Input::get('data'),true);
		

		DB::table('sample')
		  	->where('id', $id)
		  	->update(array('name'=>$name));
		// $json = array('message' => "success" );
		// return json_encode($json);

	}

	public function postSignup(){
		$username = Input::get('username');
		$password = Input::get('password');
		$password = md5($password);
		$email = Input::get('email');

		DB::table('users')->insertGetId(array('username' => $username, 'password' => $password, 'email' => $email));
		$id = DB::getPdo()->lastInsertId();
		DB::table('profile')->insertGetId(array('profilepic'=>'images/users/default.png', 'usersid'=>$id));
		// $profile = new Profile;
		// $profile->usersid = $id;
		// $profile->profilepic = "images/default.png";
		// $profile->save();
		}

	public function postProfile(){
	
		
		DB::table('profile')->where('usersid',Session::get('userid'))->update(array('firstname'=>Input::get('firstname'), 'lastname'=>Input::get('lastname'), 'age'=>Input::get('age'), 'address'=>Input::get('address'),'work'=>Input::get('work'),'website'=>Input::get('website'), 'contact'=>Input::get('contact')));
	}
	
	public function postProfilepic(){
		$file = Input::file('photoimg');
		$destinationPath = 'images/users/';
		$extension =$file->getClientOriginalExtension(); 
		$filename = Session::get('username').".png";
		
		$pic = $destinationPath.$filename;
		$upload_success = $file->move($destinationPath, $filename);
		if( $upload_success ) {
			 DB::table('profile')->where('usersid',Session::get('userid'))->update(array('profilepic'=>$pic));
		  	return "<img src='".$pic."'  class='preview'>";
		} else {
		   return Response::json('error', 400);
		}
	}

		public function postCampaign(){
		date_default_timezone_set('Asia/Manila');
		$carbon = new Carbon;
		$datecreated = $carbon->toDateString();
		
		$usersid = Session::get('userid');
		if (Input::file('campaignpic')==null){
			$campaignpic = "images/campaigns/default.gif";
			
		}else{

			$file = Input::file('campaignpic');

			$destinationPath = 'images/campaigns/';
			$extension =$file->getClientOriginalExtension(); 
			$filename = "campaign-".str_random(8).".".$extension;

			$campaignpic  = $destinationPath.$filename;
			
			$upload_success = $file->move($destinationPath, $filename);
			

		}
	DB::table('campaign')->insertGetId(array('type'=>Input::get('type'), 'targetamount' => Input::get('targetamount'), 'specificdate' => Input::get('specificdate'), 'name' => Input::get('name'), 'description' => Input::get('description'), 'image' => $campaignpic, 'location' => Input::get('location'), 'contact' => Input::get('contact'), 'bankname1' => Input::get('bankname1'), 'bankaccount1' => Input::get('bankaccount1'), 'bankname2' => Input::get('bankname2'), 'bankaccount2' => Input::get('bankaccount2'),'bankname3' => Input::get('bankname3'), 'bankaccount3' => Input::get('bankaccount3'),'datecreated' => $datecreated, 'usersid' => $usersid));


		$activityname = "Created a campaign: ".Input::get('name');
		DB::table('activity')->insertGetId(array('name'=>$activityname, 'usersid'=>$usersid, 'date'=>$datecreated));
	}
	public function postDonate(){
		date_default_timezone_set('Asia/Manila');
		$carbon = new Carbon;
		$datedonated = $carbon->toDateString();
		$usersid = Session::get('userid');
		$donation = new Donations;
		$donation->amountdonated = Input::get('amountdonated');
		$donation->datedonated =  $datedonated;
		$donation->usersid = $usersid;
		$donation->campaignid = Input::get('campaignid');
		$donation->bankname = Input::get('bankname'); 
		$donation->bankaccount = Input::get('bankaccount');
		$donation->userbankname = Input::get('userbankname'); 
		$donation->save();
		
		$result = DB::table('campaign')
					->select('campaign.name')
					->where('campaign.id',Input::get('campaignid'))
					->get();
		
		foreach ($result as $row) {
			$name = $row->name;			
		}

		$activityname = "Donated P".Input::get('amountdonated').' to campaign: '.$name;

		DB::table('activity')->insertGetId(array('name'=>$activityname, 'usersid'=>$usersid, 'date'=>$datedonated));
	}

	
	public function getCust(){
		$cust = new Customers;
		$cust->name = "jethro";
		$cust->save();
		return "added a record";

	}

	public function getPage(){
		$users = DB::table('customer')->paginate(5);
		return View::make('page')->with('users',$users);
	}

}

