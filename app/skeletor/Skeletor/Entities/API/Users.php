<?php
namespace Skeletor\Entities\API;

/** @Entity **/
class Users
{
   	/** @Id @GeneratedValue @Column(type="integer") **/
    protected $id;
    /** @Column(type="string") **/
    protected $first_name;
    /** @Column(type="string") **/
    protected $last_name;
    /** @Column(type="string", length=255, unique=true, nullable=false) **/
    protected $email;
    /** @Column(type="string") **/
    protected $hash;
    /** @Column(type="string") **/
    protected $type;
    /** @Column(type="string") **/
    protected $provider;
    /** @Column(type="string") **/
    protected $provider_uid;
    /**
     * @OneToOne(targetEntity="Customers")
     * @JoinColumn(name="customer_id", referencedColumnName="id")
     **/
    private $customer_id;


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

    public function getEmail() 
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

    public function getType() 
    {
    	return $this->type;
    }

    public function getHash()
    {
        return $this->hash;
    }

    public function setProvider($provider) 
    {
        
        if ($provider == null) {
            throw new \BadMethodCallException(
                "empty provider");
        }

        $this->provider = $provider;
    }

    public function getProvider($provider) 
    {
        return $this->provider;
    }
        public function setProviderUid($provider_uid) 
    {
        
        if ($provider_uid == null) {
            throw new \BadMethodCallException(
                "empty provider_uid");
        }

        $this->provider_uid = $provider_uid;
    }

    public function getProviderUid($provider_uid) 
    {
        return $this->provider_uid;
    }





}

