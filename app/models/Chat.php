<?php

	class Chat extends Eloquent{
		public $timestamps = false;

		public function getChat($username){
			$result = DB::table('chat')
						->where('from', '=', $username)
						->orWhere('to','=',$username)
						->orderby('createdAt', 'desc')
						->get();

			return $result;
		}
	}