<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
        'action'=>Yii::app()->createUrl($this->route),
        'method'=>'get',
)); ?>

        <div class="row">
                <?php echo $form->label($model,'id'); ?>
                <?php echo $form->textField($model,'id',array('size'=>20,'maxlength'=>20)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'contactoid'); ?>
                <?php echo $form->dropDownList($model,'contactoid',CHtml::listData(Contacto::model()->findAll(), 'contactoid', 'recordTitle'),array('prompt'=>Yii::t('app', 'All'))); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'grupoid'); ?>
                <?php echo $form->dropDownList($model,'grupoid',CHtml::listData(Grupo::model()->findAll(), 'grupoid', 'nombre'),array('prompt'=>Yii::t('app', 'All'))); ?>
        </div>
    
        <div class="row buttons">
                <?php echo CHtml::submitButton(Yii::t('app', 'Search')); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
