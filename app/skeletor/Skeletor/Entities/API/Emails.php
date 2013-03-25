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

}