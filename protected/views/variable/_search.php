<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'valor'); ?>
		<?php echo $form->textField($model,'valor',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha'); ?>
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
	</div>

	<div class="row">
		<?php echo $form->label($model,'activo'); ?>
		<?php echo $form->checkBox($model,'activo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('App','Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->