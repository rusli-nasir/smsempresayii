<?php

class GrupoTest extends WebTestCase
{
	public $fixtures=array(
		'grupos'=>'Grupo',
	);

	public function testShow()
	{
		$this->open('?r=grupo/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=grupo/create');
	}

	public function testUpdate()
	{
		$this->open('?r=grupo/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=grupo/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=grupo/index');
	}

	public function testAdmin()
	{
		$this->open('?r=grupo/admin');
	}
}
