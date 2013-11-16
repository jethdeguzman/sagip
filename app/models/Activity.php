<?php

	class Activity extends Eloquent{

		public $timestamps = false;
		public $table = 'activity';

		public function getRecent($usersid){
			$result = DB::table('activity')
						->select('name','date')
						->where('usersid',$usersid)
						->orderby('id', 'desc')
						->take(5)
						->get();
			return $result;

			dd($result);
		}


	}