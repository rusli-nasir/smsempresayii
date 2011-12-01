<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'envio-form',
        'enableAjaxValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
            'afterValidate' => 'js:formSend',
        ),
            ));
    ?>

    <p class="note"><?php echo Yii::t('App', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('App', 'are required'); ?>.</p>
    <div id="msg">
        <?php if (Yii::app()->user->hasFlash('success')): ?>
            <div class="flash-success">
                <?php echo Yii::app()->user->getFlash('success'); ?>
            </div>
        <?php endif; ?>
        <?php if (Yii::app()->user->hasFlash('error')): ?>
            <div class="flash-error">
                <?php echo Yii::app()->user->getFlash('error'); ?>
            </div>
        <?php endif; ?>
    </div>
    <?php echo $form->errorSummary($model); ?>
    <div class="row">

        <?php echo $form->labelEx($model, 'grupos'); ?>
        <?php echo CHtml::dropDownList('cbogrupos', explode('|', $model->grupos), CHtml::listData(Grupo::model()->with(array(
                    'grupocontactos'=>array(
                        'select'=>false,
                        'joinType'=>'INNER JOIN',
                    )))->findAll('activo=1'), 'grupoid', 'nombre'), array('multiple' => 'multiple', 'class' => 'cbogrupo', 'data-placeholder' => 'Seleccione grupos...')); ?>
        <?php echo $form->hiddenField($model, 'grupos', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'grupos'); ?>

    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'asunto'); ?>
        <?php echo $form->textField($model, 'asunto', array('size' => 60, 'maxlength' => 150, 'class' => 'textinput')); ?>
        <?php echo $form->error($model, 'asunto'); ?>
    </div>

    <div class="row">
        <div class="span-9">
            <?php echo $form->labelEx($model, 'mensaje'); ?><a href="javascript:;" id="clear" class="right">Limpiar</a>
            <?php echo $form->textArea($model, 'mensaje', array('rows' => 6, 'class' => 'textarea')); ?>
        </div>
        <div class="variable span-5 ui-sortable">
            <div class="portlet">
                <div class="portlet-header">Variables</div>
                <div class="portlet-content">
                    <a href="#@phone">@phone</a>
                    <a href="#@name">@name</a>
                    <?php foreach (Variable::model()->findAll() as $variable) { ?>
                        <a href="#<?= $variable->valor; ?>"><?= $variable->nombre; ?></a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <?php echo $form->error($model, 'mensaje'); ?>
    </div>

    <div class="row">
        <?php echo CHtml::hiddenField('Envio[tipoenvio]', $type); ?>
        <?php echo $form->error($model, 'tipoenvio'); ?>
    </div>

    <div class="row jui">
        <?php echo $form->labelEx($model, 'fechaInicio'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => '$model',
            'name' => 'Envio[fechaInicio]',
            'language' => 'es',
            //'mode'=>'imagebutton',
            //'theme'=>'redmond',
            'value' => $model->fechaInicio,
            'htmlOptions' => array('size' => 10, 'style' => 'width:80px !important'),
            'options' => array(
                'showAnim' => 'slide',
                'dateFormat' => 'dd-mm-yy',
                'minDate' => 'date()',
                'showButtonPanel' => true,
                'defaultDate' => "+0w",
                'changeMonth' => true,
                'numberOfMonths' => 3,
                'onSelect' => 'js:function(selectedDate){
                        var option = this.id == "Envio_fechaInicio" ? "minDate" : "maxDate",
					instance = $(this).data("datepicker"),
					date = $.datepicker.parseDate(
						instance.settings.dateFormat ||
						$.datepicker._defaults.dateFormat,
						selectedDate, instance.settings );
				$("#Envio_fechaInicio,#Envio_fechaFin").not(this).datepicker("option", option, date );
                        }'
            ),
                )
        );
        ?>

        <?php echo $form->labelEx($model, 'fechaFin'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => '$model',
            'name' => 'Envio[fechaFin]',
            'language' => 'es',
            //'mode'=>'imagebutton',
            //'theme'=>'smoothness',
            'value' => $model->fechaFin,
            'htmlOptions' => array('size' => 10, 'style' => 'width:80px !important'),
            'options' => array(
                'showAnim' => 'slide',
                'dateFormat' => 'dd-mm-yy',
                'minDate' => 'date()',
                'showButtonPanel' => true,
                'defaultDate' => "+0w",
                'changeMonth' => true,
                'numberOfMonths' => 3,
                'onSelect' => 'js:function(selectedDate){
                        var option = this.id == "Envio_fechaInicio" ? "minDate" : "maxDate",
					instance = $(this).data("datepicker"),
					date = $.datepicker.parseDate(
						instance.settings.dateFormat ||
						$.datepicker._defaults.dateFormat,
						selectedDate, instance.settings );
				$("#Envio_fechaInicio,#Envio_fechaFin").not(this).datepicker("option", option, date );
                        }'
            ),
                )
        );
        ?>
        <?php echo $form->error($model, 'fechaInicio'); ?>
        <?php echo $form->error($model, 'fechaFin'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'frecuencia'); ?>
        <a href="javascript:;" id="selectall">Seleccionar todos</a> | <a href="javascript:;" id="invert">Invertir selección</a>
    </div>
    <div class="row jui frecuencia">
        <?php
        $days = array('sun' => 'Domingo', 'mon' => 'Lunes', 'tue' => 'Martes', 'wed' => 'Miércoles', 'thu' => 'Jueves', 'fri' => 'Viernes', 'sat' => 'Sábado');
        echo CHtml::checkBoxList('days', (count($model->frecuencia) > 0) ? explode(',', $model->frecuencia) : explode(',', 'sun,mon,tue,wed,thu,fri,sat'), $days, array('separator' => ' '));
        //echo $form->checkBoxList($model, 'frecuencia', $days,array('separator'=>' '));
        ?>
        <?php //echo $form->textField($model, 'frecuencia', array('size' => 27, 'maxlength' => 27)); ?>
        <?php echo $form->error($model, 'frecuencia'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'horaenvio'); ?>
        <?php echo $form->textField($model, 'horaenvio', array('size' => 20, 'maxlength' => 20)); ?>
        <?php echo $form->error($model, 'horaenvio'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'activo'); ?>
        <?php echo $form->checkBox($model, 'activo'); ?>
        <?php echo $form->error($model, 'activo'); ?>
    </div>

    <div class="row buttons">
        <?php
        echo CHtml::link(
                $model->isNewRecord ? Yii::t('App', 'Send SMS') : Yii::t('App', 'Save'), 'javascript:;', array('submit' => '', 'class' => 'sender'));
        ?>
        <?php echo CHtml::link(Yii::t('App', 'Cancel'), array('/envio/admin?Envio[tipoenvio]=' . $type), array('class' => 'negative')); ?>
        <div class="clear"></div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
