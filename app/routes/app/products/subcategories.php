<?php


/********* VIEW PAGE ********/


$app->get('/products/subcategories', function () use ($app) {

	$app->etag('lt-subcategories');
    $app->expires('+1 week');

    /* SIDEBAR TITLE */

	$subcategories_active = 'true';
 	
 	/* MENU TYPE */
 	$menu_no = 'products';

 	/* SUBHEADER */

 	$template_subheader = 'View All Subcategories';

 	/* INCLUDES */

	include_once VIEW_INC_DIR . 'head.php';

	include_once VIEW_INC_DIR . 'header.php';

	include_once INC_DIR . 'tablesorter_pager.php';

	include_once INC_DIR . 'page.php';

	include_once INC_DIR . 'subheader.php';

	include_once INC_DIR . 'admin_sidebar.php';

	$alert = '';

	///*** END HEADER END ***////
  
  $dbService = new dbService('products_subcategory');

	$table_head = array('ID', 'Name', 'Category', 'Edit', 'Delete');
	 
  $page_subcategories = $dbService->selectAll('*');
    
    foreach ($page_subcategories as $n => $row) {

    	$id = htmlspecialchars($row['id']);
    	$title = htmlspecialchars($row['name']);
      $cat_id = htmlspecialchars($row['category']);

      $dbBlogCategories = new dbService('products_category');

      $result = $dbBlogCategories->selectSingle('*', 'id', $cat_id);
      
      $category = '';

   foreach ($result as $n2 => $row2) {
    $category = $row2['name'];
  }

    	$table_body[] = '

    	<tr>
    	  <td>'.$id.'</td>
     	  <td>'.$title.'</td>
        <td>'.$category.'</td>
   		  <td><a href="'.WWW.'products/subcategories/edit/'.$id.'" class="button tiny secondary">Edit</td>
    	  <td><a href="'.WWW.'products/subcategories/delete/'.$id.'" class="button tiny secondary">Delete</td>
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



$app->get('/products/subcategories/add', function () use ($app) {

	$app->etag('lt-add_subcategories');
    $app->expires('+1 week');

    $now = time();

    /* SIDEBAR TITLE */

	$add_subcategories_active = 'true';
 	
 	/* MENU TYPE */
 	$menu_no = 'products';

 	/* SUBHEADER */

 	$template_subheader = 'Add a New Subcategory';

 	/* LEGEND */

 	$template_legend = 'Subcategory Information';

 	/* FORM INFO */

 	$form_name = 'add_subcategories';

 	$submit_name = 'submit_subcategories';

 	$submit_value = 'Save New Subcategory';

 	/* UPLOAD FLAG */

 	$upload_flag_set = null;

 	$upload_flag = empty($upload_flag_set) ? '' : '<span id="upload-flag"></span>';

 	 /* TEMPLATE + COPY */

 	 $page_object_name = 'Subcategory';


 	/* INCLUDES */

	include_once VIEW_INC_DIR . 'head.php';

	include_once VIEW_INC_DIR . 'header.php';

	include_once INC_DIR . 'page.php';

	include_once INC_DIR . 'subheader.php';

	include_once INC_DIR . 'admin_sidebar.php';

	$alert = '';

		///*** END HEADER END ***////


  $dbService = new dbService('products_subcategory');

	$formService = new formService('add_subcategory_');

  $dbBlogCategories = new dbService('products_category');

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
 	
		$formService->makeInput('name', 'Subcategory Name: '),
    $formService->makeSelect('category', 'Category Name: ', $select_category_options),
    $formService->makeInput('video', 'Video Link: '),
    $formService->makeTextArea('description', 'Description: ', '', 'true')


		);

   $template_data['form'] = new ArrayIterator( $forms_arr ); 



	if($app->request()->isPost() && sizeof($app->request()->post()) >= 1)
    
    {

      $post = (object)$app->request()->post();
 
      $insert_arr = array(

      		'name' => mysql_real_escape_string($post->add_subcategory_name),
          'category' => mysql_real_escape_string($post->add_subcategory_category),
          'description' => mysql_real_escape_string($post->add_subcategory_description),
          'video' => mysql_real_escape_string($post->add_subcategory_video)

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
			'modal_link' => WWW . 'products/subcategories',

		 )
    	
    );

    include_once VIEW_INC_DIR . 'footer.php';


})->via('GET','POST');


/********* EDIT PAGE ********/


$app->get('/products/subcategories/edit/:id', function ($id) use ($app) {

	$app->etag('lt-edit_subcategories');
    $app->expires('+1 week');

    $now = time();

    /* SIDEBAR TITLE */

	$subcategories_active = 'true';
 	
 	/* MENU TYPE */
 	$menu_no = 'products';

 	/* SUBHEADER */

 	$template_subheader = 'Edit Subcategory';
 	/* LEGEND */

 	$template_legend = 'Subcategory Information';

 	/* FORM INFO */

 	$form_name = 'edit_subcategories';

 	$submit_name = 'submit_subcategories';

 	$submit_value = 'Edit Subcategory';

 	/* UPLOAD FLAG */

 	$upload_flag_set = null;

 	$upload_flag = empty($upload_flag_set) ? '' : '<span id="upload-flag"></span>';


 	/* TEMPLATE + COPY */

  	$page_object_name = 'Subcategory';

 	/* INCLUDES */

	include_once VIEW_INC_DIR . 'head.php';

	include_once VIEW_INC_DIR . 'header.php';

	include_once INC_DIR . 'page.php';

	include_once INC_DIR . 'subheader.php';

	include_once INC_DIR . 'admin_sidebar.php';

	$alert = '';

    $dbService = new dbService('products_subcategory');

    $formService = new formService('edit_subcategory_');

    $dbBlogCategories = new dbService('products_category');

    $select = $dbService->selectSingle('*', 'id', $id);

    $result = $dbBlogCategories->selectAll('*');

    if ($select) {

      $select_category_options[] = array(
    'value' => '',
        'name' => 'Please Select A Category',
        'active' => false
        );

      foreach ($select as $n => $row) {

        $post_category = htmlspecialchars($row['category']);
        $subcategory_name = htmlspecialchars($row['name']);
        $subcategory_description = htmlspecialchars($row['description']); 
        $subcategory_video = htmlspecialchars($row['video']); 
        $subcategory_image = $row['image'];
        $subcategory_ext = $row['image_ext'];


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
 	
		$formService->makeInput('name', 'Subcategory Name: ', $subcategory_name),
    $formService->makeSelect('category', 'Category Name: ', $select_category_options),
    $formService->makeInput('video', 'Video Link: ', $subcategory_video),
    $formService->makeTextArea('description', 'Description: ', $subcategory_description, 'true'),
    $formService->makeImage('current_image', 'Current Image:', $subcategory_image, $subcategory_ext),
    $formService->makeUpload('image', 'Replace Image: ', $now)



		);

   $template_data['form'] = new ArrayIterator( $forms_arr ); 



	if($app->request()->isPost() && sizeof($app->request()->post()) >= 1)
    
    {

      $post = (object)$app->request()->post();

      $update_arr = array(

      		'name' => mysql_real_escape_string($post->edit_subcategory_name),
          'category' => mysql_real_escape_string($post->edit_subcategory_category),
          'description' => $post->edit_subcategory_description,
          'video' => $post->edit_subcategory_video


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
			'modal_link' => WWW . 'products/subcategories',

		 )
    	
    );

    include_once VIEW_INC_DIR . 'footer.php';


})->via('GET','POST');


/********* DELETE PAGE ********/



$app->get('/products/subcategories/delete/:id', function ($id) use ($app) {


  /* TEMPLATE + COPY */

  $page_object_name = 'Subcategory';

  /* INCLUDES */

  include_once VIEW_INC_DIR . 'head.php';

  include_once VIEW_INC_DIR . 'header.php';

  include_once INC_DIR . 'page.php';

  include_once INC_DIR . 'subheader.php';


  $now = time();

	$alert = '';
  
  $dbService = new dbService('products_subcategory');


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
			'modal_link' => WWW . 'products/subcategories',
			'time' => $now

		 )
    	
    );

    include_once VIEW_INC_DIR . 'footer.php';


})->via('GET','POST');





?>
