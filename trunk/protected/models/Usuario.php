<?php

/**
 * This is the model class for table "{{usuario}}".
 *
 * The followings are the available columns in table '{{usuario}}':
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $nombre
 * @property string $apellido
 * @property string $email
 * @property string $rolid
 * @property string $nivelid
 * @property integer $activo
 * @property string $dependid
 */
class Usuario extends CActiveRecord {

    public $verifyPassword;
    public $verifyCode;

    /**
     * Returns the static model of the specified AR class.
     * @return Usuario the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{usuario}}';
    }
    public function beforeSave() {

        if(isset($_POST['Usuario']['nivelid'])&&$_POST['Usuario']['nivelid']==2){
            $this->dependid=intval($_POST['operadora']);
        }elseif($this->isNewRecord){
            $this->dependid=Yii::app()->user->id;
        }
        if($this->isNewRecord)
            $this->password = $this->encrypting($this->password);
        return parent::beforeSave();
    }
    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        $rules=array(
            array('nombre,apellido,username,email,rolid, nivelid, activo', 'required'),
            array('activo', 'numerical', 'integerOnly' => true),
            array('activo', 'default', 'value' => 1),
            array('username', 'length', 'max' => 15, 'min' => 3),
            array('username', 'unique'),
            array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u'),
            array('password', 'length', 'max' => 128, 'min' => 4),
            array('password,verifyPassword', 'required'),
            array('password', 'compare', 'compareAttribute' => 'verifyPassword'),
            array('nombre, apellido', 'length', 'max' => 30),
            array('email', 'length', 'max' => 60),
            array('email', 'unique'),
            array('email', 'email'),
            array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements()),
            array('rolid, nivelid, dependid', 'length', 'max' => 11),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, username, password, nombre, apellido, email, rolid, nivelid, activo, dependid', 'safe', 'on' => 'search'),
        );
        return $rules;
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'mensajes' => array(self::HAS_MANY, 'Mensaje', 'usuarioid'),
            'rol' => array(self::BELONGS_TO, 'Rol', 'rolid'),
            'nivel' => array(self::BELONGS_TO, 'Nivel', 'nivelid'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'username' => 'Usuario',
            'password' => 'Contraseña',
            'verifyPassword' => 'Repetir Contraseña',
            'verifyCode' => 'Código Verificación',
            'nombre' => 'Nombre',
            'apellido' => 'Apellidos',
            'email' => 'Correo Electrónico',
            'rolid' => 'Rol',
            'nivelid' => 'Nivel',
            'activo' => 'Activo',
            'dependid' => 'Dependencia',
        );
    }

    /**
     * @return hash string.
     */
    public static function encrypting($string="", $hash="md5") {
        if ($hash == "md5")
            return md5($string);
        if ($hash == "sha1")
            return sha1($string);
        else
            return hash($hash, $string);
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
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('apellido', $this->apellido, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('rolid', $this->rolid, true);
        $criteria->compare('nivelid', $this->nivelid, true);
        $criteria->compare('activo', $this->activo);
        $criteria->compare('dependid', $this->dependid, true);
        $nivel=Yii::app()->user->nivel;
        if($nivel>1){
                if($nivel==2){
                    $criteria->condition=sprintf('(nivelid > %d AND dependid = %d) || id = %d',$nivel,Yii::app()->user->id,Yii::app()->user->id);
                }else{
                    $criteria->condition=sprintf('id=%d',Yii::app()->user->id);
                }

        }

        return new CActiveDataProvider('Usuario', array(

                    'criteria' => $criteria,
                ));
    }

}