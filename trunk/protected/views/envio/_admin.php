<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'envio-grid',
    'dataProvider' => $model->search(),
    'columns' => array(
        array(
            'name' => 'id',
            'value' => $model->id,
            'htmlOptions' => array('style' => 'width:50px'),
        ),
        'asunto',
        'mensaje',
        array(
            'name' => 'tipoenvio',
            'value' => '$data->tipoenvio0->nombre',
        ),
        array(
            'name' => 'fechaInicio',
            'value' => 'date("d.m.Y",strtotime($data->fechaInicio))',
            'htmlOptions' => array('style' => 'width:80px'),
        ),
        array(
            'name' => 'fechaFin',
            'value' => 'date("d.m.Y",strtotime($data->fechaFin))',
        ),
        array(
            'name' => 'activo',
            'value' => '$data->activo?Yii::t("App","Yes"):Yii::t("App","No")',
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{update}',
        ),
    ),
));


?>
