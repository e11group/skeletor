<?php
namespace Skeletor\Mappers\API;

class LoginMapper implements \Skeletor\Interfaces\API\LoginMapperInterface
{
    protected $login;
    protected $em;
    private $email;
    private $pw;
    private $type;


    public function __construct($email, $pw) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new \BadMethodCallException(
            "not an email");
      }
      if ($pw == null) {
        throw new \InvalidArgumentException(
            "no pass");
      }
      $this->email = $email;
      $this->pw = $pw;
      $this->em = \Flight::get('em');
      $this->em->getConnection()->beginTransaction(); // suspend auto-commit
      $this->login = new \Skeletor\Entities\Client\Users();
      
    
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
       ->where($qb->expr()->orX(
          $qb->expr()->eq('u.email', $this->email)
        ));
    $query = $qb->getQuery();
    // one or null
    $users = $query->getOneOrNullResult();
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