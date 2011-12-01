<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	

	<div class="row">
		<?php echo $form->label($model,'keyword'); ?>
		<?php echo $form->textField($model,'keyword',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_creacion'); ?>
		<?php echo $form->textField($model,'fecha_creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mensaje1'); ?>
		<?php echo $form->textField($model,'mensaje1',array('size'=>60,'maxlength'=>160)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mensaje2'); ?>
		<?php echo $form->textField($model,'mensaje2',array('size'=>60,'maxlength'=>160)); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->