<?php
namespace Skeletor\Views\Admin\Layout;

//-------------------------------------------------------------------------------------------------------------

    /**
     *
     * The Admin Add Page Model
     *
     *
    */


class AddItem

{


    public static function load($page_name, $page_variables) 
    {
      
      // main view body
      \Flight::render("templates/view_page_body.html", $page_variables, 'body_content');

      // required admin header nav 
      \Flight::render('layout/admin_header.html', array('heading' => 'Hello'), 'header_content');

      // optional subheader template component
      \Flight::render('layout/admin_subheader.html', array('heading' => 'Hello'), 'subheader_content');
      
      // required admin sidebar
    //  \Flight::render('layout/admin_sidebar.html', array('heading' => 'Hello'), 'sidebar_content');

      // required admin footer
      \Flight::render('layout/admin_footer.html', array('footer' => 'World'), 'footer_content');

      /* add any additional template components here

      

      */

      // main admin layout
      \Flight::render('layout/admin_layout.html', array('title' => 'Home Page'));
    }



}