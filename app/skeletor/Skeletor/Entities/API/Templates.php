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

// horrible hack i know

    public function __get($name)
{
  if(property_exists($this, $name)){
    return $this->$name;
  }
}

}