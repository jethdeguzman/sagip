<?php

class ProfileController extends \BaseController {
	protected $layout = "landing.default";
	public function getIndex($usernameurl){

		//$username = Request::segment(1);
	
		$users = new Users;
		$result = $users->checkUser($usernameurl);
		$this->layout->title="Welcome to Sagip.ph";
		
		$campaign = new Campaign;
		$image = $campaign->getCampaignImage();

		$users = new Users;
		$member = $users->getRecentUsers();
		
		$this->layout->foot = View::make("landing.foot")->with(array('data'=>$image, 'data2'=>$member));
		
		
		if ($result){
			$useridurl = $result->id;
			
			$activity = new Activity;
			$recent = $activity->getRecent($useridurl);	
			if (!$recent){
				$recent = false;
			}

			if (Session::has('userid')){
				$username = Session::get('username');
				$logstatus = true;
				$userid = Session::get('userid');
				$profile = new Profile;
				$firstname = "";
				$lastname = "";
				$age = "";
				$address = "";
				$work= "";
				$website = "";
				$contact = ""; 
				$pic = "images/users/default.png";

				$result = $profile->getProfile($userid);
				
				if ($result){
					
					$firstname = $result->firstname;
					$lastname = $result->lastname;
					$age = $result->age;
					if ($age == 0){
						$age = "";
					}
					$address = $result->address;
					$work= $result->work;
					$website = $result->website;
					$contact = $result->contact; 
					$pic = $result->profilepic;

				}

				

					$data  = array('username' => $username, 'logstatus' => $logstatus,'firstname'=>$firstname,'lastname'=>$lastname,'age'=>$age,'address'=>$address,'work'=>$work,'website'=>$website,'contact'=>$contact,'profilepic' => $pic, 'recent'=>$recent);
				$this->layout->head = View::make("landing.head")->with($data);
				$this->layout->body = View::make("landing.bodyprofile")->with($data);
				
				if(Session::get('username') <> $usernameurl){
					$username = $usernameurl;
					$logstatus = false;
					$profile = new Profile;
					$firstname = "";
					$lastname = "";
					$age = "";
					$address= "";
					$work= "";
					$website = "";
					$contact = ""; 
					$pic = "images/users/default.png";

					$result = $profile->getProfile($useridurl);
					
					if ($result){
						
						$firstname = $result->firstname;
						$lastname = $result->lastname;
						$age = $result->age;
						if ($age == 0){
							$age = "";
						}
						$address = $result->address;
						$work= $result->work;
						$website = $result->website;
						$contact = $result->contact; 
						$pic = $result->profilepic;

					}
						$data  = array('username' => $username, 'logstatus' => $logstatus,'firstname'=>$firstname,'lastname'=>$lastname,'age'=>$age,'address'=>$address,'work'=>$work,'website'=>$website,'contact'=>$contact,'profilepic' => $pic, 'recent'=>$recent);
					$this->layout->body = View::make("landing.bodyprofile")->with($data);

				}else{
					
				}
				
				//return View::make('home')->with($data);
			}else{
				
				$logstatus = false;
				$profile = new Profile;
				$result = $profile->getProfile($useridurl);

				if ($result){
				
					$firstname = $result->firstname;
					$lastname = $result->lastname;
					$age = $result->age;
					if ($age == 0){
						$age = "";
					}
					$address = $result->address;
					$work= $result->work;
					$website = $result->website;
					$contact = $result->contact; 
					$pic = $result->profilepic;

				}
					$data  = array('username' => $usernameurl, 'logstatus' => $logstatus,'firstname'=>$firstname,'lastname'=>$lastname,'age'=>$age,'address'=>$address,'work'=>$work,'website'=>$website,'contact'=>$contact,'profilepic' => $pic, 'recent'=>$recent);
				$this->layout->head = View::make("landing.head")->with($data);
				$this->layout->body = View::make("landing.bodyprofile")->with($data);
			}
		}else{
			return Redirect::to('/');
		}
	}



}