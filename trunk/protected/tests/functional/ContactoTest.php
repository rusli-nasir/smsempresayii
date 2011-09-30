<?php

class ContactoTest extends WebTestCase
{
	public $fixtures=array(
		'contactos'=>'Contacto',
	);

	public function testShow()
	{
		$this->open('?r=contacto/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=contacto/create');
	}

	public function testUpdate()
	{
		$this->open('?r=contacto/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=contacto/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=contacto/index');
	}

	public function testAdmin()
	{
		$this->open('?r=contacto/admin');
	}
}
