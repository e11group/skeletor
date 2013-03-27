<?php
namespace Skeletor\Entities\API;

/** @Entity **/
class ProductsTags
{
    /** @Id @GeneratedValue @Column(type="integer") **/
    protected $id;

     /**
     * @ManyToOne(targetEntity="Products", inversedBy="tags")
     * @JoinColumn(name="product_id", referencedColumnName="id")
     **/
    private $product;

    /** @Column(type="string") **/
    protected $title;

    /** @Column(type="string") **/
    protected $group;



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
     * @return ProductsTags
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
     * Set group
     *
     * @param string $group
     * @return ProductsTags
     */
    public function setGroup($group)
    {
        $this->group = $group;
    
        return $this;
    }

    /**
     * Get group
     *
     * @return string 
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set product
     *
     * @param \Skeletor\Entities\API\Products $product
     * @return ProductsTags
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