<?php

/**
 * This is the model class for table "listaContactos".
 *
 * The followings are the available columns in table 'listaContactos':
 * @property string $contactoid
 * @property string $nombres
 * @property string $telefono
 * @property string $fechaNacimiento
 * @property string $GrupoInicial
 * @property integer $activo
 */
class ListaContactos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ListaContactos the static model class
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
		return 'listaContactos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('telefono', 'required'),
			array('activo', 'numerical', 'integerOnly'=>true),
			array('contactoid', 'length', 'max'=>20),
			array('nombres', 'length', 'max'=>50),
			array('telefono', 'length', 'max'=>15),
			array('GrupoInicial', 'length', 'max'=>369),
			array('fechaNacimiento', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('contactoid, nombres, telefono, fechaNacimiento, GrupoInicial, activo', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'contactoid' => 'Contactoid',
			'nombres' => 'Nombres',
			'telefono' => 'Telefono',
			'fechaNacimiento' => 'Fecha Nacimiento',
			'GrupoInicial' => 'Grupo Inicial',
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

		$criteria->compare('contactoid',$this->contactoid,true);
		$criteria->compare('nombres',$this->nombres,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('fechaNacimiento',$this->fechaNacimiento,true);
		$criteria->compare('GrupoInicial',$this->GrupoInicial,true);
		$criteria->compare('activo',$this->activo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}