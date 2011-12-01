<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rol-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo Yii::t('App', 'Fields with');?> <span class="required">*</span> <?php echo Yii::t('App', 'are required');?>.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'rol'); ?>
		<?php echo $form->textField($model,'rol',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'rol'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion'); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'modulos'); ?>
            <div class="jui frecuencia">
		<?php
                $items = array('grupo' => 'Grupos',
                    'contacto' => 'Contactos',
                    'envio' => 'Envios SMS',
                    'keywords' => 'Keywords',
                    'administracion' => 'Administración',
                    'reportes' => 'Reportes',
                    );
                echo CHtml::checkBoxList('items', (count($model->modulos) > 0) ? explode(',', $model->modulos) : array(), $items, array('separator' => ' '));
                ?>
            </div>
		<?php echo $form->error($model,'modulos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'activo'); ?>
		<?php echo $form->checkBox($model,'activo'); ?>
		<?php echo $form->error($model,'activo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::link($model->isNewRecord ? Yii::t('App', 'Create') : Yii::t('App', 'Save'),'javascript:;',array('submit'=>'','class'=>'positive')); ?>
		<?php echo CHtml::link(Yii::t('App', 'Cancel'),array('admin'),array('class'=>'negative')); ?>
            <div class="clear"></div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->