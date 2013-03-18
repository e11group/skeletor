<?php
namespace Skeletor\Entities;

/** @Entity **/
class Users
{
   	/** @Id @GeneratedValue @Column(type="integer") **/
    protected $id;
    /** @Column(type="string") **/
    protected $name;
    /** @Column(type="string", length=32, unique=true, nullable=false) **/
    protected $email;
    /** @Column(type="string") **/
    protected $hash;
    /** @Column(type="string") **/
    protected $type;

    public function getId()
    {

    	return $this->id;

    }

    public function setName($name) 
    {
    	
    	if ($name == null) {
            throw new \BadMethodCallException(
                "empty name");
        }

    	$this->name = $name;
    }

    public function getName($name) 
    {
    	return $this->name;
    }

    public function setEmail($email) 
    {
    	
    	if (!filter_var($email, FILTER_VALIDATE_EMAIL)
    		|| $email == null
    		) {
            throw new \BadMethodCallException(
                "bad email");
        }

    	$this->email = $name;
    }

    public function getEmail($email) 
    {
    	return $this->email;
    }


    public function setType($type) 
    {
    	if ($type == null) {
            throw new \BadMethodCallException(
                "no type");
        }

    	$this->email = $name;
    }

    public function getType($type) 
    {
    	return $this->type;
    }

}

