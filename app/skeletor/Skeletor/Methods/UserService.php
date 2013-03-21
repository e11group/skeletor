<?php
namespace Skeletor\Methods;

class UserService
{

	public static function create( $email, $password, $first_name, $last_name){ 

	   $sql = "INSERT INTO users ( email, password, first_name, last_name, created_at ) VALUES ( '$email', '$password', '$first_name', '$last_name', NOW() ) ";

		mysql_query_excute($sql); 

		return mysql_insert_id();
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