<?php
namespace Skeletor\Entities\API;

/** @Entity **/
class ProductsShipping
{
    /** @Id @GeneratedValue @Column(type="integer") **/
    protected $id;
    
    /**  @Column(type="string") **/
    protected $amount_type;

    /**  @Column(type="string", length=10, unique=false, nullable=true) **/
    protected $unit;

    /**  @Column(type="integer", length=10, unique=false, nullable=true) **/
    protected $unit_range_start;

    /**  @Column(type="integer", length=10, unique=false, nullable=true) **/
    protected $unit_range_end;

    /**  @Column(type="string", length=10, unique=false, nullable=true) **/
    protected $flat;

    /**  @Column(type="string", length=255, unique=false, nullable=false) **/
    protected $amount;
}