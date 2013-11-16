<?php

class ContributorController extends \BaseController {
	protected $layout= "landing.default";

	public function getIndex(){
		
		$campaign = new Campaign;
		$image = $campaign->getCampaignImage();

		$users = new Users;
		$member = $users->getRecentUsers();

		$this->layout->foot = View::make("landing.foot")->with(array('data'=>$image, 'data2'=>$member));
		$this->layout->title="Welcome to Sagip.ph";
		if (Session::has('userid')){
			$username = Session::get('username');
			$logstatus = true;
			$userid = Session::get('userid');
			$profile = new Profile;
			$pic = "#";
			$result = $profile->getProfile($userid);
			
			if ($result){
				
				$pic = $result->profilepic;
			}
			
			$data  = array('username' => $username, 'logstatus' => $logstatus, 'profilepic' => $pic);
			$campaign = new Campaign;
			$data2 = $campaign->getCampaignHome();
			
			$this->layout->head = View::make("landing.head")->with($data);
			$this->layout->body = View::make("landing.bodycontributordash")->with($data);
		}else{
			$logstatus = false;
			$data = array('logstatus' => $logstatus);
			$campaign = new Campaign;
			$data2 = $campaign->getCampaignHome();
			
			
			$this->layout->head = View::make("landing.head")->with($data);
			$this->layout->body = View::make("landing.bodycontributordash")->with($data);
		}
	}
	public function getSort(){
		$sort = Request::segment(3);
		if (Input::get('contname')){
			$contname = Input::get('contname');
		}
		$donation = new Donations;
		switch ($sort) {
			case 'top':
				$result = $donation->getTopContributorsAll();
				$totalpages = $result->getLastPage();
				break;
			case 'byname':
				$result = $donation->getContributorsByname($contname);
				$totalpages = $result->getLastPage();
				break;
			default:
				# code...
				break;
		}
		return View::make('landing.bodycontributor')->with(array('data'=>$result, 'totalpages'=>$totalpages));
	}

	public function getTitle(){
		$donation = new Donations;
		$result = $donation->getContributorsName();
		$result = json_encode($result);
		return $result;
	}

}