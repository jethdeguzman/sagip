<?php

	class Campaign extends Eloquent{
		public $timestamps = false;

		public function getCampaignTotal($campaignid){
			$result = DB::table('campaign')
						->select(sum('amountdonated'))
						->where('campaignid',$campaignid)
						->get();
			return $result;
		}
		public function getCampaignCreatedRecent($usersid){
			$result = DB::table('campaign')
						->leftjoin('donation', 'campaign.id','=','donation.campaignid')
						->leftjoin('users', 'campaign.usersid','=','users.id')
						->select('campaign.*',DB::raw('count(distinct(donation.usersid)) as contributors'),DB::raw('sum(donation.amountdonated) as raised'),'users.username')
						->groupby('campaign.id')
						->orderby('campaign.datecreated','desc')
						->orderby('campaign.id','desc')
						->where('campaign.usersid',$usersid)
						->paginate(4);
			
			return $result;
		}
		public function getCampaignCreatedPopular($usersid){
			$result = DB::table('campaign')
						->leftjoin('donation', 'campaign.id','=','donation.campaignid')
						->leftjoin('users', 'campaign.usersid','=','users.id')
						->select('campaign.*',DB::raw('count(distinct(donation.usersid)) as contributors'),DB::raw('sum(donation.amountdonated) as raised'),'users.username')
						->groupby('campaign.id')
						->orderby(DB::raw('count(distinct(donation.usersid))'),'desc')
						->orderby('campaign.name')
						->where('campaign.usersid',$usersid)
						->paginate(4);
			
			return $result;
		}
		public function getCampaignCreatedSoontoend($usersid){
			$result = DB::table('campaign')
						->leftjoin('donation', 'campaign.id','=','donation.campaignid')
						->leftjoin('users', 'campaign.usersid','=','users.id')
						->select('campaign.*',DB::raw('count(distinct(donation.usersid)) as contributors'),DB::raw('sum(donation.amountdonated) as raised'),'users.username')
						->groupby('campaign.id')
						->orderby('campaign.specificdate')
						->where('campaign.usersid',$usersid)
						->where('campaign.type','specific')
						->paginate(4);
			
			return $result;
		}
		public function getCampaignCreatedByname($usersid, $campname){
			$result = DB::table('campaign')
						->leftjoin('donation', 'campaign.id','=','donation.campaignid')
						->leftjoin('users', 'campaign.usersid','=','users.id')
						->select('campaign.*',DB::raw('count(distinct(donation.usersid)) as contributors'),DB::raw('sum(donation.amountdonated) as raised'),'users.username')
						->groupby('campaign.id')
						->orderby('campaign.datecreated','desc')
						->orderby('campaign.id','desc')
						->where('campaign.usersid',$usersid)
						->where('campaign.name',$campname)
						->paginate(4);
			
			return $result;
		}

		public function getCampaignFunded($usersid){
			$result = DB::table('campaign')
						->leftjoin('donation', 'campaign.id','=','donation.campaignid')
						->leftjoin('users', 'campaign.usersid','=','users.id')
						->select('campaign.*',DB::raw('count(distinct(donation.usersid)) as contributors'),DB::raw('sum(donation.amountdonated) as raised'),'users.username')
						->groupby('campaign.id')
						->orderby('campaign.datecreated','desc')
						->orderby('campaign.id','desc')
						->where('donation.usersid',$usersid)
						->paginate(12);
			
			return $result;
		}
		public function getCampaignHome(){
			$result = DB::table('campaign')
						->leftjoin('donation', 'campaign.id','=','donation.campaignid')
						->leftjoin('users', 'campaign.usersid','=','users.id')
						->select('campaign.*',DB::raw('count(distinct(donation.usersid)) as contributors'),DB::raw('sum(donation.amountdonated) as raised'),'users.username')
						->groupby('campaign.id')
						->orderby('campaign.datecreated','desc')
						->orderby('campaign.id','desc')
						->take(3)
						->get();
			
			return $result;
		}
		public function getCampaignCreatedName($usersid){
			$result = DB::table('campaign')
					->select('campaign.name')
					->where('usersid',$usersid)
					->get();
			return $result;
		
		}
		
		public function getCampaignFundedName($usersid){
			$result = DB::table('campaign')
						->leftjoin('donation', 'campaign.id','=','donation.campaignid')
						->leftjoin('users', 'campaign.usersid','=','users.id')
						->select('campaign.name')
						->groupby('campaign.id')
						->orderby('campaign.datecreated','desc')
						->orderby('campaign.id','desc')
						->where('donation.usersid',$usersid)
						->get();
			
			return $result;
		}

		public function getCampaignFundedRecent($usersid){
			$result = DB::table('campaign')
						->leftjoin('donation', 'campaign.id','=','donation.campaignid')
						->leftjoin('users', 'campaign.usersid','=','users.id')
						->select('campaign.*',DB::raw('count(distinct(donation.usersid)) as contributors'),DB::raw('sum(donation.amountdonated) as raised'),'users.username')
						->groupby('campaign.id')
						->orderby('campaign.datecreated','desc')
						->orderby('campaign.id','desc')
						->where('donation.usersid',$usersid)
						->paginate(12);
			
			return $result;
		}
		public function getCampaignFundedFunded($usersid){
			$result = DB::table('campaign')
						->leftjoin('donation', 'campaign.id','=','donation.campaignid')
						->leftjoin('users', 'campaign.usersid','=','users.id')
						->select('campaign.*',DB::raw('count(distinct(donation.usersid)) as contributors'),DB::raw('sum(donation.amountdonated) as raised'),'users.username')
						->groupby('campaign.id')
						->orderby(DB::raw('sum(donation.amountdonated)'),'desc')
						->where('donation.usersid',$usersid)
						->paginate(12);
			
			return $result;
		}
		public function getCampaignFundedByname($usersid, $campname){
			$result = DB::table('campaign')
						->leftjoin('donation', 'campaign.id','=','donation.campaignid')
						->leftjoin('users', 'campaign.usersid','=','users.id')
						->select('campaign.*',DB::raw('count(distinct(donation.usersid)) as contributors'),DB::raw('sum(donation.amountdonated) as raised'),'users.username')
						->groupby('campaign.id')
						->orderby('campaign.datecreated','desc')
						->orderby('campaign.id','desc')
						->where('donation.usersid',$usersid)
						->where('campaign.name',$campname)
						->paginate(12);
			
			return $result;
		}
		public function getCampaignAllRecent(){
			$result = DB::table('campaign')
						->leftjoin('donation', 'campaign.id','=','donation.campaignid')
						->leftjoin('users', 'campaign.usersid','=','users.id')
						->select('campaign.*',DB::raw('count(distinct(donation.usersid)) as contributors'),DB::raw('sum(donation.amountdonated) as raised'),'users.username')
						->groupby('campaign.id')
						->orderby('campaign.datecreated','desc')
						->orderby('campaign.id','desc')
						->paginate(9);
			
			return $result;
		}
		public function getCampaignAllPopular(){
			$result = DB::table('campaign')
						->leftjoin('donation', 'campaign.id','=','donation.campaignid')
						->leftjoin('users', 'campaign.usersid','=','users.id')
						->select('campaign.*',DB::raw('count(distinct(donation.usersid)) as contributors'),DB::raw('sum(donation.amountdonated) as raised'),'users.username')
						->groupby('campaign.id')
						->orderby(DB::raw('count(distinct(donation.usersid))'),'desc')
						->orderby('campaign.name')
						->paginate(9);
			
			return $result;
		}
		public function getCampaignAllSoontoend(){
			$result = DB::table('campaign')
						->leftjoin('donation', 'campaign.id','=','donation.campaignid')
						->leftjoin('users', 'campaign.usersid','=','users.id')
						->select('campaign.*',DB::raw('count(distinct(donation.usersid)) as contributors'),DB::raw('sum(donation.amountdonated) as raised'),'users.username')
						->groupby('campaign.id')
						->orderby('campaign.specificdate')
						->where('campaign.type','specific')
						->paginate(9);
			
			return $result;
		}
		public function getCampaignAllByname($campname){
			$result = DB::table('campaign')
						->leftjoin('donation', 'campaign.id','=','donation.campaignid')
						->leftjoin('users', 'campaign.usersid','=','users.id')
						->select('campaign.*',DB::raw('count(distinct(donation.usersid)) as contributors'),DB::raw('sum(donation.amountdonated) as raised'),'users.username')
						->groupby('campaign.id')
						->orderby('campaign.datecreated','desc')
						->orderby('campaign.id','desc')
						->where('campaign.name',$campname)
						->paginate(9);
			
			return $result;
		}
		public function getCampaignAllName(){
			$result = DB::table('campaign')
					->select('campaign.name')
					->get();
			return $result;
		
		}

		public function getCampaignImage(){
			$result = DB::table('campaign')
						->select('image','name')
						->orderby('id','desc')
						->take(8)
						->get();
			return $result;
			}


	}