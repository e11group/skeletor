<?php
require_once('../../app/classes/randomText.php');
class RemoteConnectTest extends PHPUnit_Framework_TestCase
{
  public function setUp(){ }
  public function tearDown(){ }
  public function testConnectionIsValid()
  {
    
    $testClass = new randomText();

    $this->assertTrue($testClass->unlock() !== false);
  }
}
?>