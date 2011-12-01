<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'envio-form',
	'enableAjaxValidation'=>true,
)); 
	echo $form->errorSummary($model);
?>
<div class="row">
<?php echo $form->labelEx($model,'asunto'); ?>
<?php echo $form->textField($model,'asunto',array('size'=>60,'maxlength'=>150)); ?>
<?php echo $form->error($model,'asunto'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'fechaInicio'); ?>
<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
						 array(
								 'model'=>'$model',
								 'name'=>'Envio[fechaInicio]',
								 'language'=> substr(Yii::app()->language,0,strpos(Yii::app()->language,'_')),
								 'value'=>$model->fechaInicio,
								 'htmlOptions'=>array('size'=>10, 'style'=>'width:80px !important'),
								 'options'=>array(
									 'showButtonPanel'=>true,
									 'changeYear'=>true,
									 'changeYear'=>true,
									 'dateFormat'=>'yy-mm-dd',
									 ),
								 )
							 );
					; ?>
<?php echo $form->error($model,'fechaInicio'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'fechaFin'); ?>
<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
						 array(
								 'model'=>'$model',
								 'name'=>'Envio[fechaFin]',
								 'language'=> substr(Yii::app()->language,0,strpos(Yii::app()->language,'_')),
								 'value'=>$model->fechaFin,
								 'htmlOptions'=>array('size'=>10, 'style'=>'width:80px !important'),
								 'options'=>array(
									 'showButtonPanel'=>true,
									 'changeYear'=>true,
									 'changeYear'=>true,
									 'dateFormat'=>'yy-mm-dd',
									 ),
								 )
							 );
					; ?>
<?php echo $form->error($model,'fechaFin'); ?>
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
