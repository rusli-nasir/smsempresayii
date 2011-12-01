<?php
$this->breadcrumbs = array(
    'Grupos' => array('admin'),
    Yii::t('App', 'Create'),
);


$this->menu = array(
    array('label' => Yii::t('App', 'Manage') . ' Grupo', 'url' => array('admin')),
);
?>



<h1><?php echo Yii::t('App', 'Create'); ?> Grupo</h1>



<?php echo $this->renderPartial('_form', array('model' => $model)); ?>