<?php

/**
 * This is the model class for table "{{usuario}}".
 *
 * The followings are the available columns in table '{{usuario}}':
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $apellido
 * @property string $nombre
 * @property string $rolid
 * @property string $nivelid
 * @property integer $activo
 *
 * The followings are the available model relations:
 * @property Envios[] $envioses
 * @property Rol $rol
 * @property Nivel $nivel
 */
class Usuario extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{usuario}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, rolid, nivelid, activo', 'required'),
			array('activo', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>15),
			array('password', 'length', 'max'=>100),
			array('apellido, nombre', 'length', 'max'=>30),
			array('rolid, nivelid', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, apellido, nombre, rolid, nivelid, activo', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'envioses' => array(self::HAS_MANY, 'Envios', 'usuarioid'),
			'rol' => array(self::BELONGS_TO, 'Rol', 'rolid'),
			'nivel' => array(self::BELONGS_TO, 'Nivel', 'nivelid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'apellido' => 'Apellido',
			'nombre' => 'Nombre',
			'rolid' => 'Rolid',
			'nivelid' => 'Nivelid',
			'activo' => 'Activo',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('rolid',$this->rolid,true);
		$criteria->compare('nivelid',$this->nivelid,true);
		$criteria->compare('activo',$this->activo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}