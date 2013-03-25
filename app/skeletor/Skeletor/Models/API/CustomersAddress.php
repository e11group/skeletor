<?php

namespace Skeletor\Entities\API;

use Doctrine\ORM\Mapping as ORM;

/**
 * CustomersAddress
 */
class CustomersAddress
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $shipping_first_name;

    /**
     * @var string
     */
    private $shipping_last_name;

    /**
     * @var string
     */
    private $shipping_street;

    /**
     * @var string
     */
    private $shipping_street_two;

    /**
     * @var string
     */
    private $shipping_city;

    /**
     * @var string
     */
    private $shipping_state;

    /**
     * @var string
     */
    private $shipping_zip;

    /**
     * @var string
     */
    private $shipping_country;

    /**
     * @var string
     */
    private $billing_first_name;

    /**
     * @var string
     */
    private $billing_last_name;

    /**
     * @var string
     */
    private $billing_street;

    /**
     * @var string
     */
    private $billing_street_two;

    /**
     * @var string
     */
    private $billing_city;

    /**
     * @var string
     */
    private $billing_state;

    /**
     * @var string
     */
    private $billing_zip;

    /**
     * @var string
     */
    private $billing_country;


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
     * Set shipping_first_name
     *
     * @param string $shippingFirstName
     * @return CustomersAddress
     */
    public function setShippingFirstName($shippingFirstName)
    {
        $this->shipping_first_name = $shippingFirstName;
    
        return $this;
    }

    /**
     * Get shipping_first_name
     *
     * @return string 
     */
    public function getShippingFirstName()
    {
        return $this->shipping_first_name;
    }

    /**
     * Set shipping_last_name
     *
     * @param string $shippingLastName
     * @return CustomersAddress
     */
    public function setShippingLastName($shippingLastName)
    {
        $this->shipping_last_name = $shippingLastName;
    
        return $this;
    }

    /**
     * Get shipping_last_name
     *
     * @return string 
     */
    public function getShippingLastName()
    {
        return $this->shipping_last_name;
    }

    /**
     * Set shipping_street
     *
     * @param string $shippingStreet
     * @return CustomersAddress
     */
    public function setShippingStreet($shippingStreet)
    {
        $this->shipping_street = $shippingStreet;
    
        return $this;
    }

    /**
     * Get shipping_street
     *
     * @return string 
     */
    public function getShippingStreet()
    {
        return $this->shipping_street;
    }

    /**
     * Set shipping_street_two
     *
     * @param string $shippingStreetTwo
     * @return CustomersAddress
     */
    public function setShippingStreetTwo($shippingStreetTwo)
    {
        $this->shipping_street_two = $shippingStreetTwo;
    
        return $this;
    }

    /**
     * Get shipping_street_two
     *
     * @return string 
     */
    public function getShippingStreetTwo()
    {
        return $this->shipping_street_two;
    }

    /**
     * Set shipping_city
     *
     * @param string $shippingCity
     * @return CustomersAddress
     */
    public function setShippingCity($shippingCity)
    {
        $this->shipping_city = $shippingCity;
    
        return $this;
    }

    /**
     * Get shipping_city
     *
     * @return string 
     */
    public function getShippingCity()
    {
        return $this->shipping_city;
    }

    /**
     * Set shipping_state
     *
     * @param string $shippingState
     * @return CustomersAddress
     */
    public function setShippingState($shippingState)
    {
        $this->shipping_state = $shippingState;
    
        return $this;
    }

    /**
     * Get shipping_state
     *
     * @return string 
     */
    public function getShippingState()
    {
        return $this->shipping_state;
    }

    /**
     * Set shipping_zip
     *
     * @param string $shippingZip
     * @return CustomersAddress
     */
    public function setShippingZip($shippingZip)
    {
        $this->shipping_zip = $shippingZip;
    
        return $this;
    }

    /**
     * Get shipping_zip
     *
     * @return string 
     */
    public function getShippingZip()
    {
        return $this->shipping_zip;
    }

    /**
     * Set shipping_country
     *
     * @param string $shippingCountry
     * @return CustomersAddress
     */
    public function setShippingCountry($shippingCountry)
    {
        $this->shipping_country = $shippingCountry;
    
        return $this;
    }

    /**
     * Get shipping_country
     *
     * @return string 
     */
    public function getShippingCountry()
    {
        return $this->shipping_country;
    }

    /**
     * Set billing_first_name
     *
     * @param string $billingFirstName
     * @return CustomersAddress
     */
    public function setBillingFirstName($billingFirstName)
    {
        $this->billing_first_name = $billingFirstName;
    
        return $this;
    }

    /**
     * Get billing_first_name
     *
     * @return string 
     */
    public function getBillingFirstName()
    {
        return $this->billing_first_name;
    }

    /**
     * Set billing_last_name
     *
     * @param string $billingLastName
     * @return CustomersAddress
     */
    public function setBillingLastName($billingLastName)
    {
        $this->billing_last_name = $billingLastName;
    
        return $this;
    }

    /**
     * Get billing_last_name
     *
     * @return string 
     */
    public function getBillingLastName()
    {
        return $this->billing_last_name;
    }

    /**
     * Set billing_street
     *
     * @param string $billingStreet
     * @return CustomersAddress
     */
    public function setBillingStreet($billingStreet)
    {
        $this->billing_street = $billingStreet;
    
        return $this;
    }

    /**
     * Get billing_street
     *
     * @return string 
     */
    public function getBillingStreet()
    {
        return $this->billing_street;
    }

    /**
     * Set billing_street_two
     *
     * @param string $billingStreetTwo
     * @return CustomersAddress
     */
    public function setBillingStreetTwo($billingStreetTwo)
    {
        $this->billing_street_two = $billingStreetTwo;
    
        return $this;
    }

    /**
     * Get billing_street_two
     *
     * @return string 
     */
    public function getBillingStreetTwo()
    {
        return $this->billing_street_two;
    }

    /**
     * Set billing_city
     *
     * @param string $billingCity
     * @return CustomersAddress
     */
    public function setBillingCity($billingCity)
    {
        $this->billing_city = $billingCity;
    
        return $this;
    }

    /**
     * Get billing_city
     *
     * @return string 
     */
    public function getBillingCity()
    {
        return $this->billing_city;
    }

    /**
     * Set billing_state
     *
     * @param string $billingState
     * @return CustomersAddress
     */
    public function setBillingState($billingState)
    {
        $this->billing_state = $billingState;
    
        return $this;
    }

    /**
     * Get billing_state
     *
     * @return string 
     */
    public function getBillingState()
    {
        return $this->billing_state;
    }

    /**
     * Set billing_zip
     *
     * @param string $billingZip
     * @return CustomersAddress
     */
    public function setBillingZip($billingZip)
    {
        $this->billing_zip = $billingZip;
    
        return $this;
    }

    /**
     * Get billing_zip
     *
     * @return string 
     */
    public function getBillingZip()
    {
        return $this->billing_zip;
    }

    /**
     * Set billing_country
     *
     * @param string $billingCountry
     * @return CustomersAddress
     */
    public function setBillingCountry($billingCountry)
    {
        $this->billing_country = $billingCountry;
    
        return $this;
    }

    /**
     * Get billing_country
     *
     * @return string 
     */
    public function getBillingCountry()
    {
        return $this->billing_country;
    }
}
