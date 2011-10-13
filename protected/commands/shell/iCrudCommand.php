<?php
/**
 * iCrudCommand class file.
 *
 * @author Ricardo Obregón <robregonm@gmail.com>
 * @link http://www.virtualconsulting.biz/
 * @copyright Copyright &copy; 2008-2010 Virtual Consulting Services
 * @license http://www.yiiframework.com/license/
 */

/**
 * iCrudCommand generates code implementing CRUD operations and i18n messages support.
 *
 * @author Ricardo Obregón <robregonm@gmail.com>
 * @version $Id: iCrudCommand.php 1750 2010-01-25 17:10:54Z robregonm $
 * @package app.commands.shell
 */
Yii::import('system.cli.commands.shell.CrudCommand');

defined('iCRUD_TEMPLATE') or
        define('iCRUD_TEMPLATE',dirname(__FILE__).'/icrud');

class iCrudCommand extends CrudCommand {
    public $templatePath=iCRUD_TEMPLATE;
    //public $actions=array(/*'create','update','list','show','admin','_form'*/);


    /**
     * @param CActiveRecord $modelClass
     * @param CDbColumnSchema $column
     */
    public function generateActiveField($modelClass,CDbColumnSchema $column) {
        if($column->isForeignKey) {
            $model=CActiveRecord::model($modelClass);
            $table=$model->getTableSchema();
            $fk = $table->foreignKeys[$column->name];
            $fmodel=CActiveRecord::model(ucfirst($fk[0]));
            $modelTable = ucfirst($fmodel->tableName());
            $ftable=$fmodel->getTableSchema();
            $fcolumns=$fmodel->attributeNames();

            if($column->allowNull)
                return("echo CHtml::activeDropDownList(\$model,'{$column->name}',CHtml::listData({$modelTable}::model()->findAll(), '{$ftable->primaryKey}', '{$fcolumns[1]}'),array('prompt'=>Yii::t('App', 'Choose...')))");
            return("echo CHtml::activeDropDownList(\$model,'{$column->name}',CHtml::listData({$modelTable}::model()->findAll(), '{$ftable->primaryKey}', '{$fcolumns[1]}'))");
        }
        else if(strtoupper($column->dbType) == 'TINYINT(1)' OR strtoupper($column->dbType) == 'BIT') {
            return "echo \$form->checkBox(\$model,'{$column->name}')";
        }
        else if(strtoupper($column->dbType) == 'DATE') {
            return <<<EOD
\$this->widget('zii.widgets.jui.CJuiDatePicker',
              array(
                    'model'=>'\$model',
                    'name'=>'{$modelClass}[{$column->name}]',
                    'language'=>'es',
                    //'mode'=>'imagebutton',
                    //'theme'=>'smoothness',
                    'value'=>\$model->{$column->name},
                    /*'htmlOptions'=>array('size'=>10, 'style'=>'width:80px !important'),
		            'options'=>array(
		             	'showButtonPanel'=>true,
						'changeYear'=>true,
              			),*/
              		)
             )
EOD;
        }  elseif (strtolower($column->name)=='descripcion') {

            return "echo \$form->textArea(\$model,'{$column->name}')";
        }
        else {
            return('echo '.parent::generateActiveField($modelClass, $column));
        }
    }

