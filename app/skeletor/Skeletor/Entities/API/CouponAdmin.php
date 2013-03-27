<?php
namespace Skeletor\Entities\API;

/** @Entity **/
class CouponAdmin
{
    /** @Id @GeneratedValue @Column(type="integer") **/
    protected $id;

    /**  @Column(type="string") **/
    protected $name;

    /**  @Column(type="text") **/
    protected $description;

    /**  @Column(type="string") **/
    protected $code;

    /**  @Column(type="string") **/
    protected $code_type;

    /**  @Column(type="integer") **/
    protected $percentage;

    /**  @Column(type="integer") **/
    protected $flat;

    /**  @Column(type="integer") **/
    protected $amount;

     /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return CouponAdmin
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return CouponAdmin
     */
    public function setCode($code)
    {
        $this->code = $code;
    
        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set code_type
     *
     * @param string $codeType
     * @return CouponAdmin
     */
    public function setCodeType($codeType)
    {
        $this->code_type = $codeType;
    
        return $this;
    }

    /**
     * Get code_type
     *
     * @return string 
     */
    public function getCodeType()
    {
        return $this->code_type;
    }

    /**
     * Set percentage
     *
     * @param integer $percentage
     * @return CouponAdmin
     */
    public function setPercentage($percentage)
    {
        $this->percentage = $percentage;
    
        return $this;
    }

    /**
     * Get percentage
     *
     * @return integer 
     */
    public function getPercentage()
    {
        return $this->percentage;
    }

    /**
     * Set flat
     *
     * @param integer $flat
     * @return CouponAdmin
     */
    public function setFlat($flat)
    {
        $this->flat = $flat;
    
        return $this;
    }

    /**
     * Get flat
     *
     * @return integer 
     */
    public function getFlat()
    {
        return $this->flat;
    }

    /**
     * Set amount
     *
     * @param integer $amount
     * @return CouponAdmin
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    
        return $this;
    }

    /**
     * Get amount
     *
     * @return integer 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    
}