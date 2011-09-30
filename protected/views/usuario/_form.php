<div class="form">
<p class="note">
<?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo Yii::t('app','are required');?>.
</p>

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
<?php if('_HINT_Usuario.username' != $hint = Yii::t('app', '_HINT_Usuario.username')) echo $hint; ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'password'); ?>
<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>100)); ?>
<?php echo $form->error($model,'password'); ?>
<?php if('_HINT_Usuario.password' != $hint = Yii::t('app', '_HINT_Usuario.password')) echo $hint; ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'apellido'); ?>
<?php echo $form->textField($model,'apellido',array('size'=>30,'maxlength'=>30)); ?>
<?php echo $form->error($model,'apellido'); ?>
<?php if('_HINT_Usuario.apellido' != $hint = Yii::t('app', '_HINT_Usuario.apellido')) echo $hint; ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'nombre'); ?>
<?php echo $form->textField($model,'nombre',array('size'=>30,'maxlength'=>30)); ?>
<?php echo $form->error($model,'nombre'); ?>
<?php if('_HINT_Usuario.nombre' != $hint = Yii::t('app', '_HINT_Usuario.nombre')) echo $hint; ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'activo'); ?>
<?php echo $form->checkBox($model,'activo'); ?>
<?php echo $form->error($model,'activo'); ?>
<?php if('_HINT_Usuario.activo' != $hint = Yii::t('app', '_HINT_Usuario.activo')) echo $hint; ?>
</div>

<div class="row">
<label for="nivel"><?php echo Yii::t('app', 'Nivel'); ?></label>
<?php $this->widget(
					'Relation',
					array(
							'model' => $model,
							'relation' => 'nivel',
							'fields' => 'nombre',
							'allowEmpty' => false,
							'style' => 'dropdownlist',
							'htmlOptions' => array(
								'checkAll' => Yii::t('app', 'Choose all'),
								),)
						); ?><br />
</div>

<div class="row">
<label for="rol"><?php echo Yii::t('app', 'Rol'); ?></label>
<?php $this->widget(
					'Relation',
					array(
							'model' => $model,
							'relation' => 'rol',
							'fields' => 'rol',
							'allowEmpty' => false,
							'style' => 'dropdownlist',
							'htmlOptions' => array(
								'checkAll' => Yii::t('app', 'Choose all'),
								),)
						); ?><br />
</div>


<?php
echo CHtml::Button(Yii::t('app', 'Cancel'), array(
			'submit' => array('usuario/admin'))); 
echo CHtml::submitButton(Yii::t('app', 'Save')); 
$this->endWidget(); ?>
</div> <!-- form -->
