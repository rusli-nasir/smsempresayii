<?php

/**
 * This is the model base class for the table "{{contacto}}".
 *
 * Columns in table "{{contacto}}" available as properties of the model:
 * @property string $contactoid
 * @property string $nombres
 * @property string $telefono
 * @property string $fechaNacimiento
 * @property string $createtime
 * @property string $grupoInicial
 * @property integer $activo
 *
 * Relations of table "{{contacto}}" available as properties of the model:
 * @property Grupo[] $movistarGrupos
 */
abstract class BaseContacto extends GActiveRecord{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return '{{contacto}}';
	}

	public function rules()
	{
		return array(
			array('telefono, createtime', 'required'),
			array('nombres, fechaNacimiento, grupoInicial, activo', 'default', 'setOnEmpty' => true, 'value' => null),
			array('activo', 'numerical', 'integerOnly'=>true),
			array('nombres', 'length', 'max'=>50),
			array('telefono', 'length', 'max'=>15),
			array('grupoInicial', 'length', 'max'=>20),
			array('fechaNacimiento', 'safe'),
			array('contactoid, nombres, telefono, fechaNacimiento, createtime, grupoInicial, activo', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'movistarGrupos' => array(self::MANY_MANY, 'Grupo', '{{grupocontacto}}(contactoid, grupoid)'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'contactoid' => Yii::t('app', 'Contactoid'),
			'nombres' => Yii::t('app', 'Nombres'),
			'telefono' => Yii::t('app', 'Telefono'),
			'fechaNacimiento' => Yii::t('app', 'Fecha Nacimiento'),
			'createtime' => Yii::t('app', 'Createtime'),
			'grupoInicial' => Yii::t('app', 'Grupo Inicial'),
			'activo' => Yii::t('app', 'Activo'),
		);
	}


	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('contactoid', $this->contactoid, true);
		$criteria->compare('nombres', $this->nombres, true);
		$criteria->compare('telefono', $this->telefono, true);
		$criteria->compare('fechaNacimiento', $this->fechaNacimiento, true);
		$criteria->compare('createtime', $this->createtime, true);
		$criteria->compare('grupoInicial', $this->grupoInicial, true);
		$criteria->compare('activo', $this->activo);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
