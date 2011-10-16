<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	'enableAjaxValidation'=>true,
)); 
	echo $form->errorSummary($model);
?>
<div class="row">
<?php echo $form->labelEx($model,'username'); ?>
<?php echo $form->textField($model,'username',array('size'=>15,'maxlength'=>15)); ?>
<?php echo $form->error($model,'username'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'password'); ?>
<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>100)); ?>
<?php echo $form->error($model,'password'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'apellido'); ?>
<?php echo $form->textField($model,'apellido',array('size'=>30,'maxlength'=>30)); ?>
<?php echo $form->error($model,'apellido'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'nombre'); ?>
<?php echo $form->textField($model,'nombre',array('size'=>30,'maxlength'=>30)); ?>
<?php echo $form->error($model,'nombre'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'activo'); ?>
<?php echo $form->checkBox($model,'activo'); ?>
<?php echo $form->error($model,'activo'); ?>
</div>


<?php
echo CHtml::Button(
	Yii::t('app', 'Cancel'),
	array(
		'onClick' => "$('#".$relation."_dialog').dialog('close');"
	));
echo CHtml::Button(
	Yii::t('app', 'Create'),
	array(
		'id' => "submit_".$relation
	));
$this->endWidget(); 

?></div> <!-- form -->
