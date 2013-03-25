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
     * @OneToOne(targetEntity="Customers")
     * @JoinColumn(name="customer_id", referencedColumnName="id")
     **/
    private $customer_id;

     /**
     * @OneToMany(targetEntity="OrdersDetails", mappedBy="order")
     **/
    private $details;

     /**
     * @OneToOne(targetEntity="OrdersStatus")
     * @JoinColumn(name="status_id", referencedColumnName="id")
     **/
    private $status;

     /**
     * @OneToOne(targetEntity="OrdersTracking")
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
    
    public function __construct() {
            $this->details = new \Doctrine\Common\Collections\ArrayCollection();
    }

}