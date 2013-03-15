<?php
namespace Skeletor\Entities\API;

/** @Entity **/
class Templates
{
  /** @Id @GeneratedValue @Column(type="integer") **/
    protected $id;
    /** @Column(type="string") **/
    protected $title;
    /** @Column(type="datetime") **/
    protected $datetime;

    public function __construct()
    {
        $this->datetime = new \DateTime(); 
    }

    public function getTitle() {

        return $this->title;

    }

    public function getId() {

        return $this->id;

    }

// horrible hack i know

    public function __get($name)
    {
      if(property_exists($this, $name)){
        return $this->$name;
      }
    }

}