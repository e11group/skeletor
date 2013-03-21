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
    if (crypt($this->pw, $hash) == $hash) {

                $_SESSION['valid_auth'] = \Skeletor\Methods\AppService::hashHMAC($email, $hash);
                $_SESSION['user_type'] = $type;
                $_SESSION['user_email'] = $email;
                return $email;
            }

    return false; 
    

 }


  public function find_by_provider_uid( $provider, $provider_uid )
  {
    $sql = "SELECT * FROM authentications WHERE provider = '$provider' AND provider_uid = '$provider_uid' LIMIT 1";
    $result = mysql_query_excute($sql);  
    return mysql_fetch_assoc($result);
   }  

  public function create( $user_id, $provider, $provider_uid, $email, $display_name, $first_name, $last_name, $profile_url, $website_url )
  {
    $sql = "INSERT INTO authentications ( user_id, provider, provider_uid, email, display_name, first_name, last_name, profile_url, website_url, created_at ) VALUES ( '$user_id', '$provider', '$provider_uid', '$email', '$display_name', '$first_name', '$last_name', '$profile_url', '$website_url', NOW() ) ";
    mysql_query_excute($sql);    
    return mysql_insert_id();
  }  

  public function find_by_user_id( $user_id )
  {
    $sql = "SELECT * FROM authentications WHERE user_id = '$user_id' LIMIT 1";  
    $result = mysql_query_excute($sql);
    return mysql_fetch_assoc($result);
  } 

}