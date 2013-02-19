<?php


/********* VIEW PAGE ********/


$app->get('/pages/templates/modules', function () use ($app) {

	$app->etag('lt-modules');
    $app->expires('+1 week');

    /* SIDEBAR TITLE */

	$template_modules_page_active = 'true';
 	
 	/* MENU TYPE */
 	$menu_no = 'pages';

 	/* SUBHEADER */

 	$template_subheader = 'View All Modules';

 	/* INCLUDES */

	include_once VIEW_INC_DIR . 'head.php';

	include_once VIEW_INC_DIR . 'header.php';

	include_once INC_DIR . 'tablesorter_pager.php';

	include_once INC_DIR . 'page.php';

	include_once INC_DIR . 'subheader.php';

	include_once INC_DIR . 'admin_sidebar.php';

	$alert = '';

	///*** END HEADER END ***////
  
  $dbService = new dbService('pages_templates_modules');

	$table_head = array('ID', 'Name', 'Edit', 'Delete');
	 

  $page_categories = $dbService->selectAll('*');
    
    foreach ($page_categories as $n => $row) {

    	$id = htmlspecialchars($row['id']);
    	$title = htmlspecialchars($row['name']);

    	$table_body[] = '

    	<tr>
    	  <td>'.$id.'</td>
     	  <td>'.$title.'</td>
   		  <td><a href="'.WWW.'pages/templates/modules/edit/'.$id.'" class="button tiny secondary">Edit</td>
    	  <td><a href="'.WWW.'pages/templates/modules/delete/'.$id.'" class="button tiny secondary">Delete</td>
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
			'table_head' => $template_data['table_head'],
			'table_body' => $template_data['table_body']

		 )
    	
    );

    include_once VIEW_INC_DIR . 'footer.php';


})->via('GET','POST');




/********* ADD PAGE ********/



$app->get('/pages/templates/modules/add', function () use ($app) {

	$app->etag('lt-add_modules');
    $app->expires('+1 week');

    $now = time();

    /* SIDEBAR TITLE */

	$template_add_modules_page_active = 'true';
 	
 	/* MENU TYPE */
 	$menu_no = 'pages';

 	/* SUBHEADER */

 	$template_subheader = 'Add a New Module';

 	/* LEGEND */

 	$template_legend = 'Module Data';

 	/* FORM INFO */

 	$form_name = 'add_modules';

 	$submit_name = 'submit_modules';

 	$submit_value = 'Save New Module';

 	/* UPLOAD FLAG */

 	$upload_flag_set = 'true';

 	$upload_flag = empty($upload_flag_set) ? '' : '<span id="upload-flag"></span>';

 	 /* TEMPLATE + COPY */

 	 $page_object_name = 'Module';


 	/* INCLUDES */

	include_once VIEW_INC_DIR . 'head.php';

	include_once VIEW_INC_DIR . 'header.php';

	include_once INC_DIR . 'page.php';

	include_once INC_DIR . 'subheader.php';

	include_once INC_DIR . 'admin_sidebar.php';

	$alert = '';

		///*** END HEADER END ***////


  $dbService = new dbService('pages_templates_modules');

  $formService = new formService('add_module_');

  $dbBlogCategories = new dbService('pages_templates');

   $result = $dbBlogCategories->selectAll('*');

    $select_category_options[] = array(
		'value' => '',
        'name' => 'Please Select A Category',
        'active' => false
        );

	foreach ($result as $n => $row) {
	
	$select_category_options[] = array(
		'value' => $row['id'],
        'name' => $row['name'],
        'active' => false
        );
	}
	$forms_arr = array(
 	
		$formService->makeInput('name', 'Enter Module Name: '),
		$formService->makeSelect('template', 'Select Template: ', $select_category_options),
    $formService->makeTextArea('text', 'Enter Module Text', '', 'true'),
    $formService->makeUpload('image', 'Upload Image', time()),
    $formService->makeInput('link_name', 'Link Name: '),
    $formService->makeInput('link_href', 'Link URL: ')

		);

   $template_data['form'] = new ArrayIterator( $forms_arr ); 



	if($app->request()->isPost() && sizeof($app->request()->post()) >= 1)
    
    {

      $post = (object)$app->request()->post();

      $add_module_name = mysql_real_escape_string($post->add_module_name);
      $add_module_template = mysql_real_escape_string($post->add_module_template);



      $insert_arr = array(

      		'name' => $add_module_name,
      		'template' => $add_module_template,
          'text' => $post->add_module_text,
          'image' => mysql_real_escape_string($post->post_uid),
          'image_ext' => mysql_real_escape_string($post->post_ext),
          'link_name' => mysql_real_escape_string($post->add_module_link_name),
          'link_href' => mysql_real_escape_string($post->add_module_link_href),

      	);

      $insert = $dbService->insert($insert_arr);

      if ($insert == 1) {
      	
      			$modal_head = 'Success!';
              
              	$modal_subhead = 'The form has been succesfully submitted!';
          
              	$modal_text = 'You created a new '.$page_object_name.'.';

                include(INC_DIR . 'modal.php');           

      } 

      else {

      			$modal_head = 'There was an error!';
              
                $modal_subhead = 'The form was not submitted!';
          
                $modal_text = 'A new '.$page_object_name.' was not created';

                include(INC_DIR . 'modal.php');

      }
 
  	}

	$app->render('templates/add_page.html',
		
		array( 

			'alert' => $alert,
			'www' => WWW,
			'root' => ROOT,
			'sidebar' => $admin_sidebar,
			'subheader' => $template_subheader,
			'upload_flag' => $upload_flag,
			'legend' => $template_legend,
			'form' => $template_data['form'],
			'form_name' => $form_name,
			'submit_name' => $submit_name,
			'submit_value' => $submit_value,
			'modal_head' => $modal_head,
			'modal_subhead' => $modal_subhead,
			'modal_text' => $modal_text,
			'modal_link' => WWW . 'pages/templates/modules',

		 )
    	
    );

    include_once VIEW_INC_DIR . 'footer.php';


})->via('GET','POST');


