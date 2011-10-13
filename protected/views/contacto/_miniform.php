<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contacto-form',
	'enableAjaxValidation'=>true,
)); 
	echo $form->errorSummary($model);
?>
<div class="row">
<?php echo $form->labelEx($model,'nombres'); ?>
<?php echo $form->textField($model,'nombres',array('size'=>50,'maxlength'=>50)); ?>
<?php echo $form->error($model,'nombres'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'telefono'); ?>
<?php echo $form->textField($model,'telefono',array('size'=>15,'maxlength'=>15)); ?>
<?php echo $form->error($model,'telefono'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'fechaNacimiento'); ?>
<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
						 array(
								 'model'=>'$model',
								 'name'=>'Contacto[fechaNacimiento]',
								 'language'=> substr(Yii::app()->language,0,strpos(Yii::app()->language,'_')),
								 'value'=>$model->fechaNacimiento,
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
<?php echo $form->error($model,'fechaNacimiento'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'createtime'); ?>
<?php echo $form->textField($model,'createtime'); ?>
<?php echo $form->error($model,'createtime'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'grupoInicial'); ?>
<?php echo $form->textField($model,'grupoInicial',array('size'=>60,'maxlength'=>100)); ?>
<?php echo $form->error($model,'grupoInicial'); ?>
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
