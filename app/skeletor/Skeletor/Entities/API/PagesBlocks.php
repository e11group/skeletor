<?php
namespace Skeletor\Entities\API;

/** @Entity **/
class PagesBlocks
{
    /** @Id @GeneratedValue @Column(type="integer") **/
    protected $id;
    /** @Column(type="string") **/
    protected $name;
    /** @Column(type="text") **/
    protected $description;
     /**
     * @ManyToOne(targetEntity="PagesTemplates", inversedBy="blocks")
     * @JoinColumn(name="product_id", referencedColumnName="id")
     **/
    private $template;

}