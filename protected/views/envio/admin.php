<?php
$this->breadcrumbs = array(
    'Envios' => array('admin'),
    Yii::t('App', 'Manage'),
);
$labelEnvios = array();
$labelEnvios[1] = Yii::t('App', 'Envio Instantaneo');
$labelEnvios[2] = Yii::t('App', 'Envio Programado');
$labelEnvios[3] = Yii::t('App', 'Conversaciones');

$this->menu = array(
    array('label' => Yii::t('App', 'Manage') . ' Variable', 'url' => array('/variable/admin/')),
    array('label' => $labelEnvios[2], 'url' => array('/envio/create/?type=2')),
    array('label' => $labelEnvios[1], 'url' => array('/envio/create/?type=1')),
    array('label' => $labelEnvios[3], 'url' => array('/conversacion/admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').slideToggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('envio-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('App', 'Manage'); ?> Envios</h1>

<?php echo CHtml::link(Yii::t('App', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->
<div id="msg">
    <?php if (Yii::app()->user->hasFlash('success')): ?>
        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('success'); ?>
        </div>
    <?php endif; ?>
    <?php if (Yii::app()->user->hasFlash('notice')): ?>
        <div class="flash-notice">
            <?php echo Yii::app()->user->getFlash('notice'); ?>
        </div>
    <?php endif; ?>
    <?php if (Yii::app()->user->hasFlash('error')): ?>
        <div class="flash-error">
            <?php echo Yii::app()->user->getFlash('error'); ?>
        </div>
    <?php endif; ?>
</div>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'envio-grid',
    //'selectionChanged' => 'onSelected',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'class' => 'CCheckBoxColumn',
            'value' => '$data->id',
            'id' => 'chk',
            'htmlOptions' => array('class' => 'chkfilter')
        ),
        array(
            'name' => 'id',
            'value' => $data->id,
            'htmlOptions' => array('style' => 'width:50px', 'class' => 'chkapply'),
        ),
        'asunto',
        'mensaje',
        array(
            'name' => 'tipoenvio',
            'value' => '$data->tipoenvio0->nombre',
            'filter' => CHtml::listData(Tipoenvio::model()->findAll(), 'tipoid', 'nombre'),
        ),
        array(
            'name' => 'fechaInicio',
            'value' => 'date("d.m.Y",strtotime($data->fechaInicio))',
        ),
        array(
            'name' => 'fechaFin',
            'value' => 'date("d.m.Y",strtotime($data->fechaFin))',
        ), /*
          array(
          'name'  => 'activo',
          'value' => '$data->activo?echo "<a href=\"/envio/setstatus?id=$data->id&value=0\" class=\"cactive\">Link</a>":Yii::t("App","No")',
          'filter' => array('0' => Yii::t("App", "No"), '1' => Yii::t("App", "Yes")),
          ),

          array(
          'htmlOptions'   => array('style' => 'width:70px','style'=>'text-align:center;'),
          'name'  => 'activo',
          'type'  =>'raw',
          'value' => '$data->activo?"<a href=\"/envio/setstatus?id=".$data->id."&value=0\"><img src=\"/images/icons/greencircle.png\" /></a>":Yii::t("App","No")',
          'filter' => array('0' => Yii::t("App", "No"), '1' => Yii::t("App", "Yes")),
          ) */
        array(
            'name' => 'activo',
            'type' => 'raw',
            'value' => '($data->tipoenvio==1)?"---":($data->activo?CHtml::link("<img src=\"/images/icons/greencircle.png\" />","#", array("submit"=>array(\'setstatus\', \'id\'=>$data->id),"class"=>"cancelenvio")):"<img src=\"/images/icons/redcircle.png\" />")',
            'filter' => array('0' => Yii::t("App", "No"), '1' => Yii::t("App", "Yes")),
            'htmlOptions' => array('class' => 'hactive'),
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{delete}{update}',
            'visible' => (Yii::app()->user->nivel == 1),
        //'htmlOptions'   => array('onclick' => 'jQuery.event.fix( event || window.event ).stopPropagation();'),
        ), /* ,
      array(
      'htmlOptions'   => array('style' => 'width:70px','style'=>'text-align:center;'),
      'class'         => 'CButtonColumn',
      'header'        => 'Detalle',
      'template' => '{viewdetails}',
      'buttons' => array(
      'viewdetails' => array(
      'label' => 'Ver Envios',
      'url' => '"#/mensaje/admin?click=details&Mensaje[envioid]=".$data["id"]',
      'options'=>array('class'=>'viewsms'),
      ),
      ),
      ), */
    ),
));
?>
<div class="loading" style="display: none;">Cargando mensajes...</div>
<div id="details"></div>
<?php
$cs = Yii::app()->getClientScript();
$cs->registerScript(
        "gridselected", "
            jQuery('#envio-grid a.cancelenvio').live('click',function() {
                    if(!confirm('¿Desea desactivar el envio programado?')) return false;
                    var th=this;
                    var afterDelete=function(){};
                    $.fn.yiiGridView.update('envio-grid', {
                            type:'POST',
                            url:$(this).attr('href'),
                            success:function(data) {
                                    $.fn.yiiGridView.update('envio-grid');
                                    afterDelete(th,true,data);
                            },
                            error:function(XHR) {
                                    return afterDelete(th,false,XHR);
                            }
                    });
                    return false;
            });
            $('.chkfilter input[type=checkbox]').change(function(){
                if($(this).is(':checked')){
                    onSelected($(this).val());
                }
            });

            function onSelected(nrow) {
                //var nrow=$.fn.yiiGridView.getSelection(a);
                //var nrow=$.fn.yiiGridView.getChecked('envio-grid', 'chk');
                var href='/mensaje/admin?click=details&envioid='+nrow;
                jQuery.ajax({
                    url:href,
                    beforeSend: function(){
                        $('.loading').fadeIn('fast');
                    },
                    success:function(html){
                        jQuery('#details').html(html).fadeIn('fast');
                    },
                    complete:function(){
                        $('.loading').fadeOut('fast');
                    }
                });
                return false;
            }", CClientScript::POS_READY);
?>

