<?php
/**
 * This is the template for generating the form view for crud.
 * The following variables are available in this template:
 * - $ID: the primary key name
 * - $modelClass: the model class name
 * - $columns: a list of column schema objects
 */
?>
<div class="form">

<?php echo "<?php \$form=\$this->beginWidget('CActiveForm', array(
	'id'=>'".$this->class2id($modelClass)."-form',
	'enableAjaxValidation'=>false,
)); ?>\n"; ?>

	<p class="note"><?php echo "<?php ";?>echo Yii::t('App', 'Fields with');?> <span class="required">*</span> <?php echo "<?php ";?>echo Yii::t('App', 'are required');?>.</p>

	<?php echo "<?php echo \$form->errorSummary(\$model); ?>\n"; ?>

<?php
foreach($columns as $column)
{
	if($column->isPrimaryKey)
		continue;
        if(!$column->isForeignKey
			&& $column->name != 'createtime'
			&& $column->name != 'updatetime'
			&& $column->name != 'timestamp') {	
?>
	<div class="row">
		<?php echo "<?php echo ".$this->generateActiveLabel($modelClass,$column)."; ?>\n"; ?>
		<?php echo "<?php ".$this->generateActiveField($modelClass,$column)."; ?>\n"; ?>
		<?php echo "<?php echo \$form->error(\$model,'{$column->name}'); ?>\n"; ?>                
	</div>

<?php
    }
}
?>
	<div class="row buttons">
		<?php echo "<?php echo CHtml::link(\$model->isNewRecord ? Yii::t('App', 'Create') : Yii::t('App', 'Save'),'javascript:;',array('submit'=>'','class'=>'positive')); ?>\n"; ?>
		<?php echo "<?php echo CHtml::link(Yii::t('App', 'Cancel'),array('admin'),array('class'=>'negative')); ?>\n"; ?>
            <div class="clear"></div>
	</div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div><!-- form -->