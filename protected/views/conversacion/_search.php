<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'conversacionid'); ?>
		<?php echo $form->textField($model,'conversacionid',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'titulo'); ?>
		<?php echo $form->textField($model,'titulo',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('App','Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->