  <?php


$app->get('/about', function () use ($app) {

	$app->etag('st-home');
    $app->expires('+1 week');

	include_once VIEW_INC_DIR . 'public_head.php';

	include_once VIEW_INC_DIR . 'public_header.php';

$video_arr = dibi::query('SELECT * FROM products_category');

foreach ($video_arr as $n => $row) {
$contacts[] = array('id' => $row['id'], 'name'=>$row['name']);

}
	
	$contacts = isset($contacts) ? $contacts : array();

	$template_data['contacts'] = new ArrayIterator( $contacts );

	$app->render('public/functional/about.html',
		
		array( 

			'www' => WWW,
			'root' => ROOT,
			'products' => $template_data['contacts'],
'page_name'=>'About Us',
'description'=>'description'

		)
    	
    );

    include_once VIEW_INC_DIR . 'public_footer.php';


})->via('GET','POST');

?>