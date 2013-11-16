<?php

class CampaignController extends \BaseController {
	protected $layout= "landing.default";

	public function getReport(){
	/*	$campaignid = Request::segment(3);
		$datefrom = Request::segment(4);
		$dateto = Request::segment(5);
		$bankchosen = Request::segment(6);
*/
			$campaignid = Input::get('campaignid');
		$datefrom = Input::get('datefrom');
		$dateto = Input::get('dateto');
		$bankchosen = Input::get('bankchosen');
		$donate = new Donations;

		if ($bankchosen == "All"){
				$report = $donate->getAllReports($campaignid, $dateto, $datefrom);
		}else{
			
					$report = $donate->getReports($campaignid, $dateto, $datefrom, $bankchosen);
		}

		$stringreport="";
		$amount = "";
		if($report){
			foreach ($report as $data) {
			$amount += $data->amountdonated;
			$stringreport .= "<tr class='append-tr'><td><small class='font'><strong>".$data->datedonated."</strong></small></td><td><small class='font'><strong>".$data->username."</strong></small></td><td><small class='font'><strong>".$data->userbankname."</strong></small></td><td><small class='font'><strong>".$data->bankaccount."</strong></small></td><td><small class='font'><strong>".$data->amountdonated."</strong></small></td></tr>";
		}
		$stringreport .= "<tr class='append-tr'><td colspan='4' style='text-align:right;'><small class='font'><strong>Total Amount Donated:</small></strong></td><td><small class'font'><strong>P".number_format($amount).".00</strong></small></td></tr>";

		}
		else{
			$stringreport = '<tr class="append-tr"><td colspan="5">No result found.</td></tr>';
			// $stringreport = "null";
		}
		

		return $stringreport;
	}

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
			$this->layout->body = View::make("landing.bodycampaigndash")->with($data);
		}else{
			$logstatus = false;
			$data = array('logstatus' => $logstatus);
			$campaign = new Campaign;
			$data2 = $campaign->getCampaignHome();
			
			
			$this->layout->head = View::make("landing.head")->with($data);
			$this->layout->body = View::make("landing.bodycampaigndash")->with($data);
		}
	}
	public function getSort(){
		 
		$usernameurl = Request::segment(5);
		$sort = Request::segment(4);
		$type = Request::segment(3);
		if (Input::get('campname')){
			$campname = Input::get('campname');
		}
		
		$user = new Users;
		$result = $user->checkUser($usernameurl);
		if ($result){

			if ($usernameurl == Session::get('username')){
				$logstatus = true;
				$usersid = Session::get('userid');

				$campaign = new Campaign;
				
				if ($type == "created"){

					
					switch ($sort) {
						case 'recent':
							$result = $campaign->getCampaignCreatedRecent($usersid);
							$totalpages = $result->getLastPage();
							//dd($result);
							break;
						case 'popular':
							$result = $campaign->getCampaignCreatedPopular($usersid);
							$totalpages = $result->getLastPage();
							//dd($result);
							break;
						case 'soontoend' :
							$result = $campaign->getCampaignCreatedSoontoend($usersid);
							$totalpages = $result->getLastPage();
							break;
						case 'byname' :
							$result = $campaign->getCampaignCreatedByname($usersid, $campname);
							$totalpages = $result->getLastPage();
							break;
						default:
							# code...
							break;
					}
					
					return View::make('landing.bodycampaign')->with(array('data'=>$result, 'totalpages'=>$totalpages,'logstatus'=>$logstatus));
				}elseif ($type == "funded"){

					switch ($sort) {
						case 'recent':
							$result = $campaign->getCampaignFundedRecent($usersid);
							$totalpages = $result->getLastPage();
							break;
						case 'byname':
							$result = $campaign->getCampaignFundedByname($usersid, $campname);
							$totalpages = $result->getLastPage();
							break;
						case 'funded':
							$result = $campaign->getCampaignFundedFunded($usersid);

							$totalpages = $result->getLastPage();
							
							break;
						default:
							# code...
							break;
					}

					return View::make('landing.bodycampaign2')->with(array('data'=>$result, 'totalpages'=>$totalpages,'logstatus'=>$logstatus));

				}else{
					
				}
				
			}else{
				
				$user = new Users;
				$result = $user->checkUser($usernameurl);
				if ($result){
					if (Session::has('userid')){
						$logstatus = true;
					}else{
						$logstatus = false;
					}

					$usersid = $result->id;
					$campaign = new Campaign;
					
					if ($type == "created"){

						
						switch ($sort) {
							case 'recent':
								$result = $campaign->getCampaignCreatedRecent($usersid);
								$totalpages = $result->getLastPage();
								//dd($result);
								break;
							case 'popular':
								$result = $campaign->getCampaignCreatedPopular($usersid);
								$totalpages = $result->getLastPage();
								//dd($result);
								break;
							case 'soontoend' :
								$result = $campaign->getCampaignCreatedSoontoend($usersid);
								$totalpages = $result->getLastPage();
								break;
							case 'byname' :
								$result = $campaign->getCampaignCreatedByname($usersid, $campname);
								$totalpages = $result->getLastPage();
								break;
							default:
								# code...
								break;
						}
						
					
						return View::make('landing.bodycampaign')->with(array('data'=>$result, 'totalpages'=>$totalpages,'logstatus'=>$logstatus));
					}elseif ($type=="funded"){
						switch ($sort) {
							case 'recent':
								$result = $campaign->getCampaignFundedRecent($usersid);
								$totalpages = $result->getLastPage();
								break;
							case 'byname':
								$result = $campaign->getCampaignFundedByname($usersid, $campname);
								$totalpages = $result->getLastPage();
								break;
							case 'funded':
								$result = $campaign->getCampaignFundedFunded($usersid);

								$totalpages = $result->getLastPage();
								
								break;
							default:
								# code...
								break;
						}

						return View::make('landing.bodycampaign2')->with(array('data'=>$result, 'totalpages'=>$totalpages,'logstatus'=>$logstatus));

					}
					else{
						
					}
				}
			}
		}else{
			if(($usernameurl == "")&&($type == "all")){
				if (Session::has('userid')){
					$logstatus = true;
				}else{
					$logstatus = false;
				}

				$campaign = new Campaign;
					switch ($sort) {
						case 'recent':

							$result = $campaign->getCampaignAllRecent();
							$totalpages = $result->getLastPage();
							//dd($result);
							break;
						case 'popular':
							$result = $campaign->getCampaignAllPopular();
							$totalpages = $result->getLastPage();
							//dd($result);
							break;
						case 'soontoend' :
							$result = $campaign->getCampaignAllSoontoend();
							$totalpages = $result->getLastPage();
							break;
						case 'byname' :
							$result = $campaign->getCampaignAllByname($campname);
							$totalpages = $result->getLastPage();
							break;
						default:
							# code...
							break;
					}
								
				return View::make('landing.bodycampaign3')->with(array('data'=>$result, 'totalpages'=>$totalpages, 'logstatus'=>$logstatus));
			}
			Redirect::to('/');
		}
				
	}

	public function getCamp(){
		$campaign = new Campaign;
		$result = $campaign->getCampaignName();
		dd($result);
	}
	public function getText(){
		return "test";
	}
	public function getContributors(){
		$campaignid = Input::get('campaignid');
		$donation = new Donations;
		$result = $donation->getContributors($campaignid);
		//dd($result);
		if ($result){
			$str ="";
			foreach ($result as $row) {
				$str .= "<a style='font-weight:lighter;' href='/".$row->username."' class='label label-important'><strong><i class='icon-tag'></i> ".$row->username."</strong></a> ";
				
			}
			return $str;
		}else{
			return "<strong style='font-weight:lighter;'>No contributors yet.</strong>";
		}
		
		
	}
	public function getTitle(){
		$usernameurl = Request::segment(4);
		$type = Request::segment(3);
		$user = new Users;
		$result = $user->checkUser($usernameurl);
		if ($result){
			if ($usernameurl == Session::get('username')){
				$logstatus = true;
				$usersid = Session::get('userid');

				$campaign = new Campaign;
				if ($type == "created"){
					$result = $campaign->getCampaignCreatedName($usersid);
					$result = json_encode($result);
					return $result;
				}else{
					$result = $campaign->getCampaignFundedName($usersid);
					$result = json_encode($result);
					return $result;
				}
				

			}else{
				
				$user = new Users;
				$result = $user->checkUser($usernameurl);
				if ($result){
					if (Session::has('userid')){
						$logstatus = true;
					}else{
						$logstatus = false;
					}

					$usersid = $result->id;

					$campaign = new Campaign;
					if ($type == "created"){
						$result = $campaign->getCampaignCreatedName($usersid);
						$result = json_encode($result);
						return $result;
					}else{
						$result = $campaign->getCampaignFundedName($usersid);
						$result = json_encode($result);
						return $result;
					}
					
				}
			}
		}else{
			if (($usernameurl == "")&&($type == "all")){
				$campaign = new Campaign;
				$result = $campaign->getCampaignAllName();
				$result = json_encode($result);
				return $result;
			}
			Redirect::to('/');
		}
	}

}