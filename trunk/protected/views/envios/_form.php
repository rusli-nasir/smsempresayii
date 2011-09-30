<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'envios-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'operadoraid'); ?>
		<?php echo $form->textField($model,'operadoraid',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'operadoraid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usuarioid'); ?>
		<?php echo $form->textField($model,'usuarioid',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'usuarioid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estadoid'); ?>
		<?php echo $form->textField($model,'estadoid'); ?>
		<?php echo $form->error($model,'estadoid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'conversationid'); ?>
		<?php echo $form->textField($model,'conversationid'); ?>
		<?php echo $form->error($model,'conversationid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'programacionid'); ?>
		<?php echo $form->textField($model,'programacionid'); ?>
		<?php echo $form->error($model,'programacionid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefono'); ?>
		<?php echo $form->textField($model,'telefono',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'telefono'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fhoraenvio'); ?>
		<?php echo $form->textField($model,'fhoraenvio'); ?>
		<?php echo $form->error($model,'fhoraenvio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mensaje'); ?>
		<?php echo $form->textField($model,'mensaje',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'mensaje'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->