<?php

/**
 * This is the model class for table "envios_filtrados".
 *
 * The followings are the available columns in table 'envios_filtrados':
 * @property string $id
 * @property string $Fecha
 * @property string $Usuario
 * @property string $Telefono
 * @property string $Operadora
 * @property string $Mensaje
 * @property string $Estado
 * @property string $Grupos
 */
class EnvioNotificacion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return EnvioNotificacion the static model class
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
		return '{{envios_filtrados}}';
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
			array('id, Operadora', 'length', 'max'=>20),
			array('Usuario', 'length', 'max'=>61),
			array('Telefono', 'length', 'max'=>15),
			array('Mensaje, Estado', 'length', 'max'=>200),
			array('Grupos', 'length', 'max'=>341),
			array('Fecha', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, Fecha, Usuario, Telefono, Operadora, Mensaje, Estado, Grupos', 'safe', 'on'=>'search'),
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
			'Fecha' => 'Fecha',
			'Usuario' => 'Usuario',
			'Telefono' => 'Telefono',
			'Operadora' => 'Operadora',
			'Mensaje' => 'Mensaje',
			'Estado' => 'Estado',
			'Grupos' => 'Grupos',
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
		if(isset($_SESSION["fecha1"]) && isset($_SESSION["fecha2"]) && isset($_SESSION["ids_gupos"]) && $_SESSION["fecha1"] != "" && $_SESSION["fecha2"] != "" && $_SESSION["ids_gupos"]!=""){
		$fecha_2=explode('-', $_SESSION["fecha2"]);
		$criteria->condition = "grupoid in (".$_SESSION["ids_gupos"].") and Fecha BETWEEN '".$_SESSION["fecha1"]."' and '".$fecha_2[0].'-'.$fecha_2[1].'-'.($fecha_2[2]+1)."'";
		}
		else{
		if(isset($_SESSION["fecha1"]) && isset($_SESSION["fecha2"]) && isset($_SESSION["ids_gupos"]) && $_SESSION["fecha1"] != "" && $_SESSION["fecha2"] != "" && $_SESSION["ids_gupos"]==""){
			$fecha_2=explode('-', $_SESSION["fecha2"]);
			$criteria->condition = "Fecha BETWEEN '".$_SESSION["fecha1"]."' and '".$fecha_2[0].'-'.$fecha_2[1].'-'.($fecha_2[2]+1)."'";
		}
		else{
			if(isset($_SESSION["fecha1"]) && isset($_SESSION["fecha2"]) && isset($_SESSION["ids_gupos"]) && $_SESSION["fecha1"] == "" && $_SESSION["fecha2"] == "" && $_SESSION["ids_gupos"]!=""){
				$criteria->condition = "grupoid in (".$_SESSION["ids_gupos"].")";

			}

		}
		}
                $criteria->addCondition('tipoenvio IN(5,6)');

                //$criteria->condition.=" AND tipoenvio IN(5,6)";
		$criteria->compare('Fecha',$this->Fecha,true);
		$criteria->compare('Usuario',$this->Usuario,true);
		$criteria->compare('Telefono',$this->Telefono,true);
		$criteria->compare('Operadora',$this->Operadora,true);
		$criteria->compare('Mensaje',$this->Mensaje,true);
		$criteria->compare('Estado',$this->Estado,true);
		//$criteria->compare('Tipoenvio',5,false);



//`grupos`.`nombre` in (" . $grupo . ")

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