    /**
     * @param CActiveRecord $modelClass
     * @param CDbColumnSchema $column
     */
		public function generateValueField($modelClass,CDbColumnSchema $column,$view=false) {
			if($column->isForeignKey) {
				$model=CActiveRecord::model($modelClass);
				$table=$model->getTableSchema();
				$fk = $table->foreignKeys[$column->name];
				$fmodel=CActiveRecord::model(ucfirst($fk[0]));
				$modelTable = ucfirst($fmodel->tableName());
				//$ftable=$fmodel->getTableSchema();
				$fcolumns=$fmodel->attributeNames();
				//$rel = $model->getActiveRelation($column->name);
				$relname = strtolower($fk[0]);
				foreach($model->relations() as $key => $value)
				{
					if(strcasecmp($value[2], $column->name) == 0)
						$relname = $key;
				}
				//return("\$model->{$relname}->{$fcolumns[1]}");
						//return("CHtml::value(\$model,\"{$relname}.{$fcolumns[1]}\")");
						//return("{$relname}.{$fcolumns[1]}");
            if($view) {
                return <<<EOD
array(
            'name'=>'{$column->name}',
            'value'=>CHtml::value(\$model,'{$relname}.{$fcolumns[1]}'),
        )
EOD;
            } else
                return <<<EOD
array(
            'name'=>'{$column->name}',
            'value'=>'\$data->{$relname}->{$fcolumns[1]}',
            'filter'=>CHtml::listData({$modelTable}::model()->findAll(), '{$fcolumns[0]}', '{$fcolumns[1]}'),
        )
EOD;
//{$relname}.{$fcolumns[1]}
        }
        elseif (strpos(strtolower ($column->name),'id')!==false){
            return <<<EOD
array(
            'name'=>'{$column->name}',
            'value'=>\$model->{$column->name},
            'htmlOptions'=>array('style'=>'width:50px'),
        )
EOD;
        }
        elseif (strtoupper($column->dbType)=='BOOLEAN' or strtoupper($column->dbType) == 'TINYINT(1)' OR strtoupper($column->dbType) == 'BIT') {

            if($view) {
                return <<<EOD
array(
            'name'=>'{$column->name}',
            'value'=>\$model->{$column->name}?Yii::t("App","Yes"):Yii::t("App","No"),
        )
EOD;
            } else
                return <<<EOD
array(
            'name'=>'{$column->name}',
            'value'=>'\$data->{$column->name}?Yii::t("App","Yes"):Yii::t("App","No")',
            'filter'=>array('0'=>Yii::t("App","No"),'1'=>Yii::t("App","Yes")),
        )
EOD;
        }elseif (strtoupper($column->dbType)=='TIMESTAMP') {
            return <<<EOD
array(
            'name'=>'{$column->name}',
            'value'=>'date("d.m.Y h:i a",strtotime(\$data->{$column->name}))',
        )
EOD;
        }elseif (strtoupper($column->dbType)=='DATE' or strtoupper($column->dbType)=='DATETIME') {
            return <<<EOD
array(
            'name'=>'{$column->name}',
            'value'=>'date("d.m.Y",strtotime(\$data->{$column->name}))',
        )
EOD;
        }
        else {
            return("'".$column->name."'");
        }
    }

	public function guessNameColumn($columns)
	{
        $name = Yii::t('App','name');
		foreach($columns as $column)
		{
			if(!strcasecmp($column->name,$name))
				return $column->name;
		}
        $title = Yii::t('App','title');
		foreach($columns as $column)
		{
			if(!strcasecmp($column->name,$title))
				return $column->name;
		}
		foreach($columns as $column)
		{
			if($column->isPrimaryKey)
				return $column->name;
		}
		return 'id';
	}

    public function getHelp() {
        return <<<EOD
USAGE
                icrud <model-class> [controller-ID] ...

DESCRIPTION
                This command generates a controller and views that accomplish
  CRUD operations for the specified data model with i18n support
  and automatic foreign fields relationships

PARAMETERS
                * model-class: required, the name of the data model class. This can
   also be specified as a path alias (e.g. application.models.Post).
   If the model class belongs to a module, it should be specified
   as 'ModuleID.models.ClassName'.

 * controller-ID: optional, the controller ID (e.g. 'post').
   If this is not specified, the model class name will be used
   as the controller ID. In this case, if the model belongs to
   a module, the controller will also be created under the same
   module.

   If the controller should be located under a subdirectory,
   please specify the controller ID as 'path/to/ControllerID'
   (e.g. 'admin/user').

   If the controller belongs to a module (different from the module
   that the model belongs to), please specify the controller ID
   as 'ModuleID/ControllerID' or 'ModuleID/path/to/Controller'.

EXAMPLES
                * Generates CRUD for the Post model:
        icrud Post

 * Generates CRUD for the Post model which belongs to module 'admin':
        icrud admin.models.Post

 * Generates CRUD for the Post model. The generated controller should
   belong to module 'admin', but not the model class:
        icrud Post admin/post

EOD;
    }
}
