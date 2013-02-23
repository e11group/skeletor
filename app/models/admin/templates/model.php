<?php

//-------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------

    /**
     *
     * The Admin Page Templates
     *
     *
    */

    /*

      a template to create the URI via the CLI

    */




class SkeletorAdminModel  {


//-------------------------------------------------------------------------------------------------------------

    /**
     *
     * The Admin View Page Template
     *
     *
    */

       
    public static function adminViewTemplate() {

      //caching
      Flight::etag('skeletor-admin-view-template');

      // begin business logic //

  /*
      $dbService = new dbService('pages');

      $table_head = array('ID', 'Name', 'Edit', 'Delete');
   
      $page_categories = $dbService->selectAll('*');
    
      foreach ($page_categories as $n => $row) {

        $id = htmlspecialchars($row['id']);
        $title = htmlspecialchars($row['name']);

        $table_body[] = '

        <tr>
          <td>'.$id.'</td>
          <td>'.$title.'</td>
          <td><a href="'.WWW.'pages/edit/'.$id.'" class="button tiny secondary">Edit</td>
          <td><a href="'.WWW.'pages/delete/'.$id.'" class="button tiny secondary">Delete</td>
        </tr>

        ';

  }
    
  
    $template_data['table_head'] = new ArrayIterator( $table_head );

    $template_data['table_body'] = new ArrayIterator( $table_body );

         // grab view
*/
      echo Weather\Skeletor\AppService::loadViewTemplate('Page', array());
   
    }

 


//-------------------------------------------------------------------------------------------------------------

    /**
     *
     * The Admin Add Page Template
     *
     *
    */

       
    public static function adminAddTemplate($id) {

      //caching
      Flight::etag('skeletor-admin-add-template');

      /* insert business logic


      */




      // grab view
      echo Weather\Skeletor\AppService::loadAddTemplate('Page', array());
   
    }




//-------------------------------------------------------------------------------------------------------------

    /**
     *
     * The Admin Edit Page Template
     *
     *
    */

       
    public static function adminEditTemplate($id) {

      //caching
      Flight::etag('skeletor-admin-edit-template');

      /* begin business logic

      */

      // grab view

      echo Weather\Skeletor\AppService::loadEditTemplate('Page', array());
   
    }




//-------------------------------------------------------------------------------------------------------------

    /**
     *
     * The Admin Delete Page Template
     *
     *
    */

       
    public static function adminDeleteTemplate($id) {

      //caching
      Flight::etag('skeletor-admin-delete-template');

      /* begin business logic

      */

      // grab view

      echo Weather\Skeletor\AppService::loadDeleteTemplate('Page', array());
   
    }


      //-------------------------------------------------------------------------------------------------------------

    /**
     *
     * The Admin View Page Template
     *
     *
    */

    public static function adminAdd() { 




  $app->etag('lt-add_pages');
    $app->expires('+1 week');

    $now = time();

    /* SIDEBAR TITLE */

  $add_pages_active = 'true';
  
  /* MENU TYPE */
  $menu_no = 'pages';

  /* SUBHEADER */

  $template_subheader = 'Add a New Page';

  /* LEGEND */

  $template_legend = 'Page Information';

  /* FORM INFO */

  $form_name = 'add_pages';

  $submit_name = 'submit_pages';

  $submit_value = 'Save New Page';

  /* UPLOAD FLAG */

  $upload_flag_set = null;

  $upload_flag = empty($upload_flag_set) ? '' : '<span id="upload-flag"></span>';

   /* TEMPLATE + COPY */

   $page_object_name = 'Page';


  /* INCLUDES */

  include_once VIEW_INC_DIR . 'head.php';

  include_once VIEW_INC_DIR . 'header.php';

  include_once INC_DIR . 'page.php';

  include_once INC_DIR . 'subheader.php';

  include_once INC_DIR . 'admin_sidebar.php';

  $alert = '';

    ///*** END HEADER END ***////


  $dbService = new dbService('pages');

  $formService = new formService('add_page_');

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
  
    $formService->makeInput('name', 'Enter Page Name: '),
    $formService->makeSelect('template', 'Select Template: ', $select_category_options)

    );

   $template_data['form'] = new ArrayIterator( $forms_arr ); 



  if($app->request()->isPost() && sizeof($app->request()->post()) >= 1)
    
    {

      $post = (object)$app->request()->post();

      $add_page_name = mysql_real_escape_string($post->add_page_name);
      $add_page_template = mysql_real_escape_string($post->add_page_template);



      $insert_arr = array(

          'name' => $add_page_name,
          'template' => $add_page_template,

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
      'modal_link' => WWW . 'pages',

     )
      
    );

    include_once VIEW_INC_DIR . 'footer.php';


    }


}


	


?>
