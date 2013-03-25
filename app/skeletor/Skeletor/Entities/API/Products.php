<?php
namespace Skeletor\Entities\API;

/** @Entity **/
class Products
{
    /** @Id @GeneratedValue @Column(type="integer") **/
    protected $id;

    /**  @Column(type="string", length=255, unique=true, nullable=false) **/
    protected $title;

    /** @Column(type="text") **/
    protected $description;
    
    /**
     * @OneToOne(targetEntity="ProductsAmount")
     * @JoinColumn(name="amount_id", referencedColumnName="id")
     **/
    protected $amount;
    
    /**
     * @OneToOne(targetEntity="ProductsShipping")
     * @JoinColumn(name="shipping_id", referencedColumnName="id")
     **/
    private $shipping;

    /**
     * @OneToMany(targetEntity="ProductsTags", mappedBy="product")
     **/
    private $tags;
    
    /**
     * @OneToMany(targetEntity="ProductsCategories", mappedBy="product")
     **/
    private $categories;
    
    /**
     * @OneToMany(targetEntity="ProductsImages", mappedBy="product")
     **/
    protected $images;
    
    /** @Column(type="string") **/
    protected $is_featured;

    /**
     * @OneToOne(targetEntity="ProductsCoupon")
     * @JoinColumn(name="coupon_id", referencedColumnName="id")
     **/
    protected $coupon;


    public function __construct() {
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();

    }
}
