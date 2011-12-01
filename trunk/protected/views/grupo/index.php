<?php
$this->breadcrumbs = array(
    'Grupos',
);


$this->menu = array(
    array('label' => Yii::t('App', 'Create') . ' Grupo', 'url' => array('create')),
    array('label' => Yii::t('App', 'Manage') . ' Grupo', 'url' => array('admin')),
);
?>



<h1>Grupos</h1>



<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>

