<?php

/**
 * This is the model class for table "{{infosms}}".
 *
 * The followings are the available columns in table '{{infosms}}':
 * @property string $id
 * @property string $keyword
 * @property string $descripcion
 * @property string $fecha_creacion
 * @property string $mensaje1
 * @property string $mensaje2
 * @property string $id_usuario
 */
class Infosms extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Infosms the static model class
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
		return '{{infosms}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('keyword, mensaje1, id_usuario', 'required'),
			array('keyword', 'length', 'max'=>15),
			array('keyword', 'unique', 'className' => 'Infosms', 'attributeName' => 'keyword'),
			array('keyword', 'unique', 'className' => 'Encuesta', 'attributeName' => 'keyword'),
			array('descripcion', 'length', 'max'=>100),
			array('mensaje1, mensaje2', 'length', 'max'=>160),
			array('id_usuario', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, keyword, descripcion, mensaje1, mensaje2, id_usuario', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'keyword' => 'Keyword',
			'descripcion' => 'Descripcion',
			'fecha_creacion' => 'Fecha Creacion',
			'mensaje1' => 'Mensaje1',
			'mensaje2' => 'Mensaje2',
			'id_usuario' => 'Id Usuario',
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

		
		$criteria->compare('keyword',$this->keyword,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('mensaje1',$this->mensaje1,true);
		$criteria->compare('mensaje2',$this->mensaje2,true);
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}