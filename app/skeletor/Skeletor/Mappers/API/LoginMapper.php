<?php
namespace Skeletor\Mappers\API;

class LoginMapper implements \Skeletor\Interfaces\API\LoginMapperInterface
{
    protected $login;
    protected $email;
    protected $hash;
    protected $type;


    public function __construct() {
    
    }

    public function login()
    {
        $user = $this->checkLogin();
        if ($user) {
            $this->$user = $user; // store it so it can be accessed later
            return $user;
        }
        return false;
    }

    protected function checkLogin()
    {


        $user = db::row('users', '*', array('email' => $this->_email));

            $email = $user['email'];

            $hash = $user['hash'];

            if (crypt($this->_password, $hash) == $hash) {

                $_SESSION['authorization'] = 'true';

                $_SESSION['user_class'] = 'user';

                $_SESSION['user_email'] = $email;

                $_SESSION['user_name'] = $user['name'];

                return $email;
            }

          
    return false;

 }

}