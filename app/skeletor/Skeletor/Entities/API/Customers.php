<?php
namespace Skeletor\Entities\API;

/** @Entity **/
class Customers
{
   	/** @Id @GeneratedValue @Column(type="integer") **/
    protected $id;

    /** @Column(type="string", length=255, unique=true, nullable=false) **/
    protected $email;

    /**
     * @ManyToOne(targetEntity="CustomersAddress")
     * @JoinColumn(name="address_id", referencedColumnName="id")
     **/
    protected $address;

        /**
     * @ManyToOne(targetEntity="Users")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     **/
    private $user;

    /** @Column(type="string") **/
    protected $first_name;

    /** @Column(type="string") **/
    protected $last_name;

    /**
     * @ManyToMany(targetEntity="Orders")
     * @JoinColumn(name="orders_id", referencedColumnName="id")
     **/
    protected $orders;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->orders = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set email
     *
     * @param string $email
     * @return Customers
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set first_name
     *
     * @param string $firstName
     * @return Customers
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;
    
        return $this;
    }

    /**
     * Get first_name
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set last_name
     *
     * @param string $lastName
     * @return Customers
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;
    
        return $this;
    }

    /**
     * Get last_name
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set address
     *
     * @param \Skeletor\Entities\API\CustomersAddress $address
     * @return Customers
     */
    public function setAddress(\Skeletor\Entities\API\CustomersAddress $address = null)
    {
        $this->address = $address;
    
        return $this;
    }

    /**
     * Get address
     *
     * @return \Skeletor\Entities\API\CustomersAddress 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set user
     *
     * @param \Skeletor\Entities\API\Users $user
     * @return Customers
     */
    public function setUser(\Skeletor\Entities\API\Users $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Skeletor\Entities\API\Users 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add orders
     *
     * @param \Skeletor\Entities\API\Orders $orders
     * @return Customers
     */
    public function addOrder(\Skeletor\Entities\API\Orders $orders)
    {
        $this->orders[] = $orders;
    
        return $this;
    }

    /**
     * Remove orders
     *
     * @param \Skeletor\Entities\API\Orders $orders
     */
    public function removeOrder(\Skeletor\Entities\API\Orders $orders)
    {
        $this->orders->removeElement($orders);
    }

    /**
     * Get orders
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrders()
    {
        return $this->orders;
    }
}
