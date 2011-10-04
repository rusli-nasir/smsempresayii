<?php
$this->breadcrumbs = array(
    'Grupos' => array('admin'),
    $model->nombre,
);


$this->menu = array(
    array('label' => Yii::t('App', 'List') . ' Grupo', 'url' => array('index')),
    array('label' => Yii::t('App', 'Create') . ' Grupo', 'url' => array('create')),
    array('label' => Yii::t('App', 'Update') . ' Grupo', 'url' => array('update', 'id' => $model->grupoid)),
    array('label' => Yii::t('App', 'Delete') . ' Grupo', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->grupoid), 'confirm' => Yii::t('App', 'Are you sure to delete this item?'))),
    array('label' => Yii::t('App', 'Manage') . ' Grupo', 'url' => array('admin')),
    array('label' => Yii::t('App', 'Assign') . ' Contacto', 'url' => array('/grupocontacto/create')),
);
?>



<h1><?php echo Yii::t('App', 'View'); ?> Grupo #<?php echo $model->grupoid; ?></h1>



<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'grupoid',
        'nombre',
        'descripcion',
        'keyword',
        'createtime',
        array(
            'name' => 'activo',
            'value' => $model->activo ? Yii::t("App", "Yes") : Yii::t("App", "No"),
        ),
    ),
));
?>

