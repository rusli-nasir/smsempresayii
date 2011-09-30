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
                <?php echo $form->label($model,'username'); ?>
                <?php echo $form->textField($model,'username',array('size'=>15,'maxlength'=>15)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'apellido'); ?>
                <?php echo $form->textField($model,'apellido',array('size'=>30,'maxlength'=>30)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'nombre'); ?>
                <?php echo $form->textField($model,'nombre',array('size'=>30,'maxlength'=>30)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'rolid'); ?>
                <?php echo $form->dropDownList($model,'rolid',CHtml::listData(Rol::model()->findAll(), 'id', 'rol'),array('prompt'=>Yii::t('app', 'All'))); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'nivelid'); ?>
                <?php echo $form->dropDownList($model,'nivelid',CHtml::listData(Nivel::model()->findAll(), 'id', 'nombre'),array('prompt'=>Yii::t('app', 'All'))); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'activo'); ?>
                <?php echo $form->checkBox($model,'activo'); ?>
        </div>
    
        <div class="row buttons">
                <?php echo CHtml::submitButton(Yii::t('app', 'Search')); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
