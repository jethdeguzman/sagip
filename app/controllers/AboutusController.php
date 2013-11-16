<?php

class AboutusController extends \BaseController {
	protected $layout = "landing.default";
	public function getIndex(){
	//	Session::put('userid','001');
	//	Session::put('username','jehdeguzman');

		$this->layout->title="Welcome to Sagip.ph";
		// $campaign = new Campaign;
		// $result = $campaign->getImage();
		$campaign = new Campaign;
		$image = $campaign->getCampaignImage();

		$users = new Users;
		$member = $users->getRecentUsers();

		$this->layout->foot = View::make("landing.foot")->with(array('data'=>$image, 'data2'=>$member));
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
			
			
			$this->layout->head = View::make("landing.head")->with($data);
			$this->layout->body = View::make("landing.bodyaboutus")->with(array('logstatus'=>$logstatus));
			//return View::make('home')->with($data);
		}else{
			
			$logstatus = false;
			$data = array('logstatus' => $logstatus);
			$campaign = new Campaign;
			$data2 = $campaign->getCampaignHome();
			$donation = new Donations;
			$data3 = $donation->getTopContributorsHome();
			
			$this->layout->head = View::make("landing.head")->with($data);
			$this->layout->body = View::make("landing.bodyaboutus")->with(array('logstatus' => $logstatus));
		}

	

}
}