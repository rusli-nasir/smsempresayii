<?php

class UsuarioController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to 'column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = 'column2';

    /**
     * @var string specifies the default action to be 'admin'. Default is index
     */
    public $defaultAction = 'admin';

    /**
     * @var CActiveRecord the currently loaded data model instance.
     */
    private $_model;

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Displays a particular model.
     */
    public function actionView() {
        $this->redirect('admin');
        $this->render('view', array(
            'model' => $this->loadModel(),
        ));
    }
    /**
     * Enviar password para webservice.
     */
    public function actionSendKeybyEmail() {
        $usuario = $this->loadModel();
        $key=sha1($usuario->username."|".$usuario->password);
        $headers = "From: ".Yii::app()->params['adminEmail']."\r\nReply-To: ".Yii::app()->params['adminEmail'];
        $msg="Estimado usuario,

La llave de acceso es la clave de verificación que comprueba su usuario y contraseña. Una vez comprobado, podra tener acceso a los servicios web que ofrece ".Yii::app()->name.". La llave es la siguiente: ".$key."

Si tiene dudas al respecto por favor comuniquese con nosotros.";
        if(mail($usuario->email, "Llave de acceso", $msg, $headers)){
            Yii::app()->user->setFlash('success', 'Su clave de acceso ha sido enviada.');
            $this->redirect('/usuario/admin');
        }else{
            Yii::app()->user->setFlash('error', 'El envío de correo falló.');
            $this->refresh();
        }

    }
    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Usuario;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Usuario'])) {
            $model->attributes = $_POST['Usuario'];
            if ($model->save())
                $this->redirect(array('admin'));
            //$this->redirect(array('view','id'=>$model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     */
    public function actionUpdate() {
        $model = $this->loadModel();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Usuario'])) {

            $password=$model->password;
            $vpassword=$password;
            $model->attributes = $_POST['Usuario'];
            if(isset($_POST['Usuario']['password'])&&!empty($_POST['Usuario']['password'])){
                $password=  Usuario::encrypting($_POST['Usuario']['password']);
                $vpassword=  Usuario::encrypting($_POST['Usuario']['verifyPassword']);
            }
                $model->password=$password;
                $model->verifyPassword=$vpassword;
            if ($model->save())
                $this->redirect(array('admin'));
            //$this->redirect(array('view','id'=>$model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page

            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
                'foreColor' => 0xFF9B25,
            ),
        );
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     */
    public function actionDelete() {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel()->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_POST['ajax']))
                $this->redirect(array('admin'));
        }
        else
            throw new CHttpException(400, Yii::t('App', 'Invalid request. Please do not repeat this request again.'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $this->redirect('admin');
        $dataProvider = new CActiveDataProvider('Usuario');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Usuario('search');
        if (isset($_GET['Usuario']))
            $model->attributes = $_GET['Usuario'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     */
    public function loadModel() {
        if ($this->_model === null) {
            if (isset($_GET['id']))
                $this->_model = Usuario::model()->findbyPk($_GET['id']);
            if ($this->_model === null)
                throw new CHttpException(404, Yii::t('App', 'The requested page does not exist.'));
        }
        return $this->_model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'usuario-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
