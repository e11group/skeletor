<?php
namespace Skeletor\Entities\API;

/** @Entity **/
class ProductsShipping
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

    /**  @Column(type="string", length=255, unique=false, nullable=false) **/
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
     * @return ProductsShipping
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
     * @return ProductsShipping
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
     * @return ProductsShipping
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
     * @return ProductsShipping
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
     * @return ProductsShipping
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
     * @param string $amount
     * @return ProductsShipping
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    
        return $this;
    }

    /**
     * Get amount
     *
     * @return string 
     */
    public function getAmount()
    {
        return $this->amount;
    }
    
}