<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends BaseObject
{
    public $username;
    public $password;
    public $email;
    public $mobile;
    public $role;

public function getusername(){
    return $this->username;
}
public function getpassword(){
    return $this->passeord;
}
public function getemail(){
    return $this->email;
}
public function getmobile(){
    return $this->mobile;
}
public function getrole(){
    return $this->role;
}
public function setusername($value){
    $this->username = trim($value);
}
public function setpassword($value){
     $this->password = trim($value);
}
public function setemail($value){
    $this->email = trim($value);
}
public function setmobile($value){
    $this->mobile = trim($value);
}
public function setrole($value){
    $this->role = trim($value);
}
   
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
            [['email'],'required'],
            ['mobile'],['role']
        ];
    }

  
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
