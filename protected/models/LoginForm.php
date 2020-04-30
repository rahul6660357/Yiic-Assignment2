<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $user_name;
	public $user_password;
	public $rememberMe;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('user_name, user_password', 'required'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('user_password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'rememberMe'=>'Remember me next time',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 * @param string $attribute the name of the attribute to be validated.
	 * @param array $params additional parameters passed with rule when being executed.
	 */
	public function authenticate($attribute,$params)
	{
		$users_name = $this->user_name;
		// print_r($users_name);
		// echo $users_name;
		// // $cond = "users_name = ".$users_name"";
		$model=new Users;
		 $user = Users::model()->find(array(
			 'select'=>['users_id','users_name','users_email','users_password'],
			 'condition'=>'users_name="'.$users_name.'"',

		 ));
		//print_r($user);


		// die();
	if($user === NULL)
	 {
		echo '<script>alert("Login FailedInvalid Username")</script>';
	 } //
	 else if($user->users_password===$this->user_password)
	 {
		 $url="http://localhost/Assignment_2-master/index.php?r=users/view&id=".($user->users_id);
		 header("Location:$url");

	 }

     else{
		echo '<script>alert("Login Failed: invalid password")</script>';
	}

	}/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->user_name,$this->user_password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}
}