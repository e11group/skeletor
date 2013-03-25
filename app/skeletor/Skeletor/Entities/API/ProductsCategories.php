<?php
namespace Skeletor\Entities\API;

/** @Entity **/
class ProductsCategories
{
    /** @Id @GeneratedValue @Column(type="integer") **/
    protected $id;

     /**
     * @ManyToOne(targetEntity="Products", inversedBy="categories")
     * @JoinColumn(name="product_id", referencedColumnName="id")
     **/
    private $product;

    /** @Column(type="string") **/
    protected $title;
}