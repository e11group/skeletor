<?php
namespace Skeletor\Entities\API;

/** @Entity **/
class Orders
{
    /** @Id @GeneratedValue @Column(type="integer") **/
    protected $id;

    /** @Column(type="datetime") **/
    protected $datetime;

     /**
     * @ManyToOne(targetEntity="OrdersDetails")
     * @JoinColumn(name="details_id", referencedColumnName="id")
     **/
    private $details;

     /**
     * @ManyToOne(targetEntity="OrdersStatus")
     * @JoinColumn(name="status_id", referencedColumnName="id")
     **/
    private $status;

     /**
     * @ManyToOne(targetEntity="OrdersTracking")
     * @JoinColumn(name="status_id", referencedColumnName="id")
     **/
    private $tracking;

    /** @Column(type="integer") **/
    protected $subtotal;
	
	/** @Column(type="integer") **/
    protected $shipping_total;
	
	/** @Column(type="integer") **/
    protected $tax_total;
	
	/** @Column(type="integer") **/
    protected $grand_total;
    
 
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->details = new \Doctrine\Common\Collections\ArrayCollection();
        $this->status = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tracking = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add status
     *
     * @param \Skeletor\Entities\API\OrdersStatus $status
     * @return Orders
     */
    public function addStatu(\Skeletor\Entities\API\OrdersStatus $status)
    {
        $this->status[] = $status;
    
        return $this;
    }

    /**
     * Remove status
     *
     * @param \Skeletor\Entities\API\OrdersStatus $status
     */
    public function removeStatu(\Skeletor\Entities\API\OrdersStatus $status)
    {
        $this->status->removeElement($status);
    }

    /**
     * Get status
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Add tracking
     *
     * @param \Skeletor\Entities\API\OrdersTracking $tracking
     * @return Orders
     */
    public function addTracking(\Skeletor\Entities\API\OrdersTracking $tracking)
    {
        $this->tracking[] = $tracking;
    
        return $this;
    }

    /**
     * Remove tracking
     *
     * @param \Skeletor\Entities\API\OrdersTracking $tracking
     */
    public function removeTracking(\Skeletor\Entities\API\OrdersTracking $tracking)
    {
        $this->tracking->removeElement($tracking);
    }

    /**
     * Get tracking
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTracking()
    {
        return $this->tracking;
    }
}
