<?php

/**
 * This is the model class for table "{{respuestas}}".
 *
 * The followings are the available columns in table '{{respuestas}}':
 * @property string $id
 * @property string $respuesta
 * @property string $id_pregunta
 * @property string $sig_preg
 *
 * The followings are the available model relations:
 * @property Preguntas $idPregunta
 */
class Respuestas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Respuestas the static model class
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
		return '{{respuestas}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('respuesta, id_pregunta', 'required'),
			array('respuesta', 'length', 'max'=>160),
			array('id_pregunta, sig_preg', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, respuesta, id_pregunta, sig_preg', 'safe', 'on'=>'search'),
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
			'idPregunta' => array(self::BELONGS_TO, 'Preguntas', 'id_pregunta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'respuesta' => 'Respuesta',
			'id_pregunta' => 'Id Pregunta',
			'sig_preg' => 'Sig Preg',
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
		$criteria->compare('respuesta',$this->respuesta,true);
		$criteria->compare('id_pregunta',$this->id_pregunta,true);
		$criteria->compare('sig_preg',$this->sig_preg,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}