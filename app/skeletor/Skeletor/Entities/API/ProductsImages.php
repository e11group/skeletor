<?php
namespace Skeletor\Entities\API;

/** @Entity **/
class ProductsImages
{
    /** @Id @GeneratedValue @Column(type="integer") **/
    protected $id;

     /**
     * @ManyToOne(targetEntity="Products", inversedBy="images")
     * @JoinColumn(name="product_id", referencedColumnName="id")
     **/
    private $product;

    /** @Column(type="string") **/
    protected $title;

    /** @Column(type="string") **/
    protected $group;
}