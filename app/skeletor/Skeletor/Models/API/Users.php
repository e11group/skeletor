<?php

namespace Skeletor\Entities\API;

use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 */
class Users
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $first_name;

    /**
     * @var string
     */
    private $last_name;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $hash;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $provider;

    /**
     * @var string
     */
    private $provider_uid;

    /**
     * @var \Skeletor\Entities\API\Customers
     */
    private $customer_id;


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
     * Set first_name
     *
     * @param string $firstName
     * @return Users
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
     * @return Users
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
     * Set email
     *
     * @param string $email
     * @return Users
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
     * Set hash
     *
     * @param string $hash
     * @return Users
     */
    public function setHash($hash)
    {
        $this->hash = $hash;
    
        return $this;
    }

    /**
     * Get hash
     *
     * @return string 
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Users
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set provider
     *
     * @param string $provider
     * @return Users
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;
    
        return $this;
    }

    /**
     * Get provider
     *
     * @return string 
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * Set provider_uid
     *
     * @param string $providerUid
     * @return Users
     */
    public function setProviderUid($providerUid)
    {
        $this->provider_uid = $providerUid;
    
        return $this;
    }

    /**
     * Get provider_uid
     *
     * @return string 
     */
    public function getProviderUid()
    {
        return $this->provider_uid;
    }

    /**
     * Set customer_id
     *
     * @param \Skeletor\Entities\API\Customers $customerId
     * @return Users
     */
    public function setCustomerId(\Skeletor\Entities\API\Customers $customerId = null)
    {
        $this->customer_id = $customerId;
    
        return $this;
    }

    /**
     * Get customer_id
     *
     * @return \Skeletor\Entities\API\Customers 
     */
    public function getCustomerId()
    {
        return $this->customer_id;
    }
}
