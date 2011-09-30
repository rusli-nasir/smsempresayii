<?php
/**
 * This is the template for generating the admin view for crud.
 * The following variables are available in this template:
 * - $ID: the primary key name
 * - $modelClass: the model class name
 * - $columns: a list of column schema objects
 */
?>
<?php
echo "<?php\n";
$label=$this->class2name($modelClass,true);
echo "\$this->breadcrumbs=array(
	'$label'=>array('admin'),
	Yii::t('App', 'Manage'),
);\n";
?>

$this->menu=array(
	array('label'=>Yii::t('App', 'List').' <?php echo $modelClass; ?>', 'url'=>array('admin')),
	array('label'=>Yii::t('App', 'Create').' <?php echo $modelClass; ?>', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').slideToggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('<?php echo $this->class2id($modelClass); ?>-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo "<?php ";?> echo Yii::t('App', 'Manage');?> <?php echo $this->class2name($modelClass,true); ?></h1>

<?php echo "<?php echo CHtml::link(Yii::t('App','Advanced Search'),'#',array('class'=>'search-button')); ?>"; ?>

<div class="search-form" style="display:none">
<?php echo "<?php \$this->renderPartial('_search',array(
	'model'=>\$model,
)); ?>\n"; ?>
</div><!-- search-form -->

<?php echo "<?php"; ?> $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'<?php echo $this->class2id($modelClass); ?>-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
<?php
$count=0;
foreach($columns as $column)
{
    if(++$count==7 or preg_match('/^(password|pass|passwd)$/i',$column->name))
        echo "\t\t/*\n";
    echo "\t\t".$this->generateValueField($modelClass, $column)/*$column->name*/.",\n";
    if(preg_match('/^(password|pass|passwd)$/i',$column->name) and !$count>=7){
        echo "\t\t*/\n";
    }
}
if($count>=7)
	echo "\t\t*/\n";
?>
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
