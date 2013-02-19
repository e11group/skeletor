<?php


$app->get('/contact', function () use ($app) {

	$app->etag('st-home');
    $app->expires('+1 week');

    $contact_menu_active = 'true';

	include_once VIEW_INC_DIR . 'public_head.php';

	include_once VIEW_INC_DIR . 'public_header.php';

	if($app->request()->isPost() && sizeof($app->request()->post()) >= 1)
    
    {
		
		 $post = (object)$app->request()->post();

		 if (isset($post->findContacts)) {

		 	$country = mysql_real_escape_string($post->country);
		 	$state = mysql_real_escape_string($post->state);

		 	$contactDB = new dbService('people');

		 	if ($country == 'US') {

		 		$options = array(
		 			array('state = ?', $state),
		 			array('country= ?', $country)
		 		);

		 		$select = dibi::query('SELECT * FROM people WHERE %and', $options);
		 	}

		 	else {

		 		$select = dibi::query('SELECT * FROM people WHERE country = ?', $country);

		 	}

		 	foreach ($select as $n => $row) {

		 		$contacts[] = array(

		 			'name' => $row['name'],
		 			'company' => $row['company'],
		 			'phone' => formatPhone($row['phone']),
		 			'cell' => formatPhone($row['cell']),
		 			'fax' => formatPhone($row['fax'])

		 			); 

		 	}


		 }

	}
	
	$contacts = isset($contacts) ? $contacts : array();

	$template_data['contacts'] = new ArrayIterator( $contacts );



	/* STATES + COUNTRIES ARRAY */

	$formService = new formService('contact_');
  
  	$states = $formService->getStates();

 	$countries = $formService->getCountries();

 	$template_data['states'] = new ArrayIterator( $states );

	$template_data['countries'] = new ArrayIterator( $countries );

	/* end states + countries array */



	$app->render('public/functional/contact.html',
		
		array( 

			'www' => WWW,
			'root' => ROOT,
			'states' => $template_data['states'],
			'countries' => $template_data['countries'],
			'featured_contacts' => $template_data['contacts'],

		 )
    	
    );

    include_once VIEW_INC_DIR . 'public_footer.php';


})->via('GET','POST');

?>
