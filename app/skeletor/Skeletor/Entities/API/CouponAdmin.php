<?php
namespace Skeletor\Entities\API;

/** @Entity **/
class CouponAdmin
{
    /** @Id @GeneratedValue @Column(type="integer") **/
    protected $id;

    /**  @Column(type="string") **/
    protected $name;

    /**  @Column(type="text") **/
    protected $description;

    /**  @Column(type="string") **/
    protected $code;

    /**  @Column(type="string") **/
    protected $code_type;

    /**  @Column(type="integer") **/
    protected $percentage;

    /**  @Column(type="integer") **/
    protected $flat;

    /**  @Column(type="integer") **/
    protected $amount;

    
}