<?php
$cs = Yii::app()->getClientScript();
$cs->registerCssFile('/css/chosen.css');
$cs->registerCssFile('/css/jqueryui/redmond/jquery-ui.css');
//$cs->registerCssFile('http://haineault.com/media/jquery/ui-timepickr/src/css/ui.timepickr.css');
//$cs->registerCssFile('http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css');
//$cs->registerCoreScript('jquery.ui');
//$cs->registerScriptFile('http://haineault.com/media/jquery/ui-timepickr/src/ui.timepickr.js', CClientScript::POS_END);
$cs->registerScriptFile('/js/jquery.jqEasyCharCounter.js', CClientScript::POS_END);
$cs->registerScriptFile('/js/jquery.fieldselection.js', CClientScript::POS_END);
$cs->registerScriptFile('/js/chosen.jquery.js', CClientScript::POS_END);
$cs->registerScript(
        "manageGrupo", "$('#Envio_mensaje').jqEasyCounter({'maxChars': 160,});
                        //$('#Envio_horaenvio').timepickr();
                        $('select.cbogrupo').chosen();
                        $('select.cbogrupo').change(function(){
                            if($.trim($(this).val())==''){
                                $('.chzn-container').remove();
                                $('#Envio_grupos').val('');
                                $('select.cbogrupo').removeClass('chzn-done').chosen();
                            }else{
                                $('#Envio_grupos').val($(this).val().join('|'));
                            }
                        });
                        $('#clear').click(function(){
                            $('#Envio_mensaje').val('');
                        });
                        $('#selectall').toggle(function(){
                            $(this).text('Deseleccionar');
                            $('.frecuencia input').each(function(){
                                $(this).attr('checked','checked');
                             });
                             return false;
                        },function(){
                            $(this).text('Seleccionar todos');
                            $('.frecuencia input').each(function(){
                                $(this).removeAttr('checked');
                            });
                        });

                        $('#invert').click(function(){
                            $('.frecuencia input').each(function(){
                                if($(this).is(':checked')){
                                    $(this).removeAttr('checked');
                                }else{
                                    $(this).attr('checked','checked');
                                }
                             });
                             return false;
                        });
                        $( '.portlet' ).addClass( 'ui-widget ui-widget-content ui-helper-clearfix ui-corner-all' )
                                .find( '.portlet-header' )
                                        .addClass( 'ui-widget-header ui-corner-all' )
                                        .prepend( '<span class=\"ui-icon ui-icon-minusthick\"></span>')
                                        .end()
                                .find( '.portlet-content' );

                        $( '.portlet-header .ui-icon' ).click(function() {
                                $( this ).toggleClass( 'ui-icon-minusthick' ).toggleClass( 'ui-icon-plusthick' );
                                $( this ).parents( '.portlet:first' ).find( '.portlet-content' ).toggle();
                        });
                        $('.variable a').click(function(e) {
				$('#Envio_mensaje').replaceSelection($(this).attr('href').substring(1), true);
				e.preventDefault();
			});

", CClientScript::POS_READY);

$cs->registerScript(
        "managesend", "
function formSend(form, data, hasError)
{
    if (!hasError) {
        $('#loadingWrapper').show();
        return true;
    };
}
", CClientScript::POS_END);
?>