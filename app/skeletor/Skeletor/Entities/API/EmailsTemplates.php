<?php
namespace Skeletor\Entities\API;

/** @Entity **/
class EmailsTemplates
{
   	/** @Id @GeneratedValue @Column(type="integer") **/
    protected $id;
    /** @Column(type="string") **/
    protected $name;
    /** @Column(type="text") **/
    protected $template;

}