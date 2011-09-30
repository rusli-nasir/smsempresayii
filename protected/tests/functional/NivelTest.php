<?php

class NivelTest extends WebTestCase
{
	public $fixtures=array(
		'nivels'=>'Nivel',
	);

	public function testShow()
	{
		$this->open('?r=nivel/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=nivel/create');
	}

	public function testUpdate()
	{
		$this->open('?r=nivel/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=nivel/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=nivel/index');
	}

	public function testAdmin()
	{
		$this->open('?r=nivel/admin');
	}
}
