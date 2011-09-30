<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contacto-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo Yii::t('App', 'Fields with');?> <span class="required">*</span> <?php echo Yii::t('App', 'are required');?>.</p>

	<?php echo $form->errorSummary($model); ?>

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
                    'language'=>'es',
                    //'mode'=>'imagebutton',
                    //'theme'=>'smoothness',
                    'value'=>$model->fechaNacimiento,
                    /*'htmlOptions'=>array('size'=>10, 'style'=>'width:80px !important'),
		            'options'=>array(
		             	'showButtonPanel'=>true,
						'changeYear'=>true,
              			),*/
              		)
             ); ?>
		<?php echo $form->error($model,'fechaNacimiento'); ?>
                
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'grupoInicial'); ?>
		<?php echo $form->textField($model,'grupoInicial',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'grupoInicial'); ?>
                
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