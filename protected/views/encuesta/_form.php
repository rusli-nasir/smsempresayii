<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'encuesta-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'keyword'); ?>
		<?php echo $form->textField($model,'keyword',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'keyword'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="row" style="display:none">
		<?php echo $form->labelEx($model,'id_usuario'); ?>
		<?php echo $form->textField($model,'id_usuario',array('size'=>11,'maxlength'=>11, 'value'=>Yii::app()->user->getId())); ?>
		<?php echo $form->error($model,'id_usuario'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::link($model->isNewRecord ? 'Guardar' : 'Guardar', 'javascript:;', array('submit' => '', 'class' => 'positive')); ?>
        <?php echo CHtml::link(Yii::t('App', 'Cancel'), array('admin'), array('class' => 'negative')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->