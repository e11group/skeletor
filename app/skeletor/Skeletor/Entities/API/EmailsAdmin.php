<?php
namespace Skeletor\Entities\API;

/** @Entity **/
class EmailsAdmin
{
   	/** @Id @GeneratedValue @Column(type="integer") **/
    protected $id;

    /** @Column(type="string") **/
    protected $no_reply;

    /** @Column(type="string") **/
    protected $reply;

	/** @Column(type="string") **/
    protected $header;
    

}