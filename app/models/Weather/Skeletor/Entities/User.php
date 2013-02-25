<?php
namespace Weather\Skeletor\Entities;

/** @Entity **/
class User
{
   	/** @Id @GeneratedValue @Column(type="integer") **/
    protected $id;
    /** @Column(type="string") **/
    protected $name;
}