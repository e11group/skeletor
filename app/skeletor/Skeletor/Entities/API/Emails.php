<?php
namespace Skeletor\Entities\API;

/** @Entity **/
class Emails
{
   	/** @Id @GeneratedValue @Column(type="integer") **/
    protected $id;
    /** @Column(type="string") **/
    protected $name;
    /** @Column(type="text") **/
    protected $description;
     /**
     * @OneToOne(targetEntity="EmailsTemplates")
     * @JoinColumn(name="template_id", referencedColumnName="id")
     **/
    protected $template;

    /** @Column(type="text") **/
    protected $subject;

    /** @Column(type="text") **/
    protected $content;

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
     * Set name
     *
     * @param string $name
     * @return Emails
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

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
     * @return Emails
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
     * Set subject
     *
     * @param string $subject
     * @return Emails
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    
        return $this;
    }

    /**
     * Get subject
     *
     * @return string 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Emails
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set template
     *
     * @param \Skeletor\Entities\API\EmailsTemplates $template
     * @return Emails
     */
    public function setTemplate(\Skeletor\Entities\API\EmailsTemplates $template = null)
    {
        $this->template = $template;
    
        return $this;
    }

    /**
     * Get template
     *
     * @return \Skeletor\Entities\API\EmailsTemplates 
     */
    public function getTemplate()
    {
        return $this->template;
    }

}