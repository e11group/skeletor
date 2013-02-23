<?php
/*
$app->get('/account', function () use ($app) {

	include_once VIEW_INC_DIR . 'head.php';

	include_once VIEW_INC_DIR . 'header.php';

	include_once INC_DIR . 'tablesorter_pager.php';

	include_once INC_DIR . 'page.php';

  include_once INC_DIR . 'subheader.php';


	$userService = new userService($user_email, $user_class);

	$username = $userService->getUserName();

  $alert = '';


  if($app->request()->isPost() && sizeof($app->request()->post()) >= 2)
    {

      $post = (object)$app->request()->post();


      if (isset($post->submitAccountInformation)) {

      	if ($post->account_email == '') {

                $alert = '<div class="alert-box alert">Please enter a valid email address.   <a href="" class="close">&times;</a></div>';

                return false;

      	}

      	elseif ($post->account_name == '' ) {

                $alert = '<div class="alert-box alert">Please enter a first name.   <a href="" class="close">&times;</a></div>';

                return false;

      	}

        else {


         $account_email = mysql_real_escape_string($post->account_email);

         $account_name = mysql_real_escape_string($post->account_name);

        $update_arr = array(

          'email' => $account_email,
          'name' => $account_name

        );

        $update = dibi::query('UPDATE admins SET', $update_arr, 'WHERE email = ?', $user_email);

        if ($update) { 

          unset($update);


        	$modal_head = 'Success!';
        	$modal_subhead = 'The form has been submitted!';
        	$modal_text = 'Your account information has been updated.';

        	include(INC_DIR . 'modal.php');
   			
   			 }

        else { 

        	$success = 'failure';

        	 }

        }


      }

    }

	$userLastLogin = $userService->getLastLogin();


    $app->render('dashboard/account.html',
		
		array( 

			'tablesorter_pager' => $tablesorter_pager,			
			'email' => $user_email,
			'modal_head' => $modal_head,
			'modal_subhead' => $modal_subhead,
			'modal_text' => $modal_text,
			'modal_link' => WWW . 'account',
      'alert' => $alert,
      'name' => $username,
      'www' => WWW


		 )
    	
    );

    include_once VIEW_INC_DIR . 'footer.php';


})->via('GET','POST');
*/
?>
