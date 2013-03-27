<?php
namespace Skeletor\Entities\API;

/** @Entity **/
class OrdersDetails
{
    /** @Id @GeneratedValue @Column(type="integer") **/
    protected $id;

   
    private $order;

   /**
     * @ManyToMany(targetEntity="Products")
     * @JoinColumn(name="product_id", referencedColumnName="id")
     **/
    protected $product;

    /** @Column(type="integer") **/
    protected $qty;

    /** @Column(type="integer") **/
    protected $total;

    
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