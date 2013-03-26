<?php
namespace Skeletor\Entities\API;

/** @Entity **/
class OrdersTracking
{
   	/** @Id @GeneratedValue @Column(type="integer") **/
    protected $id;

    /** @Column(type="datetime") **/
    protected $datetime;

    /** @Column(type="string") **/
    protected $carrier;

    /** @Column(type="string") **/
    protected $number;

    

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
     * Set datetime
     *
     * @param \DateTime $datetime
     * @return OrdersTracking
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;
    
        return $this;
    }

    /**
     * Get datetime
     *
     * @return \DateTime 
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * Set carrier
     *
     * @param string $carrier
     * @return OrdersTracking
     */
    public function setCarrier($carrier)
    {
        $this->carrier = $carrier;
    
        return $this;
    }

    /**
     * Get carrier
     *
     * @return string 
     */
    public function getCarrier()
    {
        return $this->carrier;
    }

    /**
     * Set number
     *
     * @param string $number
     * @return OrdersTracking
     */
    public function setNumber($number)
    {
        $this->number = $number;
    
        return $this;
    }

    /**
     * Get number
     *
     * @return string 
     */
    public function getNumber()
    {
        return $this->number;
    }


}