<?php

/**
 * This is the model class for table "{{contacto}}".
 *
 * The followings are the available columns in table '{{contacto}}':
 * @property string $contactoid
 * @property string $nombres
 * @property string $telefono
 * @property string $fechaNacimiento
 * @property string $createtime
 * @property string $grupoInicial
 * @property integer $activo
 *
 * The followings are the available model relations:
 * @property Grupocontacto[] $grupocontactos
 */
class Contacto extends CActiveRecord {

    public $grupos;

    /**
     * Returns the static model of the specified AR class.
     * @return Contacto the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{contacto}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('telefono', 'required'),
            array('activo', 'numerical', 'integerOnly' => true),
            array('nombres', 'length', 'max' => 50),
            array('telefono', 'length', 'max' => 15),
            array('grupoInicial', 'length', 'max' => 100),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('c.contactoid, nombres, telefono, c.createtime, grupos, c.activo', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'grupocontactos' => array(self::HAS_MANY, 'Grupocontacto', 'contactoid'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'contactoid' => 'ID',
            'nombres' => 'Nombres',
            'telefono' => 'Teléfono',
            'createtime' => 'F. Registro',
            'grupos' => 'Grupos',
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
        $sort = new CSort();
        $sort->defaultOrder='c.contactoid DESC';
        $sort->attributes =
                array(
                    'contactoid'        => array('asc' => 'c.contactoid',
                                                'desc' => 'c.contactoid DESC',),
                    'nombres'           => array('asc' => 'nombres',
                                                'desc' => 'nombres DESC',),
                    'telefono'          => array('asc' => 'telefono',
                                                'desc' => 'telefono DESC',),
                    'createtime'        => array('asc' => 'c.createtime',
                                                'desc' => 'c.createtime DESC',),
                    'grupos'            => array('asc' => 'g.nombre',
                                                'desc' => 'g.nombre DESC',),
        );
        $criteria = new CDbCriteria;

        $criteria->join = 'INNER JOIN {{grupocontacto}} gc ON(gc.contactoid=c.contactoid) INNER JOIN {{grupo}} g ON(gc.grupoid=g.grupoid)';
        $criteria->select = array('c.contactoid', 'nombres', 'telefono', 'c.createtime', 'concat(\'<div class="cgrupo">\',group_concat(g.nombre separator \'</div> <div class="cgrupo">\'),\'</div><div class="clear"></div>\') AS grupos', 'c.activo');
        $criteria->group = 'c.contactoid';
        $criteria->alias = 'c';

        $criteria->compare('c.contactoid', $this->contactoid, true);
        $criteria->compare('nombres', $this->nombres, true);
        $criteria->compare('telefono', $this->telefono, true);
        $criteria->compare('c.createtime', $this->createtime, true);
        $criteria->compare('g.grupoid', $this->grupos, true);
        $criteria->compare('c.activo', $this->activo);

        return new CActiveDataProvider($this, array(
                    'criteria'      => $criteria,
                    'sort'          =>$sort,
                    'pagination'    => array(
                        'pageSize' => 25,
                    ),
                ));
    }

}