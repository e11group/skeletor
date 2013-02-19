<?php


$app->get('/in-the-press', function () use ($app) {

	$app->etag('st-home');
    $app->expires('+1 week');

    $blog_menu_active = 'true';


	include_once VIEW_INC_DIR . 'public_head.php';

	include_once VIEW_INC_DIR . 'public_header.php';

	$dbService = new dbService('blog');

	$categoryDB = new dbService('blog_categories');


	/* BEGIN BLOG RECENT POSTS */


	$recent_posts_arr = $dbService->selectAll('*');

	foreach ($recent_posts_arr as $n => $row) {

		$recent_posts[] = array (

			'name' => htmlspecialchars($row['name']),
			'encoded_name' => formatForURL(htmlspecialchars($row['name'])),
			'post' => substr($row['post'], 0, 455) . ' ... ',
			'time' => date('F j, Y', $row['time']),
			'read_more_link' => '<a href="posts/'.formatForURL(htmlspecialchars($row['name'])).'">Read More</a>'

			);
	}

	$template_data['recent_posts'] = new ArrayIterator( $recent_posts );

	/* END BLOG RECENT POSTS */

		/* BEGIN BLOG CATEGORIES */


	$blog_categories = $categoryDB->selectAll('*');

	foreach ($blog_categories as $n => $row) {

		$categories[] = array (

			'name' => htmlspecialchars($row['name']),
			'encoded_name' => formatForURL(htmlspecialchars($row['name']))

			);
	}

	$template_data['categories'] = new ArrayIterator( $categories );

	/* END BLOG  CATEGORIES*/


/* BEGIN BLOG */


	$recent_posts = $dbService->selectAll('*');

	foreach ($recent_posts as $n => $row) {

		$posts[] = array (

			'name' => htmlspecialchars($row['name']),
			'encoded_name' => formatForURL(htmlspecialchars($row['name'])),
			'post' => substr($row['post'], 0, 455) . ' ... ',
			'time' => date('F j, Y', $row['time']),
			'read_more_link' => '<a href="posts/'.formatForURL(htmlspecialchars($row['name'])).'">Read More</a>'

			);
	}

	$template_data['posts'] = new ArrayIterator( $posts );

	/* END BLOG */


	$app->render('public/functional/blog.html',
		
		array( 

			'www' => WWW,
			'root' => ROOT,
			'blog_categories' => $template_data['categories'],
			'recent_posts' => $template_data['recent_posts'],
			'posts' => $template_data['posts']




		 )
    	
    );

    include_once VIEW_INC_DIR . 'public_footer.php';


})->via('GET','POST');



