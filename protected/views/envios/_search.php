<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'operadoraid'); ?>
		<?php echo $form->textField($model,'operadoraid',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usuarioid'); ?>
		<?php echo $form->textField($model,'usuarioid',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estadoid'); ?>
		<?php echo $form->textField($model,'estadoid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'conversationid'); ?>
		<?php echo $form->textField($model,'conversationid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'programacionid'); ?>
		<?php echo $form->textField($model,'programacionid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telefono'); ?>
		<?php echo $form->textField($model,'telefono',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fhoraenvio'); ?>
		<?php echo $form->textField($model,'fhoraenvio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mensaje'); ?>
		<?php echo $form->textField($model,'mensaje',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->