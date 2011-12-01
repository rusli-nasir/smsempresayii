<div class="wide form">

<div class="row">

		<?php //print_r(explode('|',$model->grupoInicial)); ?>
		<?php echo $form->labelEx($model,'grupos'); ?>
                <?php echo CHtml::dropDownList('cbogrupos',explode('|',$model->grupoInicial),CHtml::listData(Grupo::model()->findAll(), 'nombre', 'nombre'),array('multiple'=>'multiple','class'=>'cbogrupo','data-placeholder'=>'Seleccione grupos...')); ?>
		<?php echo $form->hiddenField($model,'grupoInicial',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'grupos'); ?>

</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>



</div><!-- search-form -->
<?php
        $cs = Yii::app()->getClientScript();
        $cs->registerCssFile('/css/chosen.css');
        $cs->registerScriptFile('/js/chosen.jquery.js',CClientScript::POS_END);
        $cs->registerScript(
                    "manageGrupo", "jQuery().ready(function(){
                        $('select.cbogrupo').chosen();
                        $('select.cbogrupo').change(function(){
                            if($.trim($(this).val())==''){
                                $('.chzn-container').remove();
                                $('#Contacto_grupoInicial').val('');
                                $('select.cbogrupo').removeClass('chzn-done').chosen();
                            }else{
                                $('#Contacto_grupoInicial').val($(this).val().join('|'));
                            }
                        });
            });",CClientScript::POS_END);
?>