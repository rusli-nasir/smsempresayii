<?php

/**
 * This is the model base class for the table "{{usuario}}".
 *
 * Columns in table "{{usuario}}" available as properties of the model:
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $apellido
 * @property string $nombre
 * @property string $rolid
 * @property string $nivelid
 * @property integer $activo
 *
 * Relations of table "{{usuario}}" available as properties of the model:
 * @property Envios[] $envioses
 * @property Rol $rol
 * @property Nivel $nivel
 */
abstract class BaseUsuario extends GActiveRecord{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return '{{usuario}}';
	}

	public function rules()
	{
		return array(
			array('username, password, rolid, nivelid, activo', 'required'),
			array('apellido, nombre', 'default', 'setOnEmpty' => true, 'value' => null),
			array('activo', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>15),
			array('password', 'length', 'max'=>100),
			array('apellido, nombre', 'length', 'max'=>30),
			array('rolid, nivelid', 'length', 'max'=>11),
			array('id, username, password, apellido, nombre, rolid, nivelid, activo', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'envioses' => array(self::HAS_MANY, 'Envios', 'usuarioid'),
			'rol' => array(self::BELONGS_TO, 'Rol', 'rolid'),
			'nivel' => array(self::BELONGS_TO, 'Nivel', 'nivelid'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app', 'ID'),
			'username' => Yii::t('app', 'Username'),
			'password' => Yii::t('app', 'Password'),
			'apellido' => Yii::t('app', 'Apellido'),
			'nombre' => Yii::t('app', 'Nombre'),
			'rolid' => Yii::t('app', 'Rolid'),
			'nivelid' => Yii::t('app', 'Nivelid'),
			'activo' => Yii::t('app', 'Activo'),
		);
	}


	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('username', $this->username, true);
		$criteria->compare('password', $this->password, true);
		$criteria->compare('apellido', $this->apellido, true);
		$criteria->compare('nombre', $this->nombre, true);
		$criteria->compare('rolid', $this->rolid);
		$criteria->compare('nivelid', $this->nivelid);
		$criteria->compare('activo', $this->activo);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
