<?php
namespace Skeletor\Entities\API;

/** @Entity **/
class OrdersStatus
{
   	/** @Id @GeneratedValue @Column(type="integer") **/
    protected $id;

    /** @Column(type="datetime") **/
    protected $datetime;

    /** @Column(type="string") **/
    protected $status;

    
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
     * @return OrdersStatus
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
     * Set status
     *
     * @param string $status
     * @return OrdersStatus
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->st;
    }

}