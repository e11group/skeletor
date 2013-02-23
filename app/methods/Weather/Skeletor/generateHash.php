<?php 
namespace Weather\Skeletor;

class generateHash
{

    protected $_password;

    public function __construct() 

    {    }

    public function generate($password)
    {
       
    	if (defined('CRYPT_SHA512') && CRYPT_SHA512) {

			$Salt = uniqid();

			$Algo = '6'; 

			$Rounds = '5000'; 

			$CryptSalt = '$' . $Algo . '$rounds=' . $Rounds . '$' . $Salt;

			$HashedPassword = crypt($password, $CryptSalt);

			return $HashedPassword;

		}

		else { 

			echo 'All this shit needs php 5.3.* +';

			return false;

		}

    }
  

}

?>