<?php

/**
 * This is the model class for table "envios_instantaneos".
 *
 * The followings are the available columns in table 'envios_instantaneos':
 * @property string $Fecha
 * @property string $Usuario
 * @property string $Telefono
 * @property string $Operadora
 * @property string $Mensaje
 * @property string $Estado
 */
class EnviosInstantaneos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return EnviosInstantaneos the static model class
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
		return 'envios_instantaneos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Telefono, Operadora, Mensaje, Estado', 'required'),
			array('Usuario', 'length', 'max'=>61),
			array('Telefono', 'length', 'max'=>15),
			array('Operadora', 'length', 'max'=>20),
			array('Mensaje, Estado', 'length', 'max'=>200),
			array('Fecha', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Fecha, Usuario, Telefono, Operadora, Mensaje, Estado', 'safe', 'on'=>'search'),
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
			'Fecha' => 'Fecha',
			'Usuario' => 'Usuario',
			'Telefono' => 'Telefono',
			'Operadora' => 'Operadora',
			'Mensaje' => 'Mensaje',
			'Estado' => 'Estado',
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

		$criteria->compare('Fecha',$this->Fecha,true);
		$criteria->compare('Usuario',$this->Usuario,true);
		$criteria->compare('Telefono',$this->Telefono,true);
		$criteria->compare('Operadora',$this->Operadora,true);
		$criteria->compare('Mensaje',$this->Mensaje,true);
		$criteria->compare('Estado',$this->Estado,true);
		
		$_SESSION['datos_filtrados'] = new CActiveDataProvider($this, array(
		'criteria'=>$criteria,
		'sort'=>$sort,
		'pagination'=>false,
		));

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'    => array(
                        'pageSize' => 25,
                    ),
		));
	}
}