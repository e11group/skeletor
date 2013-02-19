
<?php 

$admin_sidebar = '
<div class="two columns">
<ul class="twelve side-nav">';

if ($menu_no == 'pages') {

  $admin_sidebar .= isset($template_page_active) ? '<li class="active">' : '<li>';
  $admin_sidebar .= '<a href="'.WWW.'pages/templates">Templates</a></li>';
  
  $admin_sidebar .= isset($add_template_page_active) ? '<li class="active">' : '<li>';
  $admin_sidebar .= '<a href="'.WWW.'pages/templates/add"> Add Template</a></li>';

  $admin_sidebar .= '<li class="divider"></li>';

  $admin_sidebar .= isset($template_modules_page_active) ? '<li class="active">' : '<li>';
  $admin_sidebar .= '<a href="'.WWW.'pages/templates/modules"> Template Modules</a></li>';

  $admin_sidebar .= isset($template_add_modules_page_active) ? '<li class="active">' : '<li>';
  $admin_sidebar .= '<a href="'.WWW.'pages/templates/modules/add"> Add Template Module</a></li>';

  $admin_sidebar .= '<li class="divider"></li>';

  $admin_sidebar .= isset($pages_active) ? '<li class="active">' : '<li>';
  $admin_sidebar .= '<a href="'.WWW.'pages">Pages</a></li>';
  
  $admin_sidebar .= isset($add_pages_active) ? '<li class="active">' : '<li>';
  $admin_sidebar .= '<a href="'.WWW.'pages/add">Add Page</a></li>';

}

elseif ($menu_no == 'blog') {

  $admin_sidebar .= isset($blog_categories_page_active) ? '<li class="active">' : '<li>';
  $admin_sidebar .= '<a href="'.WWW.'blog/categories">Categories</a></li>';
  
  $admin_sidebar .= isset($add_blog_category_page_active) ? '<li class="active">' : '<li>';
  $admin_sidebar .= '<a href="'.WWW.'blog/categories/add"> Add Categories</a></li>';

  $admin_sidebar .= '<li class="divider"></li>';

  $admin_sidebar .= isset($blog_posts_active) ? '<li class="active">' : '<li>';
  $admin_sidebar .= '<a href="'.WWW.'blog/posts">Posts</a></li>';
  
  $admin_sidebar .= isset($add_blog_post_active) ? '<li class="active">' : '<li>';
  $admin_sidebar .= '<a href="'.WWW.'blog/posts/add">Add Post</a></li>';


}


elseif ($menu_no == 'featured_video') {

  $admin_sidebar .= isset($featured_active) ? '<li class="active">' : '<li>';
  $admin_sidebar .= '<a href="'.WWW.'featured_video">Featured Video</a></li>';
  
  $admin_sidebar .= isset($add_featured_active) ? '<li class="active">' : '<li>';
  $admin_sidebar .= '<a href="'.WWW.'featured_video/add">Add Featured Video</a></li>';

}


elseif ($menu_no == 'related_links') {

  $admin_sidebar .= isset($related_links_active) ? '<li class="active">' : '<li>';
  $admin_sidebar .= '<a href="'.WWW.'related_links">Related Links</a></li>';
  
  $admin_sidebar .= isset($add_related_links_active) ? '<li class="active">' : '<li>';
  $admin_sidebar .= '<a href="'.WWW.'related_links/add">Add Related Link</a></li>';

}


elseif ($menu_no == 'people') {

  $admin_sidebar .= isset($people_active) ? '<li class="active">' : '<li>';
  $admin_sidebar .= '<a href="'.WWW.'people">People</a></li>';
  
  $admin_sidebar .= isset($add_people_active) ? '<li class="active">' : '<li>';
  $admin_sidebar .= '<a href="'.WWW.'people/add">Add Person</a></li>';

}

elseif ($menu_no == 'products') {

      $admin_sidebar .= '<li class="divider"></li>';


  $admin_sidebar .= isset($categories_active) ? '<li class="active">' : '<li>';
  $admin_sidebar .= '<a href="'.WWW.'products/categories">Categories</a></li>';
  
  $admin_sidebar .= isset($add_categories_active) ? '<li class="active">' : '<li>';
  $admin_sidebar .= '<a href="'.WWW.'products/categories/add">Add Category</a></li>';

    $admin_sidebar .= '<li class="divider"></li>';


  $admin_sidebar .= isset($subcategories_active) ? '<li class="active">' : '<li>';
  $admin_sidebar .= '<a href="'.WWW.'products/subcategories">Subcategories</a></li>';
  
  $admin_sidebar .= isset($add_subcategories_active) ? '<li class="active">' : '<li>';
  $admin_sidebar .= '<a href="'.WWW.'products/subcategories/add">Add Subcategory</a></li>';


  $admin_sidebar .= '<li class="divider"></li>';

    $admin_sidebar .= isset($product_categories_active) ? '<li class="active">' : '<li>';
  $admin_sidebar .= '<a href="'.WWW.'products/product_categories">Product Categories</a></li>';
  
  $admin_sidebar .= isset($add_product_categories_active) ? '<li class="active">' : '<li>';
  $admin_sidebar .= '<a href="'.WWW.'products/product_categories/add">Add Product Category</a></li>';

  $admin_sidebar .= '<li class="divider"></li>';

  $admin_sidebar .= isset($product_active) ? '<li class="active">' : '<li>';
  $admin_sidebar .= '<a href="'.WWW.'products">Products</a></li>';
  
  $admin_sidebar .= isset($add_product_active) ? '<li class="active">' : '<li>';
  $admin_sidebar .= '<a href="'.WWW.'products/add">Add Products</a></li>';

  $admin_sidebar .= '<li class="divider"></li>';
  
  $admin_sidebar .= isset($field_manager_active) ? '<li class="active">' : '<li>';
  $admin_sidebar .= '<a href="'.WWW.'products/field_manager">Field Manager</a></li>';
  
  $admin_sidebar .= isset($add_field_manager_active) ? '<li class="active">' : '<li>';
  $admin_sidebar .= '<a href="'.WWW.'products/field_manager/add">Add Field Sets</a></li>';

  $admin_sidebar .= '<li class="divider"></li>';

  $admin_sidebar .= isset($product_numbers_active) ? '<li class="active">' : '<li>';
  $admin_sidebar .= '<a href="'.WWW.'product_numbers">Product Numbers</a></li>';
  
  $admin_sidebar .= isset($add_product_numbers_active) ? '<li class="active">' : '<li>';
  $admin_sidebar .= '<a href="'.WWW.'product_numbers/add">Add Product Numbers</a></li>';

  $admin_sidebar .= '<li class="divider"></li>';

  $admin_sidebar .= isset($product_tolerances_active) ? '<li class="active">' : '<li>';
  $admin_sidebar .= '<a href="'.WWW.'product_tolerances">Tolerances</a></li>';
  
  $admin_sidebar .= isset($add_product_tolerances_active) ? '<li class="active">' : '<li>';
  $admin_sidebar .= '<a href="'.WWW.'product_tolerances/add">Add Tolerance</a></li>';



}


$admin_sidebar .= '<li class="divider"></li>
  <li><a href="javascript:;" onclick="history.go(-1)">Back</a></li>
  <li><a href="{{www}}logout">Logout</a></li>';

$admin_sidebar .= '</ul></div>';
?>

