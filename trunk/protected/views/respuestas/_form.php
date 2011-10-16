<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'respuestas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'respuesta'); ?>
		<?php echo $form->textField($model,'respuesta',array('size'=>60,'maxlength'=>160)); ?>
		<?php echo $form->error($model,'respuesta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_pregunta'); ?>
		<?php echo $form->textField($model,'id_pregunta',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'id_pregunta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sig_preg'); ?>
		<?php echo $form->textField($model,'sig_preg',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'sig_preg'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->