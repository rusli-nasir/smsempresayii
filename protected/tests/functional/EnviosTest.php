<?php

class EnviosTest extends WebTestCase
{
	public $fixtures=array(
		'envioses'=>'Envios',
	);

	public function testShow()
	{
		$this->open('?r=envios/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=envios/create');
	}

	public function testUpdate()
	{
		$this->open('?r=envios/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=envios/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=envios/index');
	}

	public function testAdmin()
	{
		$this->open('?r=envios/admin');
	}
}
