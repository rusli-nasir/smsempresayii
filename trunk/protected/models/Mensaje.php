<?php

/**
 * This is the model class for table "{{mensaje}}".
 *
 * The followings are the available columns in table '{{mensaje}}':
 * @property string $id
 * @property string $operadoraid
 * @property string $usuarioid
 * @property integer $estadoid
 * @property string $envioid
 * @property string $telefono
 * @property string $createtime
 * @property string $mensaje
 * @property string $grupoid
 */
class Mensaje extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Mensaje the static model class
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
		return '{{mensaje}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('operadoraid, usuarioid, estadoid, envioid, telefono, mensaje', 'required'),
			array('estadoid', 'numerical', 'integerOnly'=>true),
			array('operadoraid, usuarioid, grupoid', 'length', 'max'=>11),
			array('envioid', 'length', 'max'=>20),
			array('telefono', 'length', 'max'=>15),
			array('mensaje', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, operadoraid, usuarioid, estadoid, envioid, telefono, createtime, mensaje, grupoid', 'safe', 'on'=>'search'),
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
			'envio' => array(self::BELONGS_TO, 'Envio', 'envioid'),
			'estado' => array(self::BELONGS_TO, 'Estado', 'estadoid'),
			'operadora' => array(self::BELONGS_TO, 'Operadora', 'operadoraid'),
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
			'operadoraid' => 'Operadora',
			'usuarioid' => 'Usuario',
			'estadoid' => 'Estado',
			'envioid' => 'ID Envío',
			'telefono' => 'Teléfono',
			'createtime' => 'F. Creación',
			'mensaje' => 'Mensaje',
			'grupoid' => 'Grupo',
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
                $criteria->condition='envioid='.$_GET['envioid'];//$condition;
		$criteria->compare('id',$this->id,true);
		$criteria->compare('operadoraid',$this->operadoraid,true);
		$criteria->compare('usuarioid',$this->usuarioid,true);
		$criteria->compare('estadoid',$this->estadoid);
		$criteria->compare('envioid',$this->envioid,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('createtime',$this->createtime,true);
		$criteria->compare('mensaje',$this->mensaje,true);
		$criteria->compare('grupoid',$this->grupoid,true);
		return new CActiveDataProvider('Mensaje', array(
			'criteria'=>$criteria,
		));
	}
}