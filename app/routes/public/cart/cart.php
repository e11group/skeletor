<?php

use \Cart\Cart_Manager;
use \Cart\Cart_Proxy as Cart;
$app->get('/cart', function () use ($app) {


	include_once VIEW_INC_DIR . 'public_head.php';

	include_once VIEW_INC_DIR . 'public_header.php';

	include_once INC_DIR . 'sidebar.php';

?>      
        <div class="row">
            <div class="twelve columns">

            <?php if (isset($_SESSION["action_msg"])) : //show action message ?>
            <div class="alert-box success"><strong>Action Complete!</strong> <?php echo $_SESSION["action_msg"] ?></div>
            <?php
            unset($_SESSION["action_msg"]); //only show message once
            endif;
            ?>

            <h2>Shopping Cart</h2>
            <div id="cart">
                <?php if (Cart::item_count() > 0) : ?>
                <table class="table twelve" id="cart-table">
                    <thead>
                        <th scope="col">Product</th>
                        <th scope="col" class="options">Options</th>
                        <th scope="col" class="quantity">Quantity</th>
                        <th scope="col" class="price">Price (ex. Tax)</th>
                        <!--<th scope="col" class="tax">Tax</th>-->
                        <th scope="col" class="total">Total</th>
                        <th scope="col" class="remove">Delete</th>
                    </thead>
                    <tbody>
                        <?php foreach (Cart::items() as $item) : ?>
                        <tr>
                            <td><?php echo $item->get_name(); ?></td>
                            <td class="options">
                                <?php
                                if ($item->get_options()) {
                                    foreach ($item->get_options() as $opt => $val) {
                                        echo "<strong>" . ucwords($opt) . ":</strong> " . ucwords($val) . "<br />";
                                    }
                                }
                                else {
                                    echo " - ";
                                }
                                ?>
                            </td>
                            <td class="quantity">
                                <form action="?action=update_quantity&item=<?php echo $item->uid(); ?>" method="post">
                                    <input type="text" name="quantity" value="<?php echo $item->get_quantity(); ?>" class="span1" />
                                    <input type="submit" value="Update" class="btn" />
                                </form>
                            </td>
                            <td class="price">&#36;<?php echo $item->single_price(true); ?></td>
                         <!--   <td class="tax">&#36;<?php // echo $item->single_tax(); ?></td>-->
                            <td class="total"><strong>&#36;<?php echo $item->total_price(); ?></strong></td>
                            <td>
                                <a href="?action=remove&item=<?php  echo $item->uid(); ?>" class="button tiny">x</a>
                            </td>
                        </tr>
                        <?php if ($item->has_meta("has_engraving")) : ?>
                        <tr>
                            <td colspan="7" class="engraving-text-row">
                                <?php if ($item->get_meta("has_engraving")) : ?>
                                <label>Engraving Text For <strong><?php echo $item->get_name(); ?></strong></label>
                                <form action="?action=update_engraving&item=<?php echo $item->uid() ?>" method="post">
                                    <input type="text" name="engraving_text" value="<?php echo $item->get_meta("engraving_text") ?>" class="span8">
                                    <input type="submit" value="Update Engraving Text" class="btn" />
                                    <br />
                                    <a href="?action=remove_engraving&item=<?php echo $item->uid() ?>">Remove Engraving</a>
                                </form>
                                <?php else : ?>
                                    <a href="?action=add_engraving&item=<?php echo $item->uid() ?>" class="btn">Add Engraving For <strong><?php echo $item->get_name(); ?></strong></a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4"></td>
                            <td><strong>Total Weight:</strong></td>
                            <?php
                            //if over 1000g round up to nearest KG
                            $weight = Cart::cumulative_weight();
                            if ($weight  < 1000) {
                                $weight_str = $weight . "g";
                            }
                            else {
                                $weight_str = round($weight / 1000) . "kg";
                            }
                            ?>
                            <td><?php echo $weight_str; ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                            <td><strong>Tax:</strong></td>
                            <td>&#36;<?php echo Cart::total_tax(); ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                            <td><strong>Total:</strong></td>
                            <td>&#36;<?php echo Cart::total(); ?></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
                <div>
                    <form action="?action=update_merchant_notes" method="post">
                        <label>Leave any notes for the merchant to read here. <a href="?action=clear_notes">Clear Notes</a> </label>
                        <textarea class="span6" rows="5" name="merchant_notes"><?php echo Cart::get_meta("merchant_notes") ?></textarea>
                        <input type="submit" class="button small" value="Update Notes" />

                    </form>
<!--
                    <form action="checkout" method="post">

                    <input type="hidden" name="{{csrf_key}}" value="{{csrf_token}}">

                    <input type="submit" class="large" value="Checkout" style="float:right; background: #000; border:0; padding: 1em; color: #fff; text-tranform: uppercase; margin-top: 10px; cursor: pointer;" />

                    </form>

                -->

            <a href="checkout" class="large" style="float:right; background: #000; border:0; padding: 1em; color: #fff; text-tranform: uppercase; margin-top: 10px; cursor: pointer; font-size:2em;" >Checkout</a>

                </div>
                <?php else : ?>
                <div class="alert-box alert">Your shopping cart is currently empty. <strong>Add some products!</strong></div>
                <?php endif; ?>
            </div>

           </div>
            </div>
        </div>
  
<?php


	$app->render('public/cart/cart.html',
		
		array( 

			'www' => WWW,
			'root' => ROOT

		 )
    	
    );

    include_once VIEW_INC_DIR . 'public_footer.php';


})->via('GET','POST');

?>
