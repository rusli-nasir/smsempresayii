<?php

class Contacto extends BaseContacto
{
	// Add your model-specific methods here. This file will not be overriden by gtc except you force it.
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function init()
	{
		return parent::init();
	}

	public function __toString() {
		return (string) $this->nombres;

	}


	public function rules() 
	{
		return array_merge(
			/*array('column1, column2', 'rule'),*/
			parent::rules()
		);
	}

	public function behaviors()
	{
		return array_merge(
			/*array(
				'BehaviourName' => array(
					'class' => 'CWhateverBehavior'
				)
			),*/
			parent::behaviors()
		);
	}

		public function getName()
	{
		return $this->contactoid;	}
	}