$app->get('/in-the-press/:category', function ($category) use ($app) {

	$app->etag('st-home');
    $app->expires('+1 week');

	include_once VIEW_INC_DIR . 'public_head.php';

	include_once VIEW_INC_DIR . 'public_header.php';

	$category = formatFromURL($category);

	$dbService = new dbService('blog');

	$categoryDB = new dbService('blog_categories');

	$cat_id_result = dibi::query('SELECT id FROM blog_categories WHERE name LIKE ?', $category);

	foreach ($cat_id_result as $n => $row) {

		$cat_id = $row['id'];

	}

	/* BEGIN BLOG RECENT POSTS */


	$recent_posts_arr = $dbService->selectAll('*');

	foreach ($recent_posts_arr as $n => $row) {

		$recent_posts[] = array (

			'name' => htmlspecialchars($row['name']),
			'encoded_name' => formatForURL(htmlspecialchars($row['name'])),
			'post' => substr($row['post'], 0, 455) . ' ... ',
			'time' => date('F j, Y', $row['time']),
			'read_more_link' => '<a href="posts/'.formatForURL(htmlspecialchars($row['name'])).'">Read More</a>'

			);
	}

	$template_data['recent_posts'] = new ArrayIterator( $recent_posts );

	/* END BLOG RECENT POSTS */

	/* BEGIN BLOG CATEGORIES */


	$blog_categories = $categoryDB->selectAll('*');

	foreach ($blog_categories as $n => $row) {

		$categories[] = array (

			'name' => htmlspecialchars($row['name']),
			'encoded_name' => formatForURL(htmlspecialchars($row['name']))

			);
	}

	$template_data['categories'] = new ArrayIterator( $categories );

	/* END BLOG  CATEGORIES*/

	/* BEGIN BLOG */

	$recent_posts = $dbService->selectSingle('*', 'category', $cat_id);

	foreach ($recent_posts as $n => $row) {

		$posts[] = array (

			'name' => htmlspecialchars($row['name']),
			'encoded_name' => formatForURL(htmlspecialchars($row['name'])),
			'post' => substr($row['post'], 0, 455) . ' ... ',
			'time' => date('F j, Y', $row['time']),
			'read_more_link' => '<a href="posts/'.formatForURL(htmlspecialchars($row['name'])).'">Read More</a>'

			);
	}

	$posts = isset($posts) ? $posts : array();

	$template_data['posts'] = new ArrayIterator( $posts );

	/* END BLOG */

	$app->render('public/functional/blog.html',
		
		array( 

			'www' => WWW,
			'root' => ROOT,
			'blog_categories' => $template_data['categories'],
			'recent_posts' => $template_data['recent_posts'],
			'posts' => $template_data['posts']


		 )
    	
    );

    include_once VIEW_INC_DIR . 'public_footer.php';


})->via('GET','POST');



$app->get('/in-the-press/posts/:post', function ($post) use ($app) {

	$app->etag('st-home');
    $app->expires('+1 week');

	include_once VIEW_INC_DIR . 'public_head.php';

	include_once VIEW_INC_DIR . 'public_header.php';

	$post = formatFromURL($post);

	$dbService = new dbService('blog');

	$categoryDB = new dbService('blog_categories');


	/* BEGIN BLOG RECENT POSTS */


	$recent_posts_arr = $dbService->selectAll('*');

	foreach ($recent_posts_arr as $n => $row) {

		$recent_posts[] = array (

			'name' => htmlspecialchars($row['name']),
			'encoded_name' => formatForURL(htmlspecialchars($row['name'])),
			'post' => substr($row['post'], 0, 455) . ' ... ',
			'time' => date('F j, Y', $row['time']),
			'read_more_link' => '<a href="posts/'.formatForURL(htmlspecialchars($row['name'])).'">Read More</a>'

			);
	}

	$template_data['recent_posts'] = new ArrayIterator( $recent_posts );

	/* END BLOG RECENT POSTS */



	/* BEGIN BLOG CATEGORIES */


	$blog_categories = $categoryDB->selectAll('*');

	foreach ($blog_categories as $n => $row) {

		$categories[] = array (

			'name' => htmlspecialchars($row['name']),
			'encoded_name' => formatForURL(htmlspecialchars($row['name']))

			);
	}

	$template_data['categories'] = new ArrayIterator( $categories );

	/* END BLOG CATEGORIES*/

	/* BEGIN BLOG */

	$recent_posts = $dbService->selectSingle('*', 'name', $post);

	foreach ($recent_posts as $n => $row) {

		$posts[] = array (

			'name' => htmlspecialchars($row['name']),
			'encoded_name' => formatForURL(htmlspecialchars($row['name'])),
			'post' => $row['post'],
			'time' => date('F j, Y', $row['time']),
			'read_more_link' => ''

			);
	}

	$posts = isset($posts) ? $posts : array();

	$template_data['posts'] = new ArrayIterator( $posts );

	/* END BLOG */

	$app->render('public/functional/blog.html',
		
		array( 

			'www' => WWW,
			'root' => ROOT,
			'blog_categories' => $template_data['categories'],
			'recent_posts' => $template_data['recent_posts'],
			'posts' => $template_data['posts'],

		 )
    	
    );

    include_once VIEW_INC_DIR . 'public_footer.php';


})->via('GET','POST');

?>

