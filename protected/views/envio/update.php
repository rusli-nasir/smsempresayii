<?php
//$type = (isset($_GET['type']) && !empty($_GET['type'])) ? intval($_GET['type']) : 1;
$type = $model->tipoenvio;

$labelEnvios=array();
$labelEnvios[1]=Yii::t('App','Envio Instantaneo');
$labelEnvios[2]=Yii::t('App','Envio Programado');
$labelEnvios[3]=Yii::t('App','Conversaciones');

$this->breadcrumbs=array(
	'Envios SMS' => array('admin'),
	$labelEnvios[$type],
);


$this->menu = array(
    array('label'=>Yii::t('App', 'Manage').' Envio', 'url'=>array('admin')),
    array('label' => $labelEnvios[1], 'url' => array('/envio/create/?type=1')),
    array('label' => $labelEnvios[2], 'url' => array('/envio/create/?type=2')),
);
if ($type == 2) {
    $this->menu = array(
        array('label'=>Yii::t('App', 'Manage').' Envio', 'url'=>array('admin')),
        array('label' => $labelEnvios[1], 'url' => array('/envio/create/?type=1')),
        array('label' => $labelEnvios[3], 'url' => array('/envio/create/?type=3')),
    );
} else if ($type == 1) {
    $this->menu = array(
        array('label'=>Yii::t('App', 'Manage').' Envio', 'url'=>array('admin')),
        array('label' => $labelEnvios[2], 'url' => array('/envio/create/?type=2')),
        array('label' => $labelEnvios[3], 'url' => array('/envio/create/?type=3')),
    );
}
?>

<h1><?php echo $labelEnvios[$type];?> #<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form_'.$type, array('model'=>$model,'type'=>$type)); ?>