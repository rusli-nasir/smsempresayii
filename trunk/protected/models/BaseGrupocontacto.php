<?php

/**
 * This is the model base class for the table "{{grupocontacto}}".
 *
 * Columns in table "{{grupocontacto}}" available as properties of the model:
 * @property string $id
 * @property string $contactoid
 * @property string $grupoid
 *
 * Relations of table "{{grupocontacto}}" available as properties of the model:
 * @property Contacto $contacto
 * @property Grupo $grupo
 */
abstract class BaseGrupocontacto extends GActiveRecord{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return '{{grupocontacto}}';
	}

	public function rules()
	{
		return array(
			array('contactoid, grupoid', 'required'),
			array('contactoid', 'length', 'max'=>20),
			array('grupoid', 'length', 'max'=>11),
			array('id, contactoid, grupoid', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'contacto' => array(self::BELONGS_TO, 'Contacto', 'contactoid'),
			'grupo' => array(self::BELONGS_TO, 'Grupo', 'grupoid'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app', 'ID'),
			'contactoid' => Yii::t('app', 'Contactoid'),
			'grupoid' => Yii::t('app', 'Grupoid'),
		);
	}


	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('contactoid', $this->contactoid);
		$criteria->compare('grupoid', $this->grupoid);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
