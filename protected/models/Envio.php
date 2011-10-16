<?php

/**
 * This is the model class for table "{{envio}}".
 *
 * The followings are the available columns in table '{{envio}}':
 * @property string $id
 * @property string $asunto
 * @property string $tipoenvio
 * @property string $fechaInicio
 * @property string $fechaFin
 * @property integer $activo
 *
 * The followings are the available model relations:
 * @property Tipoenvio $tipoenvio0
 * @property Mensaje[] $mensajes
 */
class Envio extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Envio the static model class
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
		return '{{envio}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('activo', 'numerical', 'integerOnly'=>true),
			array('asunto', 'length', 'max'=>150),
			array('tipoenvio', 'length', 'max'=>11),
			array('fechaInicio, fechaFin', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, asunto, tipoenvio, fechaInicio, fechaFin, activo', 'safe', 'on'=>'search'),
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
			'tipoenviofk' => array(self::BELONGS_TO, 'Tipoenvio', 'tipoenvio'),
			'mensajesfk' => array(self::HAS_MANY, 'Mensaje', 'envioid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'asunto' => 'Asunto',
			'tipoenvio' => 'Tipoenvio',
			'fechaInicio' => 'Fecha Inicio',
			'fechaFin' => 'Fecha Fin',
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
		$criteria->compare('asunto',$this->asunto,true);
		$criteria->compare('tipoenvio',$this->tipoenvio,true);
		$criteria->compare('fechaInicio',$this->fechaInicio,true);
		$criteria->compare('fechaFin',$this->fechaFin,true);
		$criteria->compare('activo',$this->activo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}