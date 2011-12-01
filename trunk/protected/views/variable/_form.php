<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'variable-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo Yii::t('App', 'Fields with');?> <span class="required">*</span> <?php echo Yii::t('App', 'are required');?>.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valor'); ?>
		<?php echo $form->textArea($model,'valor',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'valor'); ?>
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