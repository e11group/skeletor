<?php

/* home page */

include_once 'routes/home.php';

/* system */

include_once 'routes/dashboard/dashboard.php';
include_once 'routes/dashboard/account.php';
include_once 'routes/dashboard/password.php';

include_once 'routes/login/login.php';
include_once 'routes/login/logout.php';

/* examples of separate templates */

include_once 'routes/pages/templates.php';
include_once 'routes/pages/add_template.php';
include_once 'routes/pages/edit_template.php';
include_once 'routes/pages/delete_template.php';

include_once 'routes/blog/posts.php';
include_once 'routes/blog/add_post.php';
include_once 'routes/blog/edit_post.php';
include_once 'routes/blog/delete_post.php';

include_once 'routes/blog/categories.php';
include_once 'routes/blog/add_categories.php';
include_once 'routes/blog/edit_categories.php';
include_once 'routes/blog/delete_categories.php';

/* minimized into one */

include_once 'routes/blog/featured_video.php';

include_once 'routes/blog/related_links.php';

include_once 'routes/people/people.php';

include_once 'routes/pages/pages.php';

include_once 'routes/pages/modules.php';

include_once 'routes/products/categories.php';

include_once 'routes/products/product_category.php';

include_once 'routes/products/subcategories.php';

include_once 'routes/products/field_manager.php';

include_once 'routes/products/products.php';

include_once 'routes/products/product_numbers.php';

include_once 'routes/products/product_tolerances.php';




/* public */

include_once 'routes/public/catalog/subcategory.php';

include_once 'routes/public/catalog/product.php';

include_once 'routes/public/functional/contact.php';

include_once 'routes/public/functional/blog.php';

include_once 'routes/public/functional/grid.php';

include_once 'routes/public/functional/about.php';




/* Cron Jobs & Set Up Scripts */

include_once 'server/returnJSON.php';







?>