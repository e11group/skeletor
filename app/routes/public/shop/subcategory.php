<?php


$app->get('/products/:category/:subcategory', function ($category, $subcategory) use ($app) {

	$app->etag('st-home');
    $app->expires('+1 week');
        $products_menu_active = 'true';


	include_once VIEW_INC_DIR . 'public_head.php';

	include_once VIEW_INC_DIR . 'public_header.php';

	$subcategory = formatFromURL($subcategory);

	$productService = new productService();

	$dbService = new dbService('products_subcategory');

	$query = $productService->getSingleSubcategory('', $subcategory);

	foreach ($query as $n => $row) {

		$related_link_result = $dbService->query('SELECT * FROM products_subcategory_links WHERE subcategory = ?', $row['id']);

		$related_links = '';

		foreach ($related_link_result as $n2 => $row2) {

			$related_links .= '<li><a href="'.$row2['href'].'">'.$row2['name'].'</a></li>';

		}

		$featured_video = str_replace('width="560"','',$row['video']);
		$featured_video = str_replace('height="315"','class="twelve"',$featured_video);
		$featured_video = isset($featured_video) ? $featured_video : '';

		$items[] = array(

			'id' => $row['id'],
			'category' => $productService->getSingleCategory($row['category']),
			'name' => $row['name'],
			'description' => $row['description'],
			'image' => $row['image'],
			'ext' => $row['image_ext'],
			'featured_video' => $featured_video,
			'related_links' => $related_links

			); 

	$product_category_widget_result = $dbService->query('SELECT * FROM products_product_category WHERE subcategory = ?', $row['id']);

		foreach ($product_category_widget_result as $n3 => $row3) {

			$products = '';

			$products_widget_result = $dbService->query('SELECT * FROM products_product WHERE product_category = ?', $row3['id']);

			foreach ($products_widget_result as $n4 => $row4) {

				$products .= '<li>
				<div class="row">
					<img src="'.ROOT.'uploads/uploads/'.$row4['image'].$row4['image_ext'].'" class="three columns">
				
					<div class="nine columns">
				
						<a href="'.formatForURL($subcategory).'/'.formatForURL($row4['name']).'">' .$row4['name']. '</a>
				
					</div>
				</div>
				</li>';
			}

		
			$product_categories[] = array(

				'name' => $row3['name'],
				'image' => $row3['image'] . $row3['image_ext'],
				'products' => $products
 
			);
		}

	}

	$template_data['items'] = new ArrayIterator( $items );
	$template_data['product_categories'] = new ArrayIterator( $product_categories );


	$app->render('public/catalog/subcategory.html',
		
		array( 

			'www' => WWW,
			'root' => ROOT,
			'subcategory' => $template_data['items'],
			'product_categories' => $template_data['product_categories']


		 )
    	
    );

    include_once VIEW_INC_DIR . 'public_footer.php';


})->via('GET','POST');

?>
