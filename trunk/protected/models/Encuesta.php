<?php

/**
 * This is the model class for table "{{encuesta}}".
 *
 * The followings are the available columns in table '{{encuesta}}':
 * @property string $id
 * @property string $keyword
 * @property string $descripcion
 * @property string $fecha_creacion
 * @property string $id_usuario
 *
 * The followings are the available model relations:
 * @property Preguntas[] $preguntases
 */
class Encuesta extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Encuesta the static model class
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
		return '{{encuesta}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('keyword, id_usuario', 'required'),
			array('keyword', 'length', 'max'=>15),
			array('descripcion', 'length', 'max'=>100),
			array('id_usuario', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, keyword, descripcion, id_usuario', 'safe', 'on'=>'search'),
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
			'preguntases' => array(self::HAS_MANY, 'Preguntas', 'id_encuesta'),
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('keyword',$this->keyword,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('id_usuario',$this->id_usuario,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}