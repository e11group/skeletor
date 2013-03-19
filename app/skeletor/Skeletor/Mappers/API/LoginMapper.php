<?php
namespace Skeletor\Mappers\API;

class LoginMapper implements \Skeletor\Interfaces\API\LoginMapperInterface
{
    protected $login;
    protected $em;
    protected $email;
    protected $pw;
    protected $type;


    public function __construct() {


      $this->em = \Flight::get('em');
      $this->em->getConnection()->beginTransaction(); // suspend auto-commit
      $this->login = new \Skeletor\Entities\Client\Users();
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new \BadMethodCallException(
            "not an email");
      }

      $this->email = $email;
      return $email;
    }

    public function setPW($pw)
    {
      if ($pw == null) {
        throw new \InvalidArgumentException(
            "no pass");
      }
        $this->pw = $pw;
        return true;

    }


    public function login()
    {
        $email = $this->checkLogin();
        if ($email) {
            $this->email = $email; // store it so it can be accessed later
            return $email;
        }
        return false;
    }

    protected function checkLogin()
    {
    // load up trusy query builder
    $qb = $this->em->createQueryBuilder();
    $qb->select(array('u'))
       ->from('Skeletor\Entities\Client\Users', 'u')
       ->where('u.email = :email')
       ->setParameter('email', $this->email);
       $query = $qb->getQuery();
    // one or null
    $users = $query->getResult();
    if ($users == null) {
        return false;
    }

    if (crypt($this->_pw, $user['hash']) == $user['hash']) {
                $_SESSION['authorization'] = 'true';
                $_SESSION['user_type'] = $user['type'];
                $_SESSION['user_email'] = $user['email'];
                return $email;
            }

    return false; 
    

 }

}