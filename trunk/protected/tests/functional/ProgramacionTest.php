<?php

class ProgramacionTest extends WebTestCase
{
	public $fixtures=array(
		'programacions'=>'Programacion',
	);

	public function testShow()
	{
		$this->open('?r=programacion/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=programacion/create');
	}

	public function testUpdate()
	{
		$this->open('?r=programacion/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=programacion/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=programacion/index');
	}

	public function testAdmin()
	{
		$this->open('?r=programacion/admin');
	}
}
