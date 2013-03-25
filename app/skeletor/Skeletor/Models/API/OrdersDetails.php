<?php

namespace Skeletor\Entities\API;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrdersDetails
 */
class OrdersDetails
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $qty;

    /**
     * @var integer
     */
    private $total;

    /**
     * @var \Skeletor\Entities\API\Orders
     */
    private $order;

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
     * Set qty
     *
     * @param integer $qty
     * @return OrdersDetails
     */
    public function setQty($qty)
    {
        $this->qty = $qty;
    
        return $this;
    }

    /**
     * Get qty
     *
     * @return integer 
     */
    public function getQty()
    {
        return $this->qty;
    }

    /**
     * Set total
     *
     * @param integer $total
     * @return OrdersDetails
     */
    public function setTotal($total)
    {
        $this->total = $total;
    
        return $this;
    }

    /**
     * Get total
     *
     * @return integer 
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set order
     *
     * @param \Skeletor\Entities\API\Orders $order
     * @return OrdersDetails
     */
    public function setOrder(\Skeletor\Entities\API\Orders $order = null)
    {
        $this->order = $order;
    
        return $this;
    }

    /**
     * Get order
     *
     * @return \Skeletor\Entities\API\Orders 
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set product
     *
     * @param \Skeletor\Entities\API\Products $product
     * @return OrdersDetails
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
