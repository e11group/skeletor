<?php
namespace Skeletor\Entities\API;

/** @Entity **/
class ProductsAmount
{
    /** @Id @GeneratedValue @Column(type="integer") **/
    protected $id;

    /**  @Column(type="string") **/
    protected $amount_type;

    /**  @Column(type="string", length=10, unique=false, nullable=true) **/
    protected $unit;

    /**  @Column(type="integer", length=10, unique=false, nullable=true) **/
    protected $unit_range_start;

    /**  @Column(type="integer", length=10, unique=false, nullable=true) **/
    protected $unit_range_end;

    /**  @Column(type="string", length=10, unique=false, nullable=true) **/
    protected $flat;

    /**  @Column(type="integer") **/
    protected $amount;



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