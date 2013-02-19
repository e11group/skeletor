<?php
namespace Weather\Skeletor;

class LoginService
{
    protected $_email;    // using protected so they can be accessed
    protected $_password; // and overidden if necessary
    protected $_user;     // stores the user data
    protected $_class;

    public function __construct($email, $password) 
    {
       $this->_email = $email;
       $this->_password = $password;
    }

    // public function to run private login, confirm to not initiate sessions

    public function login()
    {
        $user = $this->_checkLogin($confirm = null);
        if ($user) {
            $this->_user = $user; // store it so it can be accessed later
            return $user;
        }
        return false;
    }


    protected function _checkLogin($confirm = null)
    {


        $user = dibi::fetchSingle('SELECT * FROM users %if', isset($this->_email), 'WHERE email LIKE ?', $this->_email, '%end');

            $email = $user['email'];

            $hash = $user['hash'];


            $res = dibi::query('SELECT * FROM admins WHERE email =%s', $this->_email);


            foreach ($res as $n => $row) {
            
            $email = $row['email'];

            $hash = $row['hash'];

            }

            if (crypt($this->_password, $hash) == $hash) {

                if (empty($confirm)) {

                    $_SESSION['user_class'] = 'admin';

                    $_SESSION['authorization'] = 'true';

                    $_SESSION['user_email'] = $email;

                }

                return $email;
                        
            } else {

            
                return false;

            }
        

    return false;

 }

  

    public function getUser()

    {
        return $this->_user;
    }


     public function getUserClass()

    {

        $this->_user_class = $_SESSION['user_class'];

        return $this->_user_class;
    }
}

?>