<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate(){
		/*
		//TODO JPV -> We need to make a good login in here
		$user = Users::model()->findAll('username=\''.$this->username.'\' AND password=\''.$this->encryptedPassword.'\'');
		if(!isset($user[0])){
			return false;
		}else{   
			$this->setState('id', $user[0]->id);
			$this->username = $user[0]->username;
			$this->errorCode=self::ERROR_NONE;
			return true;
		}*/
		$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username])){
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}elseif($users[$this->username]!==$this->password){
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}else{
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
}