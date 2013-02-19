 <?php


$app->get('/video', function () use ($app) {

	$app->etag('st-home');
    $app->expires('+1 week');

	include_once VIEW_INC_DIR . 'public_head.php';

	include_once VIEW_INC_DIR . 'public_header.php';

$video_arr = dibi::query('SELECT * FROM featured_video');

foreach ($video_arr as $n => $row) {

$featured_video='';

		$featured_video = str_replace('width="560"','',$row['link']);
		$featured_video = str_replace('height="315"','class="twelve"',$featured_video);
		$featured_video = isset($featured_video) ? $featured_video : '';


$contacts[] = array('id'=>$row['id'], 'name'=>$row['name'], 'video'=>$featured_video);

}
	
	$contacts = isset($contacts) ? $contacts : array();

	$template_data['contacts'] = new ArrayIterator( $contacts );

	$app->render('public/functional/grid.html',
		
		array( 

			'www' => WWW,
			'root' => ROOT,
			'grid' => $template_data['contacts'],
'page_name'=>'Featured Videos',
'description'=>'description'

		)
    	
    );

    include_once VIEW_INC_DIR . 'public_footer.php';


})->via('GET','POST');

?>