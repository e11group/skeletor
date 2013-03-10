<?php
namespace Skeletor\Controllers\API;

//-------------------------------------------------------------------------------------------------------------

    /**
     *
     * The Admin All Page Controller
     *
     *
    */


class Templates
{

       
    public static function retreiveAll() {

      //caching
      \Flight::etag('skeletor-admin-view-template');

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

      echo \Skeletor\Views\Admin\Layout\AllItems::load('Page', array());
   
    }


    public static function create($id) {

      //caching
      Flight::etag('skeletor-admin-edit-template');

      /* begin business logic

      */

      // grab view

      echo AdminAddView::load('Page', array());
   
    }


    public static function retreive($id) {

      //caching
      Flight::etag('skeletor-admin-edit-template');

      /* begin business logic

      */

      // grab view

      echo AdminEditView::load('Page', array());
   
    }


    public static function update($id) {

      //caching
      Flight::etag('skeletor-admin-edit-template');

      /* begin business logic

      */

      // grab view

      echo AdminEditView::load('Page', array());
   
    }

}

?>
