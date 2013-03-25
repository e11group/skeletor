<?php
namespace Skeletor\Entities\API;

/** @Entity **/
class OrdersTracking
{
   	/** @Id @GeneratedValue @Column(type="integer") **/
    protected $id;

    /** @Column(type="datetime") **/
    protected $datetime;

    /** @Column(type="string") **/
    protected $carrier;

    /** @Column(type="string") **/
    protected $number;


}