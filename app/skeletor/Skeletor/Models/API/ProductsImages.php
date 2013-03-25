<?php

namespace Skeletor\Entities\API;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductsImages
 */
class ProductsImages
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $group;

    /**
     * @var \Skeletor\Entities\API\Products
     */
    private $product;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return ProductsImages
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set group
     *
     * @param string $group
     * @return ProductsImages
     */
    public function setGroup($group)
    {
        $this->group = $group;
    
        return $this;
    }

    /**
     * Get group
     *
     * @return string 
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set product
     *
     * @param \Skeletor\Entities\API\Products $product
     * @return ProductsImages
     */
    public function setProduct(\Skeletor\Entities\API\Products $product = null)
    {
        $this->product = $product;
    
        return $this;
    }

    /**
     * Get product
     *
     * @return \Skeletor\Entities\API\Products 
     */
    public function getProduct()
    {
        return $this->product;
    }
}
