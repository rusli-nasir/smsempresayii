<?php

class GrupocontactoController extends GController {

    public $layout = 'column2';

    public function filters() {
        return array();
    }

    public function actionView() {
        $this->render('view', array(
            'model' => $this->loadModel(),
        ));
    }

    public function actionCreate() {
        $model = new Grupocontacto;

        //$this->performAjaxValidation($model, 'grupocontacto-form');

        if (isset($_POST['Grupocontacto'])) {
            $model->attributes = $_POST['Grupocontacto'];


            if ($model->save()) {
                $this->redirect(array('/grupo/admin', 'id' => $model->id));
            }
        } elseif (isset($_GET['Grupocontacto'])) {
            $model->attributes = $_GET['Grupocontacto'];
        }
        $this->render('create', array('model' => $model));
    }

    public function actionUpdate() {
        $model = $this->loadModel();

        $this->performAjaxValidation($model, 'grupocontacto-form');

        if (isset($_POST['Grupocontacto'])) {
            $model->attributes = $_POST['Grupocontacto'];


            if ($model->save()) {

                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete() {
        if (Yii::app()->request->isPostRequest) {
            $this->loadModel()->delete();

            if (!isset($_GET['ajax'])) {
                if (isset($_POST['returnUrl']))
                    $this->redirect($_POST['returnUrl']);
                else
                    $this->redirect(array('admin'));
            }
        }
        else
            throw new CHttpException(400,
                    Yii::t('app', 'Invalid request. Please do not repeat this request again.'));
    }

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Grupocontacto');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin() {
        $model = new Grupocontacto('search');
        $model->unsetAttributes();

        if (isset($_GET['Grupocontacto']))
            $model->attributes = $_GET['Grupocontacto'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

}
