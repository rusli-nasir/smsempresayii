<?php

/**
 * This is the model class for table "{{grupo}}".
 *
 * The followings are the available columns in table '{{grupo}}':
 * @property string $grupoid
 * @property string $nombre
 * @property string $descripcion
 * @property string $keyword
 * @property string $createtime
 * @property integer $activo
 */
class Grupo extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return Grupo the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{grupo}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nombre', 'required'),
            array('activo', 'numerical', 'integerOnly' => true),
            array('nombre', 'length', 'max' => 20),
            array('nombre', 'unique'),
            array('descripcion', 'length', 'max' => 500),
            array('keyword', 'length', 'max' => 15),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('grupoid, nombre, descripcion, keyword, createtime, activo', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'grupocontactos' => array(self::HAS_MANY, 'Grupocontacto', 'grupoid'),
            /*'movistar_contactos' => array(self::MANY_MANY, 'Contacto', '{{grupocontacto}}(contactoid, grupoid)'),*/
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'grupoid' => 'ID',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripción',
            'keyword' => 'Keyword',
            'createtime' => 'Fecha&nbsp;Creación',
            'activo' => 'Activo',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;
        $criteria->compare('grupoid', $this->grupoid, true);
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('descripcion', $this->descripcion, true);
        $criteria->compare('keyword', $this->keyword, true);
        $criteria->compare('createtime', $this->createtime, true);
        $criteria->compare('activo', $this->activo);
        return new CActiveDataProvider('Grupo', array(
                    'criteria' => $criteria,
                ));
    }

}