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
     * @OneToOne(targetEntity="CustomersAddress")
     * @JoinColumn(name="address_id", referencedColumnName="id")
     **/
    private $address;

        /**
     * @OneToOne(targetEntity="Users")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     **/
    private $user;

/**
 * Getter for id
 *
 * @return mixed
 */
public function getId()
{
    return $this->id;
}

/**
 * Setter for id
 *
 * @param mixed $id Value to set
 * @return self
 */
public function setId($id)
{
    $this->id = $id;
    return $this;
}

/**
 * Getter for email
 *
 * @return mixed
 */
public function getEmail()
{
    return $this->email;
}

/**
 * Setter for email
 *
 * @param mixed $email Value to set
 * @return self
 */
public function setEmail($email)
{
    $this->email = $email;
    return $this;
}



}

