<?php
/*
$app->get('/dashboard', function () use ($app) {

	$app->etag('lt-dashboard');
    $app->expires('+1 week');

	include_once VIEW_INC_DIR . 'head.php';

	include_once VIEW_INC_DIR . 'header.php';

	include_once INC_DIR . 'tablesorter_pager.php';

	include_once INC_DIR . 'page.php';


	$userService = new userService($user_email, $user_class);

	$userName = $userService->getUserName();

	$userLastLogin = $userService->getLastLogin();

	$activity = array();

		$userActivity = $userService->getActivity('LIMIT 100');

         foreach ($userActivity as $n => $row) {

	 		$timestamp = date('F j, Y, g:i a', $row['time']);

	 		$activity[] = array('activity' => $row['activity'],'time' => $timestamp, 'counter' => $row['id']);
     
     	}


  $template_data['activity'] = new ArrayIterator( $activity );
	

	$app->render('dashboard/dashboard.html',
		
		array( 

			'tablesorter_pager' => $tablesorter_pager,
			'name' => $userName,
			'activity' => $template_data['activity'],
			'last_login' => $userLastLogin

		 )
    	
    );



    include_once VIEW_INC_DIR . 'footer.php';

});
*/
?>
