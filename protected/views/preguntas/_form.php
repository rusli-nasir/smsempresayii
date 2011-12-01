<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'preguntas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p> 

	<?php echo $form->errorSummary($model); ?>

	<div class="row" style="display:none">
		<?php echo $form->labelEx($model,'id_encuesta'); ?>
		<?php echo $form->textField($model,'id_encuesta',array('size'=>11,'maxlength'=>11, 'value'=>$_SESSION["encuesta"]));?>
		<?php echo $form->error($model,'id_encuesta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pregunta'); ?>
		<?php echo $form->textField($model,'pregunta',array('size'=>60,'maxlength'=>160)); ?>
		<?php echo $form->error($model,'pregunta'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::link($model->isNewRecord ? 'Guardar y Agregar otra Pregunta' : 'Actualizar', 'javascript:;', array('submit' => '', 'class' => 'positive')); ?>
        <?php echo CHtml::link(Yii::t('App', 'Cancel'), array('admin'), array('class' => 'negative')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->