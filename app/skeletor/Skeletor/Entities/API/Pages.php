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

}