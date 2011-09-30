<?php

class EstadoTest extends WebTestCase
{
	public $fixtures=array(
		'estados'=>'Estado',
	);

	public function testShow()
	{
		$this->open('?r=estado/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=estado/create');
	}

	public function testUpdate()
	{
		$this->open('?r=estado/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=estado/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=estado/index');
	}

	public function testAdmin()
	{
		$this->open('?r=estado/admin');
	}
}
