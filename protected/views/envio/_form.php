<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'envio-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo Yii::t('App', 'Fields with');?> <span class="required">*</span> <?php echo Yii::t('App', 'are required');?>.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'grupos'); ?>
		<?php echo $form->textField($model,'grupos',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'grupos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'asunto'); ?>
		<?php echo $form->textField($model,'asunto',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'asunto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mensaje'); ?>
		<?php echo $form->textField($model,'mensaje',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'mensaje'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipoenvio'); ?>
		<?php echo CHtml::activeDropDownList($model,'tipoenvio',CHtml::listData(Tipoenvio::model()->findAll(), 'tipoid', 'nombre')); ?>
		<?php echo $form->error($model,'tipoenvio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaInicio'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
              array(
                    'model'=>'$model',
                    'name'=>'Envio[fechaInicio]',
                    'language'=>'es',
                    //'mode'=>'imagebutton',
                    //'theme'=>'smoothness',
                    'value'=>$model->fechaInicio,
                    /*'htmlOptions'=>array('size'=>10, 'style'=>'width:80px !important'),
		            'options'=>array(
		             	'showButtonPanel'=>true,
						'changeYear'=>true,
              			),*/
              		)
             ); ?>
		<?php echo $form->error($model,'fechaInicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaFin'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
              array(
                    'model'=>'$model',
                    'name'=>'Envio[fechaFin]',
                    'language'=>'es',
                    //'mode'=>'imagebutton',
                    //'theme'=>'smoothness',
                    'value'=>$model->fechaFin,
                    /*'htmlOptions'=>array('size'=>10, 'style'=>'width:80px !important'),
		            'options'=>array(
		             	'showButtonPanel'=>true,
						'changeYear'=>true,
              			),*/
              		)
             ); ?>
		<?php echo $form->error($model,'fechaFin'); ?>
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