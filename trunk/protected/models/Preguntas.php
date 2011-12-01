<?php

/**
 * This is the model class for table "{{preguntas}}".
 *
 * The followings are the available columns in table '{{preguntas}}':
 * @property string $id
 * @property string $id_encuesta
 * @property string $pregunta
 *
 * The followings are the available model relations:
 * @property Encuesta $idEncuesta
 * @property Respuestas[] $respuestases
 */
class Preguntas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Preguntas the static model class
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
		return '{{preguntas}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_encuesta, pregunta', 'required'),
			array('id_encuesta', 'length', 'max'=>11),
			array('pregunta', 'length', 'max'=>160),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_encuesta, pregunta', 'safe', 'on'=>'search'),
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
			'idEncuesta' => array(self::BELONGS_TO, 'Encuesta', 'id_encuesta'),
			'respuestases' => array(self::HAS_MANY, 'Respuestas', 'id_pregunta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_encuesta' => 'Keyword',
			'pregunta' => 'Pregunta',
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
		
		$criteria->with =array('idEncuesta');
		$criteria->condition = "id_encuesta=".$_SESSION["encuesta"];
		$criteria->compare('idEncuesta.keyword', $this->id_encuesta, true);
		$criteria->compare('id',$this->id,true);		
		$criteria->compare('pregunta',$this->pregunta,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}