<?php
/*

$app->get('/login', function () use ($app) {

	$app->etag('lp-login');
    $app->expires('+1 week');

	include_once VIEW_INC_DIR . 'head.php';

	$alert = '';

	if($app->request()->isPost() && sizeof($app->request()->post()) >= 2)
    {

      $post = (object)$app->request()->post();

	  $email = $post->login_email;
	  $password = $post->login_password;

	  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
	
		{
			$alert = '<div class="alert-box alert">Please enter a valid email address.   <a href="" class="close">&times;</a></div>';
		}

	  if (($email == '') || ($email == NULL)) 
	  	
	  	{
	  		$alert = '<div class="alert-box alert">Please enter a valid email address. <a href="" class="close">&times;</a></div>';

	 	}

	 	if (($password == '') || ($password == NULL)) 
	  	
	  	{
	  		$alert = '<div class="alert-box alert">Please enter a password. <a href="" class="close">&times;</a></div>';

	 	}

	  $userService = new loginService($email, $password);

		if ($user_id = $userService->login()) {

			$user_email = s::get('user_email', FALSE);
			$user_class = s::get('user_class', FALSE);

			$service = new userService($user_email, $user_class);

			$addActivity = $service->addActivity('Login');

    		?>

    		<script>
    			window.location = "dashboard";
    		</script>

    		<?php


		} else {

		
    	$alert = '<div class="alert-box alert">Invalid login attempt. Please Try Again.  <a href="" class="close">&times;</a></div>';
    	

		}

	/* end post 

    }


	$app->render('login/login.html',
		
		array( 

			'alert' => $alert,
			'root' => ROOT

		 )
    	
    );

    include_once VIEW_INC_DIR . 'footer.php';


})->via('GET','POST')->name('lp_login');
*/
?>
