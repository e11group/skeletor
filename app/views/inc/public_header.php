<div class="row header">

	<div class="four columns mobile-four"><img src="<?php echo ROOT; ?>images/lt_header_logo.png" alt="Leader Tech: A Heico Company. A Passion in All We Do."></div>

	<div class="four columns offset-by-four hide-for-small">

		<div class="lt_header_teaser">
			<h5 class="leader">Questions?</h5>
			<h3 class="subheader phone">813.855.6921</h3>
			<h5 class="email"><a href="mailto:sales@leadertechinc.com">sales@leadertechinc.com</a></h5>
		      <div class="two columns offset-by-four">
                <a href="http://facebook.com/leadertech" target="_blank"><img src="<?php echo ROOT; ?>images/facebook.png" alt="Join Us on Facebook!" class="twelve">
                </a>
              </div>
               <div class="two columns">
                <a href="http://twitter.com/leadertech" target="_blank"><img src="<?php echo ROOT; ?>images/twitter.png" alt="Follow Us on Twitter!" class="twelve">
                </a>
              </div>
               <div class="two columns">
                <a href="http://youtube.com/user/LeaderTechInc" target="_blank"><img src="<?php echo ROOT; ?>images/youtube.png" alt="Watch Us on Youtube!" class="twelve">
                </a>
              </div>
              <div class="two columns">
                <a href="http://linkedin.com/leadertech" target="_blank"><img src="<?php echo ROOT; ?>images/linkedin.png" alt="Connect at LinkedIn!" class="twelve"
                </a>
              </div>
        </div>

	</div>

</div>

<div class="row">

<!--
	<div class="nine columns mobile-four">
		
		<ul class="header_nav clearfix">

			<li class="active"><a href="#">Home</a></li>
		
			<li class="drop"><a href="#">Our Company</a></li>
			
			<li class="drop"><a href="#">Our Products</a></li>

			<li><a href="#">In The Press</a></li>

			<li><a href="#">Contact Us</a></li>

		
		</ul>

	</div>

	<div class="three columns">


	</div>

-->

<?php $blog_active = empty($blog_menu_active) ? '' : 'class="active"'; ?>
<?php $home_active = empty($home_menu_active) ? '' : 'class="active"'; ?>
<?php $contact_active = empty($contact_menu_active) ? '' : 'class="active"'; ?>
<?php $products_active = empty($products_menu_active) ? '' : 'active"'; ?>
<?php $company_active = empty($company_menu_active) ? '' : 'active"'; ?>



</div>
<div class="row">
	<div class="twelve columns">
 <header role="banner" class="clearfix">
        <nav id="access" role="navigation">
            <!-- for screen readers -->
            <div class="skip-link"><a href="#content">Skip to content</a></div>
            <div class="menu">
                <ul class="sf-menu clearfix">
                		<li <?php echo $home_active; ?>><a href="<?php echo WWW; ?>">Home Page</a></li>
		
			<li class="drop <?php echo $company_active; ?>"><a class="toptab" href="javascript:;">Our Company</a>
 <ul class="sub-menu sub-class-1">
    <li><a href="#">Company</a></li>
 </ul>

            </li>
			
   <li class="drop <?php echo $products_active; ?>">
                        <a class="toptab" href="javascript:;" >Our Products</a>
                        <ul class="sub-menu sub-class-1">
                            
                            <?php 

                            $subcategory_arr = dibi::query('SELECT * FROM products_subcategory');

                            foreach ($subcategory_arr as $n => $row) {

                              $p_subcategory = formatForURL($row['name']);

                              $subcat_id = $row['id'];

                              $cat_id = $row['category'];

                              $category_arr = dibi::query('SELECT * FROM products_category WHERE id = ?', $cat_id);

                              foreach($category_arr as $n2 => $row2) {

                                  $p_category = formatForURL($row2['name']);

                              }

                              $p_category = isset($p_category) ? $p_category . '/' : '';
                              $p_subcategory = isset($p_category) ? $p_subcategory : '';




                                echo '<li><a href="'.WWW.'products/'.$p_category.$p_subcategory.'">' .$row['name']. '</a>

                                    <ul class="sub-menu">';


                                  $product_category_arr = dibi::query('SELECT * FROM products_product_category WHERE subcategory = ?', $subcat_id);

                                  foreach ($product_category_arr as $n3 => $row3) {

                                  $product_cat_id = $row3['id'];


                                     $products_arr = dibi::query('SELECT * FROM products_product WHERE product_category = ?', $product_cat_id);

                              foreach($products_arr as $n4 => $row4) {

                                  $p_product = '/' . formatForURL($row4['name']);

                                    echo  '<li><a href="'.WWW.'products/'.$p_category.$p_subcategory.$p_product.'">'.$row4['name'].'</a></li>';

                                     }

                                  }
                                  echo '  </ul>

                                </li>';
                            

                            }

                             ?>

                        </ul>
                    </li>
			<li <?php echo $blog_active; ?>><a href="<?php echo WWW . 'in-the-press'; ?>">In The Press</a></li>

			<li <?php echo $contact_active; ?>><a href="<?php echo WWW . 'contact'; ?>">Contact Us</a></li>
            <li>&nbsp;</li>
                 
                    <li><input class="header_search hide-for-small" type="text" placeholder="Search Text"></li>
                </ul>
            </div>
        </nav><!-- #access -->
    </header>
</div>
</div>

