<?php


$app->get('/products/:category/:subcategory/:product', function ($category, $subcategory, $product) use ($app) {

	$app->etag('st-home');
    $app->expires('+1 week');
    $products_menu_active = 'true';

	include_once VIEW_INC_DIR . 'public_head.php';
		
	include_once VIEW_INC_DIR . 'public_header.php';

	$subcategory = formatFromURL($subcategory);

	$product = formatFromURL($product);

	$productService = new productService();

		$dbService = new dbService('products_subcategory');


	$subcategoryDB = $productService->getSingleSubcategory('', $subcategory);

	foreach ($subcategoryDB as $n => $row) {

		$related_link_result = $dbService->query('SELECT * FROM products_subcategory_links WHERE subcategory = ?', $row['id']);

		$related_links = '';

		foreach ($related_link_result as $n2 => $row2) {

			$related_links .= '<li><a href="'.$row2['href'].'">'.$row2['name'].'</a></li>';

		}

			$id = $row['id'];
			$category = $productService->getSingleCategory($row['category']);
			$subcategory_name = $row['name'];
			$image = $row['image'];
			$ext = $row['image_ext'];


	}

	$productDB = $productService->getProduct('', $product);

	foreach ($productDB as $n => $row) {
			
			$product_id = $id;

		$items[] = array(
			'product_id' => $id,
			'category' => $category,
			'subcategory' => $subcategory_name,
			'product' => htmlspecialchars($row['name']),
			'category_name' => formatForURL($category),
			'subcategory_name' => formatForURL($subcategory_name),
			'product_name' => formatForURL($row['name']),
			'image' => $image,
			'ext' => $ext,
			'description' => $row['description'],
			'product_image' => htmlspecialchars($row['image']),
			'product_image_ext' => htmlspecialchars($row['image_ext']),
			'related_links' => $related_links

		);
	}

	$items = isset($items) ? $items : array();

	$template_data['items'] = new ArrayIterator( $items );

	/* BEGIN TOLERANCES */

	$productTolerancesDB = $productService->getProductTolerances($product_id);

	foreach ($productTolerancesDB as $n => $row) {

		$tolerances[] = array(
			'dimensions' => $row['dimensions'],
			'tolerance' => $row['tolerance'],

		);
	}

	$tolerances = isset($tolerances) ? $tolerances : array();

	$template_data['tolerances'] = new ArrayIterator( $tolerances );


	/* END TOLERANCES */

	
	/* BEGIN TABLE */
	$productFieldsDB = $productService->getProductFields($product_id);

	foreach ($productFieldsDB as $n => $row) {

		$theads[] = array('thead' => $row['name']);

		
	}
	//var_dump($fields);


	$theads = isset($theads) ? $theads : array();


	$template_data['theads'] = new ArrayIterator( $theads );

	//var_dump($theads);


	/* END TABLE */

	/* BEGIN FIELDS */

	$productFieldsDB = $productService->getProductNumbers($product_id);


	foreach ($productFieldsDB as $n => $row) {
	$fields = '';

		$fields .= '<tr>';

		$exploded = explode(',', $row['fields']);

		foreach ($exploded as $i => $row2) {
			
			$fields .= '<td>'. $exploded[$i].'</td>';
		}

	
		$fields .= '</tr>';

		$fields_arr[] = array('fields' => $fields);

	}

	$fields = isset($fields) ? $fields : array();

	$template_data['fields'] = new ArrayIterator( $fields_arr );


	/* END FIELDS */


	$app->render('public/catalog/product.html',
		
		array( 

			'www' => WWW,
			'root' => ROOT,
			'product' => $template_data['items'],
			'tolerances' => $template_data['tolerances'],
			'fields' => $template_data['fields'],			
			'theads' => $template_data['theads']
		 )
    	
    );

    include_once VIEW_INC_DIR . 'public_footer.php';


})->via('GET','POST');

?>
