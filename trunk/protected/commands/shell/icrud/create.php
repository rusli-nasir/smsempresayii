<?php
/**
 * This is the template for generating the create view for crud.
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
	Yii::t('App', 'Create'),
);\n";
?>

$this->menu=array(
	array('label'=>Yii::t('App', 'List').' <?php echo $modelClass; ?>', 'url'=>array('index')),
	array('label'=>Yii::t('App', 'Manage').' <?php echo $modelClass; ?>', 'url'=>array('admin')),
);
?>

<h1><?php echo "<?php ";?> echo Yii::t('App', 'Create');?> <?php echo $modelClass; ?></h1>

<?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
