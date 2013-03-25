<?php
namespace Skeletor\Entities\API;

/** @Entity **/
class OrdersStatus
{
   	/** @Id @GeneratedValue @Column(type="integer") **/
    protected $id;

    /** @Column(type="datetime") **/
    protected $datetime;

    /** @Column(type="string") **/
    protected $status;

}