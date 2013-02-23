<?php
/*
$app->get('/server/returnJSON/:value', function ($value = 1) use ($app) {

	 $response = $app->response();
    $response['Content-Type'] = 'application/json';

	$dbService = new dbService('products_product');
	$select = $dbService->query('SELECT * FROM products_product_fields WHERE product = ?', $value);
	
	foreach ($select as $n=>$row) {
		$items[] = array('name' => $row['name'], 'order' => $row['order'], 'product' => $row['product']);
	}  

    echo json_encode(array('orders' => $items));

    exit();

})->via('GET','POST');
*/
?>
