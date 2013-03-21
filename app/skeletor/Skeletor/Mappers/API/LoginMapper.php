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
    $users = $query->getOneOrNullResult(\Doctrine\ORM\Query::HYDRATE_OBJECT);
    if ($users == null) {
        return false;
    }
    $hash = $users->getHash();
    $email = $users->getEmail();
    $type = $users->getType();
    $user_id = $users->getId();
    if (crypt($this->pw, $hash) == $hash) {
      $salt = \Flight::get('api-phrase');
      $hashids = new \Hashids\Hashids($salt);      

      $hashed_id = $hashids->encrypt($user_id);

                $_SESSION['valid_auth'] = \Skeletor\Methods\AppService::hashHMAC($email, $hash);
                $_SESSION['user_id'] = $hashed_id;
                return $email;
            }

    return false; 
    

 }



}