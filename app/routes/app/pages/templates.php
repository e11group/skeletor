<?php


$app->get('/pages/templates', function () use ($app) {

	$app->etag('lp-page-templates');
    $app->expires('+1 week');

    /* SIDEBAR TITLE */

	$template_page_active = 'true';
 	
 	/* MENU TYPE */
 	$menu_no = 'pages';

 	/* SUBHEADER */

 	$template_subheader = 'View All Page Templates';

 	/* INCLUDES */

	include_once VIEW_INC_DIR . 'head.php';

	include_once VIEW_INC_DIR . 'header.php';

	include_once INC_DIR . 'tablesorter_pager.php';

	include_once INC_DIR . 'page.php';

	include_once INC_DIR . 'subheader.php';

	include_once INC_DIR . 'admin_sidebar.php';

	$alert = '';
    
    $dbService = new dbService('pages_templates');

	$table_head = array('ID', 'Title', 'Edit', 'Delete');

  $page_categories = $dbService->selectAll('*');

    
    foreach ($page_categories as $n => $row) {

    	$id = htmlspecialchars($row['id']);
    	$title = htmlspecialchars($row['name']);

    	$table_body[] = '

    	<tr>
    	  <td>'.$id.'</td>
     	  <td>'.$title.'</td>
   		  <td><a href="'.WWW.'pages/templates/edit/'.$id.'" class="button tiny secondary">Edit</td>
    	  <td><a href="'.WWW.'pages/templates/delete/'.$id.'" class="button tiny secondary">Delete</td>
   		 </tr>

   		 ';

	}
    
   $template_data['table_head'] = new ArrayIterator( $table_head );

    $template_data['table_body'] = new ArrayIterator( $table_body );

	$app->render('templates/view_page.html',
		
		array( 

			'alert' => $alert,
			//'employees' => $template_data['employees'],
			'tablesorter_pager' => $tablesorter_pager,
			'www' => WWW,
			'sidebar' => $admin_sidebar,
			'subheader' => $template_subheader,
			'table_head' => $table_head,
			'table_body' => $table_body

		 )
    	
    );

    include_once VIEW_INC_DIR . 'footer.php';


})->via('GET','POST');

?>
