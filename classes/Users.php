<?php

class Users extends ActiveRecord{
	
	public static $table = "users";
	public static $key = "user_id";
	
	
	public function setSession(){
		Session::set("user_status",$this->user_status);
	}
	
	
	public static function login($user_username, $user_password){
		
		$users = self::getAll("WHERE user_username = '{$user_username}' and user_password = '{$user_password}' limit 1");
		
		if(count($users)==1){
			$users[0]->setSession();
			return $users[0];
		}else{
			return null;
		}		
	}
	
	
	public function logout(){
		Session::stop();
	}
	
	
}