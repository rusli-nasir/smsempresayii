<?php
$type = (isset($_GET['type']) && !empty($_GET['type'])) ? intval($_GET['type']) : 1;
$labelEnvios = array();
$labelEnvios[1] = Yii::t('App', 'Envio Instantaneo');
$labelEnvios[2] = Yii::t('App', 'Envio Programado');
$labelEnvios[3] = Yii::t('App', 'Conversaciones');



if ($type == 3) {
    $this->menu = array(
        array('label' => Yii::t('App','Create')." variable", 'url' => array('/variable/create')),
        array('label' => $labelEnvios[1], 'url' => array('/envio/create/?type=1')),
        array('label' => $labelEnvios[2], 'url' => array('/envio/create/?type=2')),
    );
    $conversation = (isset($_GET['cid']) && !empty($_GET['cid'])) ? intval($_GET['cid']) : 0;
    $this->breadcrumbs = array(
        $labelEnvios[$type] => array('/conversacion/admin'),
        "Envio SMS",
    );
} else if ($type == 2) {
    $this->menu = array(
        array('label' => Yii::t('App','Create')." variable", 'url' => array('/variable/create')),
        array('label' => $labelEnvios[1], 'url' => array('/envio/create/?type=1')),
        array('label' => $labelEnvios[3], 'url' => array('/conversacion/admin')),
    );
    $this->breadcrumbs = array(
        'Envios SMS' => array('admin'),
        $labelEnvios[$type],
    );
} else if ($type == 1) {
    $this->menu = array(
        array('label' => Yii::t('App','Create')." variable", 'url' => array('/variable/create')),
        array('label' => $labelEnvios[2], 'url' => array('/envio/create/?type=2')),
        array('label' => $labelEnvios[3], 'url' => array('/conversacion/admin')),
    );
    $this->breadcrumbs = array(
        'Envios SMS' => array('admin'),
        $labelEnvios[$type],
    );
    $model->fechaInicio = date('d-m-Y');
    $model->fechaFin = date('d-m-Y');
}
?>

<h1><?php echo $labelEnvios[$type]; ?></h1>

<?php
if (isset($conversation)) {
    echo $this->renderPartial('_form_' . $type, array('model' => $model, 'type' => $type, 'conversation' => $conversation));
} else {
    echo $this->renderPartial('_form_' . $type, array('model' => $model, 'type' => $type));
}
?>