<?php
namespace Weather\Skeletor\Controllers\Items;

//-------------------------------------------------------------------------------------------------------------

    /**
     *
     * The Admin All Page Controller
     *
     *
    */


class Items
{

       
    public static function get_items_page() {

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

      echo \Weather\Skeletor\Views\Items\Items::load_page('Page', array());
   
    }


}

?>
