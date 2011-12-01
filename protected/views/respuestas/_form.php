<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'respuestas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p> 

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'respuesta'); ?>
		<?php echo $form->textField($model,'respuesta',array('size'=>60,'maxlength'=>160)); ?>
		<?php echo $form->error($model,'respuesta'); ?>
	</div>

	<div class="row" style="display:none">
		<?php echo $form->labelEx($model,'id_pregunta'); ?>
		<?php echo $form->textField($model,'id_pregunta',array('size'=>11,'maxlength'=>11, 'value'=>$_SESSION["pregunta"]));?>
		<?php echo $form->error($model,'id_pregunta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sig_preg'); ?>
        <?php 
		$condicion="id_encuesta=".$_SESSION["encuesta"];
		echo $form->dropDownList($model,'sig_preg', array('--Seleccione una Pregunta--','Preguntas'=>CHtml::listData(Preguntas::model()->findAll($condicion), 'id','pregunta'))); 
		?>		
		<?php echo $form->error($model,'sig_preg'); ?>
        
	</div>

	<div class="row buttons">
		<?php echo CHtml::link($model->isNewRecord ? 'Guardar y Agregar otra Respuesta' : 'Actualizar', 'javascript:;', array('submit' => '', 'class' => 'positive')); ?>
        <?php echo CHtml::link(Yii::t('App', 'Cancel'), array('admin'), array('class' => 'negative')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->