<?php

/**
 * This is the model class for table "envios_operadora".
 *
 * The followings are the available columns in table 'envios_operadora':
 * @property string $fecha
 * @property string $Claro
 * @property string $Movistar
 */
class EnviosOperadora extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return EnviosOperadora the static model class
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
		return 'envios_operadora';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha', 'length', 'max'=>10),
			array('Claro, Movistar', 'length', 'max'=>21),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('fecha, Claro, Movistar', 'safe', 'on'=>'search'),
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
			'fecha' => 'Fecha',
			'Claro' => 'Claro',
			'Movistar' => 'Movistar',
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
if(isset($_SESSION["ofecha1"]) && isset($_SESSION["ofecha2"]) && $_SESSION["ofecha1"] != "" && $_SESSION["ofecha2"] != ""){
			$fecha_2=explode('-', $_SESSION["ofecha2"]);
			$criteria->condition = "fecha BETWEEN '".$_SESSION["ofecha1"]."' and '".$fecha_2[0].'-'.$fecha_2[1].'-'.($fecha_2[2]+1)."'";	
		}
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('Claro',$this->Claro,true);
		$criteria->compare('Movistar',$this->Movistar,true);
		
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