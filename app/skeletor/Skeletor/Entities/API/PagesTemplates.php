<?php
namespace Skeletor\Entities\API;

/** @Entity **/
class PagesTemplates
{
   	/** @Id @GeneratedValue @Column(type="integer") **/
    protected $id;
    /** @Column(type="string") **/
    protected $name;
    /** @Column(type="text") **/
    protected $description;
     /**
     * @OneToMany(targetEntity="PagesBlocks", mappedBy="template")
     **/
    private $blocks;

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->blocks = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * @return PagesTemplates
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
     * @return PagesTemplates
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
     * Add blocks
     *
     * @param \Skeletor\Entities\API\PagesBlocks $blocks
     * @return PagesTemplates
     */
    public function addBlock(\Skeletor\Entities\API\PagesBlocks $blocks)
    {
        $this->blocks[] = $blocks;
    
        return $this;
    }

    /**
     * Remove blocks
     *
     * @param \Skeletor\Entities\API\PagesBlocks $blocks
     */
    public function removeBlock(\Skeletor\Entities\API\PagesBlocks $blocks)
    {
        $this->blocks->removeElement($blocks);
    }

    /**
     * Get blocks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBlocks()
    {
        return $this->blocks;
    }

}