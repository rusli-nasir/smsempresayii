<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'grupocontacto-form',
	'enableAjaxValidation'=>true,
)); 
	echo $form->errorSummary($model);
?>

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
