<?php
namespace Weather\Skeletor;

class UserService
{
    
    protected $_user; 
    protected $_class;
    protected $_activity;

    public function __construct($user, $class) 
    {
       $this->_user = $user;
       $this->_class = $class;
    }

    public function getID()
    {

       $userid = dibi::row('users', '*', array('email' => $this->_user));

       return $userid;


    }

     public function addActivity($activity, $notes = '')
    
    {

        $now = time();

        $this->_activity = $activity;

        $table = 'activity';

        $insert = dibi::query('
            
            INSERT INTO activity', 
                
                array(

                    'email' => $this->_user,
                    'activity' => $this->_activity,
                    'time' => $now,
                    'notes' => $notes

                )

            );
        
       

        return false;

    }

    public function getActivity($limit = '') 

    {

        
            $query = dibi::query('SELECT * FROM activity WHERE email = ?' , $this->_user, ' ORDER BY id ' . $limit);

            return $query;

    }

     public function getSingleActivity($activity_id) 

    {
            
            $query = dibi::row('activity', '*', array('id' => $activity_id));

            return $query;

    }


    public function getLastLogin() 

    {
            $res = dibi::query('SELECT * FROM activity WHERE email =%s', $this->_user, 'AND activity =?', 'login', ' ORDER BY id desc');

            foreach ($res as $n => $row) {
                   
            $timestamp = $row['time'];

            $time = time_stamp($timestamp);

            return $time;

            }

    }

    public function getUsers()

    {

        $query = dibi::select('users', '*');
        return $query; 

    }

    public function getUserName()
    
    {

        if ($this->_class == 'admin') {

            $userName = $this->_getAdminName();

        }
        elseif ($this->_class == 'user') {

            $userName = $this->_getUserName();

        }

        if (!empty($userName)) {
           
            return $userName;
        }

        else {
            return false;
        }

        return false;
    }

    


     protected function _getAdminName()
    {


        $query = dibi::fetchSingle('SELECT name FROM admins WHERE email = ?', $this->_user);
        
        return $query;
    }

    protected function _getUserName()
    {

        $query = dibi::row('users', '*', array('email' => $this->_user));
        
        return $query['name'];

    }

}

?>