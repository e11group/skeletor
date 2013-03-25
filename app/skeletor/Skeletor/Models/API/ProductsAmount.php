<?php

namespace Skeletor\Entities\API;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductsAmount
 */
class ProductsAmount
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $amount_type;

    /**
     * @var string
     */
    private $unit;

    /**
     * @var integer
     */
    private $unit_range_start;

    /**
     * @var integer
     */
    private $unit_range_end;

    /**
     * @var string
     */
    private $flat;

    /**
     * @var integer
     */
    private $amount;


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
     * Set amount_type
     *
     * @param string $amountType
     * @return ProductsAmount
     */
    public function setAmountType($amountType)
    {
        $this->amount_type = $amountType;
    
        return $this;
    }

    /**
     * Get amount_type
     *
     * @return string 
     */
    public function getAmountType()
    {
        return $this->amount_type;
    }

    /**
     * Set unit
     *
     * @param string $unit
     * @return ProductsAmount
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
    
        return $this;
    }

    /**
     * Get unit
     *
     * @return string 
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * Set unit_range_start
     *
     * @param integer $unitRangeStart
     * @return ProductsAmount
     */
    public function setUnitRangeStart($unitRangeStart)
    {
        $this->unit_range_start = $unitRangeStart;
    
        return $this;
    }

    /**
     * Get unit_range_start
     *
     * @return integer 
     */
    public function getUnitRangeStart()
    {
        return $this->unit_range_start;
    }

    /**
     * Set unit_range_end
     *
     * @param integer $unitRangeEnd
     * @return ProductsAmount
     */
    public function setUnitRangeEnd($unitRangeEnd)
    {
        $this->unit_range_end = $unitRangeEnd;
    
        return $this;
    }

    /**
     * Get unit_range_end
     *
     * @return integer 
     */
    public function getUnitRangeEnd()
    {
        return $this->unit_range_end;
    }

    /**
     * Set flat
     *
     * @param string $flat
     * @return ProductsAmount
     */
    public function setFlat($flat)
    {
        $this->flat = $flat;
    
        return $this;
    }

    /**
     * Get flat
     *
     * @return string 
     */
    public function getFlat()
    {
        return $this->flat;
    }

    /**
     * Set amount
     *
     * @param integer $amount
     * @return ProductsAmount
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
