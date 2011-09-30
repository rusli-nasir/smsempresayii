<?php
/**
 * This is the template for generating the form view for the specified model.
 * The following variables are available in this template:
 * - $modelClass: the model class name
 * - $attributes: a list of attribute names to receive form inputs
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
foreach($attributes as $attribute)
{
?>
	<div class="row">
		<?php echo "<?php echo \$form->labelEx(\$model,'$attribute'); ?>\n"; ?>
		<?php echo "<?php ".$this->generateActiveField($modelClass,$attribute)."; ?>\n"; ?>
		<?php echo "<?php echo \$form->error(\$model,'$attribute'); ?>\n"; ?>
	</div>

<?php
}
?>
	<div class="row buttons">
		<?php echo "<?php echo CHtml::submitButton(Yii::t('App', 'Submit')); ?>\n"; ?>
	</div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div><!-- form -->