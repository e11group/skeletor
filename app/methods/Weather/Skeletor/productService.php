<?php
namespace Weather\Skeletor;

class productService
{


    public function __construct() 
    {
    }


    public function getSingleSubcategory($id = '', $name = '')

    {

		try {

			if(!empty($id)) {

            	$select = dibi::query('SELECT * FROM products_subcategory WHERE id = ?', $id);

			}

            elseif (!empty($name)) {

            	$select = dibi::query('SELECT * FROM products_subcategory WHERE name = ?', $name);

           }

            return $select;
        
        } catch (DibiException $e) {
        
            echo get_class($e), ': ', $e->getMessage(), "\n";
            
        }

    }

     public function getSingleCategory($category_id)

    {

        try {

            $select = dibi::query('SELECT * FROM products_category WHERE id = ?', $category_id);

            foreach($select as $n => $row) {

                return $row['name'];

            }

            return false;
        
        } catch (DibiException $e) {
        
            echo get_class($e), ': ', $e->getMessage(), "\n";
            
        }

    }

     public function getProduct($id = '', $name = '')

    {

        try {

            if(!empty($id)) {

                $select = dibi::query('SELECT * FROM products_product WHERE id = ?', $id);

            }

            elseif (!empty($name)) {

                $select = dibi::query('SELECT * FROM products_product WHERE name = ?', $name);

           }

            return $select;
        
        } catch (DibiException $e) {
        
            echo get_class($e), ': ', $e->getMessage(), "\n";
            
        }

    }

     public function getProductTolerances($product_id)

    {

        try {

            $select = dibi::query('SELECT * FROM products_product_tolerances WHERE product = ?', $product_id);

            return $select;
        
        } catch (DibiException $e) {
        
            echo get_class($e), ': ', $e->getMessage(), "\n";
            
        }

    }

      public function getProductFields($product_id)

    {

        try {

            $select = dibi::query('SELECT * FROM products_product_fields WHERE product = ?', $product_id);

            return $select;
        
        } catch (DibiException $e) {
        
            echo get_class($e), ': ', $e->getMessage(), "\n";
            
        }

    }

       public function getProductNumbers($product_id)

    {

        try {

            $select = dibi::query('SELECT * FROM products_product_number WHERE product = ?', $product_id);

            return $select;
        
        } catch (DibiException $e) {
        
            echo get_class($e), ': ', $e->getMessage(), "\n";
            
        }

    }





}

?>