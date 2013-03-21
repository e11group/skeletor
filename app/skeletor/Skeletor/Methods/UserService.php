<?php
namespace Skeletor\Methods;

class UserService
{


	public static function authenticate_login()
	{

		  // client
    if (!empty($_SESSION['valid_auth']) && !empty($_SESSION['user_id'])) {
      $em = \Flight::get('em');
      $user_id = $_SESSION['user_id'];
      $session_auth = $_SESSION['valid_auth'];
    
      $qb = $em->createQueryBuilder();
      $qb->select(array('u'))
         ->from('Skeletor\Entities\Client\Users', 'u')
         ->where('u.id = :id')
         ->setParameter('id', $user_id);
         $query = $qb->getQuery();
      // one or null
      $users = $query->getOneOrNullResult(\Doctrine\ORM\Query::HYDRATE_OBJECT);
      if ($users == null) {
          return false;
      }
      $check_hash = $users->getHash();  
      $email = $users->getEmail();
      $check_auth = \Skeletor\Methods\AppService::hashHMAC($email, $check_hash);  

      if($session_auth == $check_auth) {
      	return true;
  	  } else { 
  	  	return null;
      }

    } else {
      return null;
    } 
  
   }


	public static function update( $user_id, $email, $password, $first_name, $last_name){ 
		$sql = "UPDATE users SET email = '$email', password = '$password', first_name = '$first_name', last_name = '$last_name' WHERE id = '$user_id' LIMIT 1";

		return mysql_query_excute($sql);
	}

	public static function find_by_id( $id ){
		$sql = "SELECT * FROM users WHERE id = '$id' LIMIT 1";

		$result = mysql_query_excute($sql);

		return mysql_fetch_assoc($result);
	}

	public static function find_by_email( $email ){
		$sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";

		$result = mysql_query_excute($sql);
 
		return mysql_fetch_assoc($result);
	}

	public static function find_by_email_and_password( $email, $password ){
		$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password' LIMIT 1";

		$result = mysql_query_excute($sql);

		return mysql_fetch_assoc($result);
	}

	public static function find_by_provider_uid( $provider, $provider_uid )
   {
    $sql = "SELECT * FROM authentications WHERE provider = '$provider' AND provider_uid = '$provider_uid' LIMIT 1";
    $result = mysql_query_excute($sql);  
    return mysql_fetch_assoc($result);
   }  

   public static function find_by_user_id( $user_id )
   {
    $sql = "SELECT * FROM authentications WHERE user_id = '$user_id' LIMIT 1";  
    $result = mysql_query_excute($sql);
    return mysql_fetch_assoc($result);
   } 
  public function create( $user_id, $provider, $provider_uid, $email, $display_name, $first_name, $last_name, $profile_url, $website_url )
  {
    $sql = "INSERT INTO authentications ( user_id, provider, provider_uid, email, display_name, first_name, last_name, profile_url, website_url, created_at ) VALUES ( '$user_id', '$provider', '$provider_uid', '$email', '$display_name', '$first_name', '$last_name', '$profile_url', '$website_url', NOW() ) ";
    mysql_query_excute($sql);    
    return mysql_insert_id();
  }  

}

?>