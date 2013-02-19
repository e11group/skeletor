<?php


$app->get('/', function () use ($app) {

	$app->etag('st-home');
    $app->expires('+1 week');

    $home_menu_active = 'true';


	include_once VIEW_INC_DIR . 'public_head.php';

	include_once VIEW_INC_DIR . 'public_header.php';

	$dbService = new dbService('pages_templates_modules');

	/* BEGIN SLIDER */

	$slides = $dbService->selectSingle('*', 'template', 7);

	foreach ($slides as $n => $row) {
		
		$slider_image[] = array('slide' => $row['image'] . $row['image_ext']);
	
	}

	$slider_image = isset($slider_image) ? $slider_image : array();

	$template_data['slider_image'] = new ArrayIterator( $slider_image );

	/* END SLIDER */

	/* BEGIN FEATURED VIDEO */

	$result = $dbService->query('SELECT * FROM featured_video WHERE featured = ?', 1, ' LIMIT', 1);

	foreach ($result as $n => $row) {
	
		$featured_video_link = str_replace('width="560"','',$row['link']);
	
		$featured_video_link = str_replace('height="315"','class="twelve" style="min-height: 100%; height: 100%;"',$featured_video_link);
	
	}


	$featured_video = isset($featured_video_link) ? $featured_video_link : '';

	/* END FEATURED VIDEO */

	/* BEGIN BLOG POST */

	$result = $dbService->query('SELECT * FROM blog ORDER BY id DESC LIMIT', 1);

	foreach ($result as $n => $row) {

		$blog_posts[] = array(
			'name' => $row['name'],
			'time' => date('m/d/Y', $row['time']),
			'post' => substr($row['post'], 0, 155) . ' ... ',
			); 
	
		
	
	}


	$blog_posts = isset($blog_posts) ? $blog_posts : '';
		$template_data['blog_posts'] = new ArrayIterator( $blog_posts );


	/* END BLOG POST */


	/* BEGIN SHIELDING SOLUTIONS */


	$shielding_solutions = $dbService->selectSingle('*', 'template', 6);

	foreach ($shielding_solutions as $n => $row) {

		$items[] = array (

			'image' => $row['image'],
			'ext' => $row['image_ext'] 

			);
	}

	$template_data['shielding_solutions'] = new ArrayIterator( $items );

	/* END SHIELDING SOLUTIONS */


	
	/* BEGIN FEATURED BOXES */

	$featured_boxes = $dbService->selectSingle('*', 'template', 8);

	foreach ($featured_boxes as $n => $row) {

		$featured_items[] = array (

			'text' => $row['text'],
			'image' => $row['image'],
			'ext' => $row['image_ext'],
			'link_name' => $row['link_name'],
			'link_href' => $row['link_href'],
			'name' => $row['name'],
			'whole_image' => $row['image'] . $row['image_ext']


			);
	}

	$template_data['featured_boxes'] = new ArrayIterator( $featured_items );

	/* END FEATURED BOXES */



	$app->render('new_index.html',
		
		array( 

			'www' => WWW,
			'root' => ROOT,
			'shielding_solutions' => $template_data['shielding_solutions'],
			'featured_boxes' => $template_data['featured_boxes'],
			'featured_video' => $featured_video,
			'slider' => $template_data['slider_image'],
			'blog_posts' => $template_data['blog_posts']

		 )
    	
    );

    include_once VIEW_INC_DIR . 'public_footer.php';


})->via('GET','POST');

?>
