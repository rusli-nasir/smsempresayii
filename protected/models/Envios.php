<?php

/**
 * This is the model class for table "{{envios}}".
 *
 * The followings are the available columns in table '{{envios}}':
 * @property string $id
 * @property string $operadoraid
 * @property string $usuarioid
 * @property integer $estadoid
 * @property integer $conversationid
 * @property integer $programacionid
 * @property string $telefono
 * @property string $fhoraenvio
 * @property string $mensaje
 */
class Envios extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Envios the static model class
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
		return '{{envios}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('operadoraid, usuarioid, estadoid, conversationid, programacionid, telefono, fhoraenvio, mensaje', 'required'),
			array('estadoid, conversationid, programacionid', 'numerical', 'integerOnly'=>true),
			array('operadoraid, usuarioid', 'length', 'max'=>11),
			array('telefono', 'length', 'max'=>15),
			array('mensaje', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, operadoraid, usuarioid, estadoid, conversationid, programacionid, telefono, fhoraenvio, mensaje', 'safe', 'on'=>'search'),
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
			'operadora' => array(self::BELONGS_TO, 'SystemOperadora', 'operadoraid'),
			'estado' => array(self::BELONGS_TO, 'Estado', 'estadoid'),
			'usuario' => array(self::BELONGS_TO, 'Usuario', 'usuarioid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'operadoraid' => 'Operadoraid',
			'usuarioid' => 'Usuarioid',
			'estadoid' => 'Estadoid',
			'conversationid' => 'Conversationid',
			'programacionid' => 'Programacionid',
			'telefono' => 'Telefono',
			'fhoraenvio' => 'Fhoraenvio',
			'mensaje' => 'Mensaje',
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

		$criteria->compare('operadoraid',$this->operadoraid,true);

		$criteria->compare('usuarioid',$this->usuarioid,true);

		$criteria->compare('estadoid',$this->estadoid);

		$criteria->compare('conversationid',$this->conversationid);

		$criteria->compare('programacionid',$this->programacionid);

		$criteria->compare('telefono',$this->telefono,true);

		$criteria->compare('fhoraenvio',$this->fhoraenvio,true);

		$criteria->compare('mensaje',$this->mensaje,true);

		return new CActiveDataProvider('Envios', array(
			'criteria'=>$criteria,
		));
	}
}