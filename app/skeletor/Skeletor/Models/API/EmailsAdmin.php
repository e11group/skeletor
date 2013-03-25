<?php

namespace Skeletor\Entities\API;

use Doctrine\ORM\Mapping as ORM;

/**
 * EmailsAdmin
 */
class EmailsAdmin
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $no_reply;

    /**
     * @var string
     */
    private $reply;

    /**
     * @var string
     */
    private $header;


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
     * Set no_reply
     *
     * @param string $noReply
     * @return EmailsAdmin
     */
    public function setNoReply($noReply)
    {
        $this->no_reply = $noReply;
    
        return $this;
    }

    /**
     * Get no_reply
     *
     * @return string 
     */
    public function getNoReply()
    {
        return $this->no_reply;
    }

    /**
     * Set reply
     *
     * @param string $reply
     * @return EmailsAdmin
     */
    public function setReply($reply)
    {
        $this->reply = $reply;
    
        return $this;
    }

    /**
     * Get reply
     *
     * @return string 
     */
    public function getReply()
    {
        return $this->reply;
    }

    /**
     * Set header
     *
     * @param string $header
     * @return EmailsAdmin
     */
    public function setHeader($header)
    {
        $this->header = $header;
    
        return $this;
    }

    /**
     * Get header
     *
     * @return string 
     */
    public function getHeader()
    {
        return $this->header;
    }
}
