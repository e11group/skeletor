<?php
namespace Skeletor\Entities\Client;

/** @Entity **/
class Clients
{
  /** @Id @GeneratedValue @Column(type="integer") **/
    protected $id;
    /** @Column(type="string") **/
    protected $title;
    /** @Column(type="string") **/
    protected $private_key;
    /** @Column(type="string") **/
    protected $public_key;

    public function __construct()
    {
    }

    // horrible hack i know
    public function __get($name)
    {
      if(property_exists($this, $name)){
        return $this->$name;
      }
    }
}