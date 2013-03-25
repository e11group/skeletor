<?php
namespace Skeletor\Entities\API;

/** @Entity **/
class TaxesAdmin
{
    /** @Id @GeneratedValue @Column(type="integer") **/
    protected $id;
    
    /**  @Column(type="string") **/
    protected $state;

    /**  @Column(type="integer") **/
    protected $amount;
    
}