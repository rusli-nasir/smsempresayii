<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'variable-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo Yii::t('App', 'Fields with');?> <span class="required">*</span> <?php echo Yii::t('App', 'are required');?>.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valor'); ?>
		<?php echo $form->textField($model,'valor',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'valor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
              array(
                    'model'=>'$model',
                    'name'=>'Variable[fecha]',
                    'language'=>'es',
                    //'mode'=>'imagebutton',
                    //'theme'=>'smoothness',
                    'value'=>$model->fecha,
                    /*'htmlOptions'=>array('size'=>10, 'style'=>'width:80px !important'),
		            'options'=>array(
		             	'showButtonPanel'=>true,
						'changeYear'=>true,
              			),*/
              		)
             ); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'activo'); ?>
		<?php echo $form->checkBox($model,'activo'); ?>
		<?php echo $form->error($model,'activo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('App', 'Create') : Yii::t('App', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->