/********* EDIT PAGE ********/


$app->get('/pages/templates/modules/edit/:id', function ($id) use ($app) {

	$app->etag('lt-edit_modules');
    $app->expires('+1 week');

    $now = time();

    /* SIDEBAR TITLE */

	$template_modules_page_active = 'true';
 	
 	/* MENU TYPE */
 	$menu_no = 'pages';

 	/* SUBHEADER */

 	$template_subheader = 'Edit Module';
 	/* LEGEND */

 	$template_legend = 'Module Data';

 	/* FORM INFO */

 	$form_name = 'edit_modules';

 	$submit_name = 'submit_modules';

 	$submit_value = 'Edit Module';

 	/* UPLOAD FLAG */

 	$upload_flag_set = 'true';

 	$upload_flag = empty($upload_flag_set) ? '' : '<span id="upload-flag"></span>';


 	/* TEMPLATE + COPY */

  	$page_object_name = 'Module';

 	/* INCLUDES */

	include_once VIEW_INC_DIR . 'head.php';

	include_once VIEW_INC_DIR . 'header.php';

	include_once INC_DIR . 'page.php';

	include_once INC_DIR . 'subheader.php';

	include_once INC_DIR . 'admin_sidebar.php';

	$alert = '';

    $dbService = new dbService('pages_templates_modules');

    $formService = new formService('edit_module_');

    $select = $dbService->selectSingle('*', 'id', $id);

    if ($select) {

    	foreach ($select as $n => $row) {

    		$module_name = htmlspecialchars($row['name']);	
    		$module_template = htmlspecialchars($row['template']);
        $module_text = $row['text'];
        $module_id = $row['image'];
        $module_ext = $row['image_ext'];
        $module_link_name = $row['link_name'];
        $module_link_href = $row['link_href'];


    	}

    }
$dbBlogCategories = new dbService('pages_templates');

    $select = $dbService->selectSingle('*', 'id', $id);

    $result = $dbBlogCategories->selectAll('*');

    if ($select) {

    	$select_category_options[] = array(
		'value' => '',
        'name' => 'Please Select A Category',
        'active' => false
        );

    	foreach ($select as $n => $row) {

    		$post_name = htmlspecialchars($row['name']);	
    		$post_category = htmlspecialchars($row['template']);

    		foreach ($result as $n => $row2) {
	
				if ($row2['id'] == $post_category) {

					$select_category_options[] = array(
						'value' => $row2['id'],
        				'name' => $row2['name'],
        				'active' => '1'

        			);
        		} else {

					$select_category_options[] = array(
						'value' => $row2['id'],
        				'name' => $row2['name'],
        				'active' => null

        			);


        		}
			}

    	}

    }


	$forms_arr = array(
 	
		$formService->makeInput('name', 'Module Name: ', $module_name),
    $formService->makeSelect('template', 'Select Template: ', $select_category_options),
    $formService->makeTextArea('text', 'Module Text', $module_text, 'true'),
    $formService->makeImage('image', 'Current Image: ', $module_id, $module_ext),
    //$formService->makeUpload('upload-image', 'Upload Image', time()),
    $formService->makeInput('link_name', 'Link Name: ', $module_link_name),
    $formService->makeInput('link_href', 'Link URL: ', $module_link_href),


		);

   $template_data['form'] = new ArrayIterator( $forms_arr ); 



	if($app->request()->isPost() && sizeof($app->request()->post()) >= 1)
    
    {

      $post = (object)$app->request()->post();

      $update_arr = array(

      		'name' => mysql_real_escape_string($post->edit_module_name),
      		'template' => mysql_real_escape_string($post->edit_module_template),
          'text' => $post->edit_module_text,
          'image' => mysql_real_escape_string($post->post_uid),
          'image_ext' => mysql_real_escape_string($post->post_ext),
          'link_name' => mysql_real_escape_string($post->edit_module_link_name),
          'link_href' => mysql_real_escape_string($post->edit_module_link_href),

      	);

      $update = $dbService->update($update_arr, 'id', $id);

      if ($update == 1) {
      	
      			$modal_head = 'Success!';
              
              	$modal_subhead = 'The form has been succesfully submitted!';
          
              	$modal_text = 'You updated a '.$page_object_name.'.';

                include(INC_DIR . 'modal.php');           

      } 

      else {

      			$modal_head = 'There was an error!';
              
                $modal_subhead = 'The form was not submitted!';
          
                $modal_text = 'The '.$page_object_name.' was not updated';

                include(INC_DIR . 'modal.php');

      }
 
  	}

	$app->render('templates/add_page.html',
		
		array( 

			'alert' => $alert,
			'www' => WWW,
			'sidebar' => $admin_sidebar,
			'subheader' => $template_subheader,
			'upload_flag' => $upload_flag,
			'legend' => $template_legend,
			'form' => $template_data['form'],
			'form_name' => $form_name,
			'submit_name' => $submit_name,
			'submit_value' => $submit_value,
			'modal_head' => $modal_head,
			'modal_subhead' => $modal_subhead,
			'modal_text' => $modal_text,
			'modal_link' => WWW . 'pages/templates/modules',

		 )
    	
    );

    include_once VIEW_INC_DIR . 'footer.php';


})->via('GET','POST');


