<?php
namespace Skeletor\Entities\API;

/** @Entity **/
class Templates
{
  /** @Id @GeneratedValue @Column(type="integer") **/
    protected $id;
    /** @Column(type="string") **/
    protected $title;

    public function __construct()
    {
        
    }

    public function getTitle() {

        return $this->title;


    }

}