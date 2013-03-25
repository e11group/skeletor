<?php
namespace Skeletor\Entities\API;

/** @Entity **/
class OrdersDetails
{
    /** @Id @GeneratedValue @Column(type="integer") **/
    protected $id;

     /**
     * @ManyToOne(targetEntity="Orders", inversedBy="details")
     * @JoinColumn(name="order_id", referencedColumnName="id")
     **/
    private $order;

   /**
     * @OneToOne(targetEntity="Products")
     * @JoinColumn(name="product_id", referencedColumnName="id")
     **/
    protected $product;

    /** @Column(type="integer") **/
    protected $qty;

    /** @Column(type="integer") **/
    protected $total;


}