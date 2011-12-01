<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'conversacion-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo Yii::t('App', 'Fields with');?> <span class="required">*</span> <?php echo Yii::t('App', 'are required');?>.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'titulo'); ?>
		<?php echo $form->textField($model,'titulo',array('size'=>60,'maxlength'=>100,'class'=>'textinput')); ?>
		<?php echo $form->error($model,'titulo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('class'=>'textarea')); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::link($model->isNewRecord ? Yii::t('App', 'Create') : Yii::t('App', 'Save'),'javascript:;',array('submit'=>'','class'=>'positive')); ?>
		<?php echo CHtml::link(Yii::t('App', 'Cancel'),array('admin'),array('class'=>'negative')); ?>
            <div class="clear"></div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->