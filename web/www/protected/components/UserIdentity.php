<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	private $is_superadmin;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate(){
		
		//TODO JPV -> We need to make a good login in here
		$admin = Admin::model()->findAll('admin_name=\''.$this->username.'\' AND password=\''.md5($this->password).'\'');
		if(!isset($admin[0])){
			$this->errorCode = self::ERROR_USERNAME_INVALID;
			return false;
		}else{   
			$this->setState('id', $admin[0]->id_admin);
			$this->username = $admin[0]->admin_name;
			$this->is_superadmin = $admin[0]->is_superadmin;
			$this->errorCode=self::ERROR_NONE;

			//We save the now expression
			$admin = Admin::model()->findByPk($admin[0]->id_admin);
			$admin->last_login = new CDbExpression('NOW()');
			$admin->save();


			return true;
		}
		/*$users=array(
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
		return !$this->errorCode;*/
	}

	/*public function getId(){
		return $this->_id;
	}*/
}