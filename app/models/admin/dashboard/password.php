<?php
/*
$app->get('/account/password', function () use ($app) {

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


      if (isset($post->newPassword)) {

        if ($post->change_old_password == '') {

        $alert = '<div class="alert-box alert">Please enter your current password.   <a href="" class="close">&times;</a></div>';

        }

        elseif ($post->change_new_password == '') {

          $alert = '<div class="alert-box alert">Please enter a new password.   <a href="" class="close">&times;</a></div>';

        }

        elseif ($post->confirm_new_password == '') {

           $alert = '<div class="alert-box alert">Please enter a new password.   <a href="" class="close">&times;</a></div>';

        }

        else {

          $current_password = mysql_real_escape_string($post->change_old_password);


          $loginService = new loginService($user_email, $current_password);


            if ($user_id = $loginService->login('true')) {

          $password =  mysql_real_escape_string($post->confirm_new_password);

          $generateHash = new generateHash();

          $hash = $generateHash->generate($password);
        
          $update = dibi::query('UPDATE admins SET hash = ?', $hash);

          if ($update) { 

            unset($update);

           $addActivity = $userService->addActivity('Change Password');


            $mail_to = 'abigcitycollective@gmail.com';
            $mail_subject = 'Your Leader Tech Admin Password has been changed';
            $mail_isHTML = 'true';
            $mail_htmlMessage = 'Your password at Leader Tech has been changed.  If you did not change this, please respond right away';
            $mail_textMessage = 'Your password at Leader Tech has been changed.  If you did not change this, please respond right away';

              include(INC_DIR . 'email.php');

              $modal_head = 'Success!';
              
              $modal_subhead = 'The form has been submitted!';
          
              $modal_text = 'Your password has been updated and a verification letter email sent. ';

              include(INC_DIR . 'modal.php');

          }


            } else {

    
            $modal_head = 'There has been an error!';
              
              $modal_subhead = 'Your password was not updated!';
          
              $modal_text = 'You entered in the incorrect password. Please try again. ';

              include(INC_DIR . 'modal.php');

           }

      }
    }



    }

	$userLastLogin = $userService->getLastLogin();


    $app->render('dashboard/password.html',
		
		array( 

			'tablesorter_pager' => $tablesorter_pager,			
			'email' => $user_email,
			'modal_head' => $modal_head,
			'modal_subhead' => $modal_subhead,
			'modal_text' => $modal_text,
			'modal_link' => WWW . 'account/password',
      'alert' => $alert,
      'name' => $username,
      'www' => WWW


		 )
    	
    );

    include_once VIEW_INC_DIR . 'footer.php';


})->via('GET','POST');
*/
?>
