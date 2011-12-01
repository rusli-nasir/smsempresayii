<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contacto-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo Yii::t('App', 'Fields with');?> <span class="required">*</span> <?php echo Yii::t('App', 'are required');?>.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombres'); ?>
		<?php echo $form->textField($model,'nombres',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nombres'); ?>

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefono'); ?>
		<?php echo $form->textField($model,'telefono',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'telefono'); ?>

	</div>

	<div class="row">

		<?php //print_r(explode('|',$model->grupoInicial)); ?>
		<?php echo $form->labelEx($model,'grupos'); ?>
                <?php echo CHtml::dropDownList('cbogrupos',explode('|',rtrim($model->grupoInicial)),CHtml::listData(Grupo::model()->findAll(), 'nombre', 'nombre'),array('multiple'=>'multiple','class'=>'cbogrupo','data-placeholder'=>'Seleccione grupos...')); ?>
		<?php echo $form->hiddenField($model,'grupoInicial',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'grupos'); ?>

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'activo'); ?>
		<?php echo $form->checkBox($model,'activo'); ?>
		<?php echo $form->error($model,'activo'); ?>

	</div>

	<div class="row buttons">
		<?php echo CHtml::link($model->isNewRecord ? Yii::t('App', 'Create') : Yii::t('App', 'Save'),'javascript:;',array('submit'=>'','class'=>'positive')); ?>
		<?php echo CHtml::link(Yii::t('App', 'Cancel'),array('admin'),array('class'=>'negative')); ?>
            <div class="clear"></div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
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