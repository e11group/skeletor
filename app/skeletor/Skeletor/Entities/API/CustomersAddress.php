<?php
namespace Skeletor\Entities\API;

/** @Entity **/
class CustomersAddress
{
   	/** @Id @GeneratedValue @Column(type="integer") **/
    protected $id;
    /** @Column(type="string") **/
    protected $shipping_first_name;
    /** @Column(type="string") **/
    protected $shipping_last_name;
    /** @Column(type="string") **/
    protected $shipping_street;
    /** @Column(type="string") **/
    protected $shipping_street_two;
    /** @Column(type="string") **/
    protected $shipping_city;
    /** @Column(type="string") **/
    protected $shipping_state;
    /** @Column(type="string") **/
    protected $shipping_zip;
    /** @Column(type="string") **/
    protected $shipping_country;
    /** @Column(type="string") **/
    protected $billing_first_name;
    /** @Column(type="string") **/
    protected $billing_last_name;
    /** @Column(type="string") **/
    protected $billing_street;
    /** @Column(type="string") **/
    protected $billing_street_two;
    /** @Column(type="string") **/
    protected $billing_city;
    /** @Column(type="string") **/
    protected $billing_state;
    /** @Column(type="string") **/
    protected $billing_zip;
    /** @Column(type="string") **/
    protected $billing_country;
}