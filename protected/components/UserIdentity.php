<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $db_id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user = new Users('login');
		$user = $user->login($this->username);
		$this->db_id = $user->id;
		if(!isset($user->username)){
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}
		elseif(!password_verify($this->password, $user->password))
		{
			$this->errorCode=self::ERROR_PASSWORD_INVALID;		
		}
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}
	public function getId()
	{
    	return $this->db_id;
	}
}