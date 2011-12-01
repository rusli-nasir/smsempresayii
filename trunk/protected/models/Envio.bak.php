<?php

/**
 * This is the model class for table "{{envio}}".
 *
 * The followings are the available columns in table '{{envio}}':
 * @property string $id
 * @property string $grupos
 * @property string $asunto
 * @property string $mensaje
 * @property string $tipoenvio
 * @property string $fechaInicio
 * @property string $fechaFin
 * @property integer $activo
 */
class Envio extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return Envio the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{envio}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('grupos, mensaje, tipoenvio,asunto,fechaInicio,fechaFin', 'required'),
            array('activo', 'numerical', 'integerOnly' => true),
            array('grupos', 'length', 'max' => 500),
            array('asunto', 'length', 'max' => 150),
            array('mensaje', 'length', 'max' => 200),
            array('tipoenvio', 'length', 'max' => 11),
            array('frecuencia', 'length', 'max' => 27),
            array('fechaInicio, fechaFin', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, grupos, asunto, mensaje, tipoenvio, fechaInicio, fechaFin, activo', 'safe', 'on' => 'search'),
        );
    }

    public function beforeSave() {
        $this->fechaInicio = date('Y/m/d',strtotime($this->fechaInicio));
        $this->fechaFin =date('Y/m/d',strtotime($this->fechaFin));



        return parent::beforeSave();
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'tipoenvio0' => array(self::BELONGS_TO, 'Tipoenvio', 'tipoenvio'),
            'mensajes' => array(self::HAS_MANY, 'Mensaje', 'envioid'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'grupos' => 'Grupos',
            'asunto' => 'Asunto',
            'mensaje' => 'Mensaje',
            'tipoenvio' => 'Tipo de Envio',
            'fechaInicio' => 'Desde',
            'fechaFin' => 'hasta',
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
        $criteria->compare('id', $this->id, true);
        $criteria->compare('grupos', $this->grupos, true);
        $criteria->compare('asunto', $this->asunto, true);
        $criteria->compare('mensaje', $this->mensaje, true);
        $criteria->compare('tipoenvio', $this->tipoenvio, true);
        $criteria->compare('fechaInicio', $this->fechaInicio, true);
        $criteria->compare('fechaFin', $this->fechaFin, true);
        $criteria->compare('activo', $this->activo);
        $sort = new CSort();
        $sort->defaultOrder='id DESC';

        return new CActiveDataProvider('Envio', array(
                    'criteria' => $criteria,
                    'sort'          =>$sort,
                    'pagination'    => array(
                        'pageSize' => 25,
                    ),
                ));
    }

}