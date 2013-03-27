<?php
namespace Skeletor\Entities\API;

/** @Entity **/
class Pages
{
   	/** @Id @GeneratedValue @Column(type="integer") **/
    protected $id;
    /** @Column(type="string") **/
    protected $name;
    /** @Column(type="text") **/
    protected $description;
     /**
     * @OneToOne(targetEntity="PagesTemplates")
     * @JoinColumn(name="template_id", referencedColumnName="id")
     **/
    protected $template;

    
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
     * @return Pages
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
     * @return Pages
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
     * Set template
     *
     * @param \Skeletor\Entities\API\PagesTemplates $template
     * @return Pages
     */
    public function setTemplate(\Skeletor\Entities\API\PagesTemplates $template = null)
    {
        $this->template = $template;
    
        return $this;
    }

    /**
     * Get template
     *
     * @return \Skeletor\Entities\API\PagesTemplates 
     */
    public function getTemplate()
    {
        return $this->template;
    }

}