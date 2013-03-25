<?php

namespace Skeletor\Entities\API;

use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 */
class Orders
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $datetime;

    /**
     * @var integer
     */
    private $subtotal;

    /**
     * @var integer
     */
    private $shipping_total;

    /**
     * @var integer
     */
    private $tax_total;

    /**
     * @var integer
     */
    private $grand_total;

    /**
     * @var \Skeletor\Entities\API\Customers
     */
    private $customer_id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $details;

    /**
     * @var \Skeletor\Entities\API\OrdersStatus
     */
    private $status;

    /**
     * @var \Skeletor\Entities\API\OrdersTracking
     */
    private $tracking;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->details = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set datetime
     *
     * @param \DateTime $datetime
     * @return Orders
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;
    
        return $this;
    }

    /**
     * Get datetime
     *
     * @return \DateTime 
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * Set subtotal
     *
     * @param integer $subtotal
     * @return Orders
     */
    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;
    
        return $this;
    }

    /**
     * Get subtotal
     *
     * @return integer 
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }

    /**
     * Set shipping_total
     *
     * @param integer $shippingTotal
     * @return Orders
     */
    public function setShippingTotal($shippingTotal)
    {
        $this->shipping_total = $shippingTotal;
    
        return $this;
    }

    /**
     * Get shipping_total
     *
     * @return integer 
     */
    public function getShippingTotal()
    {
        return $this->shipping_total;
    }

    /**
     * Set tax_total
     *
     * @param integer $taxTotal
     * @return Orders
     */
    public function setTaxTotal($taxTotal)
    {
        $this->tax_total = $taxTotal;
    
        return $this;
    }

    /**
     * Get tax_total
     *
     * @return integer 
     */
    public function getTaxTotal()
    {
        return $this->tax_total;
    }

    /**
     * Set grand_total
     *
     * @param integer $grandTotal
     * @return Orders
     */
    public function setGrandTotal($grandTotal)
    {
        $this->grand_total = $grandTotal;
    
        return $this;
    }

    /**
     * Get grand_total
     *
     * @return integer 
     */
    public function getGrandTotal()
    {
        return $this->grand_total;
    }

    /**
     * Set customer_id
     *
     * @param \Skeletor\Entities\API\Customers $customerId
     * @return Orders
     */
    public function setCustomerId(\Skeletor\Entities\API\Customers $customerId = null)
    {
        $this->customer_id = $customerId;
    
        return $this;
    }

    /**
     * Get customer_id
     *
     * @return \Skeletor\Entities\API\Customers 
     */
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     * Add details
     *
     * @param \Skeletor\Entities\API\OrdersDetails $details
     * @return Orders
     */
    public function addDetail(\Skeletor\Entities\API\OrdersDetails $details)
    {
        $this->details[] = $details;
    
        return $this;
    }

    /**
     * Remove details
     *
     * @param \Skeletor\Entities\API\OrdersDetails $details
     */
    public function removeDetail(\Skeletor\Entities\API\OrdersDetails $details)
    {
        $this->details->removeElement($details);
    }

    /**
     * Get details
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Set status
     *
     * @param \Skeletor\Entities\API\OrdersStatus $status
     * @return Orders
     */
    public function setStatus(\Skeletor\Entities\API\OrdersStatus $status = null)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return \Skeletor\Entities\API\OrdersStatus 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set tracking
     *
     * @param \Skeletor\Entities\API\OrdersTracking $tracking
     * @return Orders
     */
    public function setTracking(\Skeletor\Entities\API\OrdersTracking $tracking = null)
    {
        $this->tracking = $tracking;
    
        return $this;
    }

    /**
     * Get tracking
     *
     * @return \Skeletor\Entities\API\OrdersTracking 
     */
    public function getTracking()
    {
        return $this->tracking;
    }
}
