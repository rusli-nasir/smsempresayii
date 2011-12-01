<?php

/**
 * This is the model class for table "{{rol}}".
 *
 * The followings are the available columns in table '{{rol}}':
 * @property string $id
 * @property string $rol
 * @property string $descripcion
 * @property string $modulos
 * @property string $actions
 * @property integer $activo
 * if (isset($_POST['days']) && $type != 1) {
                $_POST['Envio']['frecuencia'] = join(',', $_POST['days']);
            }
 */
class Rol extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Rol the static model class
	 */
        public $cmodulos;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public function beforeSave() {
            if(isset($_POST['items'])){
                $this->modulos=join(',', $_POST['items']);
            }
            return parent::beforeSave();
        }
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{rol}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rol, activo', 'required'),
			array('activo', 'numerical', 'integerOnly'=>true),
			array('rol', 'length', 'max'=>20),
			array('descripcion', 'length', 'max'=>100),
			array('modulos', 'length', 'max'=>500),
			array('actions', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, rol, descripcion, modulos, actions, activo', 'safe', 'on'=>'search'),
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
			'usuarios' => array(self::HAS_MANY, 'Usuario', 'rolid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'rol' => 'Rol',
			'descripcion' => 'Descripcion',
			'cmodulos' => 'Modulos',
			'modulos' => 'Modulos',
			'actions' => 'Actions',
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
                $criteria->select = array('id', 'rol', 'descripcion', 'concat(\'<div class="cgrupo">\',REPLACE(modulos,\',\',\'</div> <div class="cgrupo">\'),\'</div><div class="clear"></div>\') AS cmodulos','modulos', 'activo');
                $criteria->group = 'id';
		$criteria->compare('id',$this->id,true);
		$criteria->compare('rol',$this->rol,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('modulos',$this->modulos,true);
		//$criteria->compare('actions',$this->actions,true);
		$criteria->compare('activo',$this->activo);

		return new CActiveDataProvider('Rol', array(
			'criteria'=>$criteria,
		));
	}
}