/********* DELETE PAGE ********/



$app->get('/pages/templates/modules/delete/:id', function ($id) use ($app) {


  /* TEMPLATE + COPY */

  $page_object_name = 'Module';

  /* INCLUDES */

  include_once VIEW_INC_DIR . 'head.php';

  include_once VIEW_INC_DIR . 'header.php';

  include_once INC_DIR . 'page.php';

  include_once INC_DIR . 'subheader.php';


  $now = time();

	$alert = '';
  
  $dbService = new dbService('pages_templates_modules');


	if($app->request()->isPost() && sizeof($app->request()->post()) >= 1)
    {

      $post = (object)$app->request()->post();

      $delete = $dbService->delete('id', $id);

      if($delete == 1) {

          	$modal_form = '';

          	$modal_head = 'Success!';
              
            $modal_subhead = 'The form has been submitted!';
          
            $modal_text = 'The '.$page_object_name.' has been deleted.';

            include(INC_DIR . 'modal.php');              

          }

          else {

          	$modal_form = '';

          	$modal_head = 'There was an error!';
              
            $modal_subhead = 'The form was not submitted!';
          
            $modal_text = ' ';

            include(INC_DIR . 'modal.php');
          
          }

    } else {

          $modal_head = 'Warning!';
              
          $modal_subhead = 'You are about to delete a '.$page_object_name.'?';
          
          $modal_text = 'Are you sure?';

          $modal_form = '<input type="submit" class="button" value="Delete">';

          include(INC_DIR . 'modal.php');              

    }

      
	$app->render('templates/delete_page.html',
		
		array( 

			'alert' => $alert,
			'www' => WWW,
     		'root' => ROOT,
		    'modal_head' => $modal_head,
			'modal_subhead' => $modal_subhead,
			'modal_text' => $modal_text,
     	    'modal_form' => $modal_form,
			'modal_link' => WWW . 'pages/templates/modules',
			'time' => $now

		 )
    	
    );

    include_once VIEW_INC_DIR . 'footer.php';


})->via('GET','POST');





?>
