<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'grupos'); ?>
		<?php echo $form->textField($model,'grupos',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'asunto'); ?>
		<?php echo $form->textField($model,'asunto',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mensaje'); ?>
		<?php echo $form->textField($model,'mensaje',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipoenvio'); ?>
		<?php echo CHtml::activeDropDownList($model,'tipoenvio',CHtml::listData(Tipoenvio::model()->findAll(), 'tipoid', 'nombre')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaInicio'); ?>
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
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaFin'); ?>
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