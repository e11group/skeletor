<?php
$user_authorized = s::get('authorization', false);

$curPage = curPageURL();

$noAccess = 'login';
$pos = strpos($curPage, $noAccess);

$access = 'track';
$specialPOS = strpos($curPage, $access);

$access2 = 'public/orders/info/';
$specialPOS2 = strpos($curPage, $access2);


if (($specialPOS !== false) || ($specialPOS2 !== false)) {

}

/* start non-special aka regular login lol */

else {


if (($user_authorized == 'true') || ($pos !== false)) {  }

else {

    go(WWW . 'login');

}

if ($pos !== false) {

}

else {

	   $inactive = 600;

		if(isset($_SESSION['timeout'])) {

			$session_life = abs(time() - $_SESSION['timeout']); 

				if($session_life > $inactive) {

					?>
					
					<script>
						
						window.location = '<?php echo WWW . 'logout'; ?>';
					
					</script>
					
					<?php
	
				}

		}

		$_SESSION['timeout'] = time();

}


if (($pos !== false) && ($user_authorized == 'true')) {

	    go(WWW . 'dashboard');

}

/* END NON SPECIAL WHATEVER THE FUCK YEA */

}

?>