<?php
/**
 * This is the template for generating the update view for crud.
 * The following variables are available in this template:
 * - $ID: the primary key name
 * - $modelClass: the model class name
 * - $columns: a list of column schema objects
 */
?>
<?php
echo "<?php\n";
$nameColumn=$this->guessNameColumn($columns);
$label=$this->class2name($modelClass,true);
echo "\$this->breadcrumbs=array(
	'$label'=>array('admin'),
	\$model->{$nameColumn}=>array('view','id'=>\$model->{$ID}),
	Yii::t('App', 'Update'),
);\n";
?>

$this->menu=array(
	array('label'=>Yii::t('App', 'List').' <?php echo $modelClass; ?>', 'url'=>array('index')),
	array('label'=>Yii::t('App', 'Create').' <?php echo $modelClass; ?>', 'url'=>array('create')),
	array('label'=>Yii::t('App', 'View').' <?php echo $modelClass; ?>', 'url'=>array('view', 'id'=>$model-><?php echo $ID; ?>)),
	array('label'=>Yii::t('App', 'Manage').' <?php echo $modelClass; ?>', 'url'=>array('admin')),
);
?>

<h1><?php echo "<?php ";?> echo Yii::t('App', 'Update');?> <?php echo $modelClass." <?php echo \$model->{$ID}; ?>"; ?></h1>

<?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>