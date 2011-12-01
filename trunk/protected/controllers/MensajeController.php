<?php

class MensajeController extends Controller {

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
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Mensaje('search');
        if (isset($_GET['Mensaje']))
            $model->attributes = $_GET['Mensaje'];
        if (Yii::app()->request->isAjaxRequest && isset($_GET['click']) && $_GET['click'] = 'details') {
            $this->renderPartial('_admin', array('model' => $model,'id' => $_GET['Mensaje']['envioid']), false, true);
        }else{
            throw new CHttpException(404, Yii::t('App', 'The requested page does not exist.'));
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     */
    public function loadModel() {
        if ($this->_model === null) {
            if (isset($_GET['id']))
                $this->_model = Mensaje::model()->findbyPk($_GET['id']);
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
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'mensaje-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
