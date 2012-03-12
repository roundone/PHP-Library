<?php
require_once 'PHP-Library'.DIRECTORY_SEPARATOR.'GharpayAPI.php';
class GetAllPincodesTest extends PHPUnit_Framework_TestCase {
	private $gpapi;
	public function setUp()
	{
		$this->gpapi= new GharpayAPI();
		$this->gpapi->setUsername('test_api');
		$this->gpapi->setPassword('test_api');
		$this->gpapi->setURL('services.gharpay.in');
	}
	public function tearDown()
	{
		unset($gpapi);
	}

	/*
	 * Test getAllPincodes
	*/
	public function testOkGetAllPincodes()
	{
		$response=$this->gpapi->getAllPincodes();
		$this->assertArrayHasKey('0',$response);
	}
	public function testNotOkGetAllPincodes()
	{
		$this->gpapi->setPassword('');
		$this->setExpectedException("GharpayAPIException");
		$this->gpapi->getAllPincodes();
	}
}