<?php

	class Donations extends Eloquent{
		public $timestamps = false;
		public $table = 'donation';

				public function getAllReports($campaignid, $dateto, $datefrom){
			$result = DB::table('donation')
						->leftjoin('users', 'users.id', '=', 'donation.usersid')
						->select('donation.*', 'users.username')
						->where('donation.campaignid', $campaignid)
						->whereBetween('donation.datedonated', array($datefrom, $dateto))
						->orderby('donation.id')
						->get();
			return $result;
		}

	public function getReports($campaignid, $dateto, $datefrom, $bankchosen){
			$result = DB::table('donation')
						->leftjoin('users', 'users.id', '=', 'donation.usersid')
						->select('donation.*', 'users.username')
						->where('donation.campaignid', $campaignid)
						->where('donation.bankname', $bankchosen)
						->whereBetween('donation.datedonated', array($datefrom, $dateto))
						->orderby('donation.id')
						->get();
			return $result;
		}

		public function getContributors($campaignid){
			$result = DB::table('donation')
						->leftjoin('users','donation.usersid', '=','users.id')
						->select(DB::raw('distinct(donation.usersid)'),'users.username')
						->where('campaignid',$campaignid)
						->get();
			return $result;
		}
		public function getTopContributorsHome(){
			$result = DB::table('donation')
						->leftjoin('users','donation.usersid','=','users.id')
						->leftjoin('profile','donation.usersid','=','profile.usersid')
						->select('users.username', DB::raw('sum(donation.amountdonated) as totaldonated'),'profile.*')
						->groupby('users.id')
						->orderby(DB::raw('sum(donation.amountdonated)'),'desc')
						->take('4')
						->get();
			return $result;
		}
		public function getTopContributorsAll(){
			$result = DB::table('donation')
						->leftjoin('users','donation.usersid','=','users.id')
						->leftjoin('profile','donation.usersid','=','profile.usersid')
						->select('users.username', DB::raw('sum(donation.amountdonated) as totaldonated'),'profile.*')
						->groupby('users.id')
						->orderby(DB::raw('sum(donation.amountdonated)'),'desc')
						->paginate(8);
			return $result;
		}
		public function getContributorsByname($contname){
			$result = DB::table('donation')
						->leftjoin('users','donation.usersid','=','users.id')
						->leftjoin('profile','donation.usersid','=','profile.usersid')
						->select('users.username', DB::raw('sum(donation.amountdonated) as totaldonated'),'profile.*')
						->where('users.username',$contname)
						->groupby('users.id')
						->orderby(DB::raw('sum(donation.amountdonated)'),'desc')
						->paginate(8);
			return $result;
		}
		public function getFunded($usersid){
			//$result = DB::
		}
		public function getContributorsName(){
			$result = DB::table('donation')
						->leftjoin('users','donation.usersid','=','users.id')
						->select('users.username')
						->groupby('users.id')
						->get();
			return $result;
		}
	}