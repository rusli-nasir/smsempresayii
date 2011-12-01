
<h1>Mensajes Envio #<?php echo $_GET['envioid']; ?></h1>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'mensaje-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'class' => 'CCheckBoxColumn',
        ),
        array(
            'name' => 'id',
            'value' => $model->id,
            'htmlOptions' => array('style' => 'width:50px'),
        ),
        'telefono',
        array(
            'name' => 'operadoraid',
            'value' => '$data->operadora->nombre',
            'filter' => CHtml::listData(Operadora::model()->findAll(), 'id', 'nombre'),
        ),/*
        array(
            'name' => 'usuarioid',
            'value' => '$data->usuario->username',
            'filter' => CHtml::listData(Usuario::model()->findAll(), 'id', 'username'),
        ),*/
        array(
            'name' => 'estadoid',
            'value' => '$data->estado->nombre',
            'filter' => CHtml::listData(Estado::model()->findAll(), 'id', 'nombre'),
        ),/*
        array(
            'name' => 'envioid',
            'value' => '$data->envioid',
            'filter'=>CHtml::activeHiddenField($model, "envioid"),
            'htmlOptions' => array('style' => 'display:none'),
            'headerHtmlOptions' => array('style' => 'display:none'),
            'visible'=>false

        ),


          array(
          'name'=>'envioid',
          'value'=>'$data->envio->grupos',
          'filter'=>CHtml::listData(Envio::model()->findAll(), 'id', 'grupos'),
          ),*/
          array(
          'name'=>'createtime',
          'value'=>'date("d.m.Y h:i a",strtotime($data->createtime))',
          ),
         'mensaje', /*
      array(
      'name' => 'grupoid',
      'value' => '$data->grupoid',
      'filter' => CHtml::listData(Grupo::model()->findAll(), 'grupoid', 'nombre'),
      'htmlOptions' => array('style' => 'width:50px'),
      ), */
    ),
));
?>

