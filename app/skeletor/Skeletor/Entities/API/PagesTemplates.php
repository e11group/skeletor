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

}