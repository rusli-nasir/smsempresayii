<?php

/**
 * This is the model class for table "{{variable}}".
 *
 * The followings are the available columns in table '{{variable}}':
 * @property string $id
 * @property string $nombre
 * @property string $valor
 * @property string $createtime
 * @property integer $activo
 */
class Variable extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Variable the static model class
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
		return '{{variable}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, valor, activo', 'required'),
			array('activo', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>20),
			array('nombre', 'unique',),
			array('nombre', 'match', 'pattern'=>'/^[a-zA-Z0-9\-_@]{1,20}$/','message'=>'El nombre no debe contener caracteres especiales'),
			array('nombre', 'match', 'pattern'=>'/^@(.*){1,20}$/','message'=>'El nombre debe iniciar con @'),
			array('valor', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, valor, createtime, activo', 'safe', 'on'=>'search'),
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
        public function beforeSave() {
            //if (strpos($this->nombre,'@')!==false){
                $this->nombre = '@'.strtolower(trim($this->nombre,'@'));
            //}
            return parent::beforeSave();
        }
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'valor' => 'Valor',
			'createtime' => 'Fecha Creación',
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

		$criteria->compare('nombre',$this->nombre,true);

		$criteria->compare('valor',$this->valor,true);

		$criteria->compare('createtime',$this->createtime,true);

		$criteria->compare('activo',$this->activo);

		return new CActiveDataProvider('Variable', array(
			'criteria'=>$criteria,
		));
	}
}