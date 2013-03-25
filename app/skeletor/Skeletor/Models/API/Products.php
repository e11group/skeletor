<?php

namespace Skeletor\Entities\API;

use Doctrine\ORM\Mapping as ORM;

/**
 * Products
 */
class Products
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
    private $description;

    /**
     * @var string
     */
    private $is_featured;

    /**
     * @var \Skeletor\Entities\API\ProductsAmount
     */
    private $amount;

    /**
     * @var \Skeletor\Entities\API\ProductsShipping
     */
    private $shipping;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $tags;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $categories;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $images;

    /**
     * @var \Skeletor\Entities\API\ProductsCoupon
     */
    private $coupon;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * @return Products
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
     * Set description
     *
     * @param string $description
     * @return Products
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set is_featured
     *
     * @param string $isFeatured
     * @return Products
     */
    public function setIsFeatured($isFeatured)
    {
        $this->is_featured = $isFeatured;
    
        return $this;
    }

    /**
     * Get is_featured
     *
     * @return string 
     */
    public function getIsFeatured()
    {
        return $this->is_featured;
    }

    /**
     * Set amount
     *
     * @param \Skeletor\Entities\API\ProductsAmount $amount
     * @return Products
     */
    public function setAmount(\Skeletor\Entities\API\ProductsAmount $amount = null)
    {
        $this->amount = $amount;
    
        return $this;
    }

    /**
     * Get amount
     *
     * @return \Skeletor\Entities\API\ProductsAmount 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set shipping
     *
     * @param \Skeletor\Entities\API\ProductsShipping $shipping
     * @return Products
     */
    public function setShipping(\Skeletor\Entities\API\ProductsShipping $shipping = null)
    {
        $this->shipping = $shipping;
    
        return $this;
    }

    /**
     * Get shipping
     *
     * @return \Skeletor\Entities\API\ProductsShipping 
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * Add tags
     *
     * @param \Skeletor\Entities\API\ProductsTags $tags
     * @return Products
     */
    public function addTag(\Skeletor\Entities\API\ProductsTags $tags)
    {
        $this->tags[] = $tags;
    
        return $this;
    }

    /**
     * Remove tags
     *
     * @param \Skeletor\Entities\API\ProductsTags $tags
     */
    public function removeTag(\Skeletor\Entities\API\ProductsTags $tags)
    {
        $this->tags->removeElement($tags);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Add categories
     *
     * @param \Skeletor\Entities\API\ProductsCategories $categories
     * @return Products
     */
    public function addCategorie(\Skeletor\Entities\API\ProductsCategories $categories)
    {
        $this->categories[] = $categories;
    
        return $this;
    }

    /**
     * Remove categories
     *
     * @param \Skeletor\Entities\API\ProductsCategories $categories
     */
    public function removeCategorie(\Skeletor\Entities\API\ProductsCategories $categories)
    {
        $this->categories->removeElement($categories);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Add images
     *
     * @param \Skeletor\Entities\API\ProductsImages $images
     * @return Products
     */
    public function addImage(\Skeletor\Entities\API\ProductsImages $images)
    {
        $this->images[] = $images;
    
        return $this;
    }

    /**
     * Remove images
     *
     * @param \Skeletor\Entities\API\ProductsImages $images
     */
    public function removeImage(\Skeletor\Entities\API\ProductsImages $images)
    {
        $this->images->removeElement($images);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set coupon
     *
     * @param \Skeletor\Entities\API\ProductsCoupon $coupon
     * @return Products
     */
    public function setCoupon(\Skeletor\Entities\API\ProductsCoupon $coupon = null)
    {
        $this->coupon = $coupon;
    
        return $this;
    }

    /**
     * Get coupon
     *
     * @return \Skeletor\Entities\API\ProductsCoupon 
     */
    public function getCoupon()
    {
        return $this->coupon;
    }
}
