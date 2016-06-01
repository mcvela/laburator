<?php

/*
ELIMINADO username  ---> Cambiando los comentarios por uxername
*/
/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the uxername and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$users=array(
			// uxername => password
			 email => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->email])) //uxername
			$this->errorCode=self::ERROR_EMAIL_INVALID; //UXERNAME
		elseif($users[$this->email]!==$this->password) //uxername
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}
}