<?php
/**
 * iFormCommand class file.
 *
 * @author Ricardo Obregón <robregonm@gmail.com>
 * @link http://www.virtualconsulting.biz/
 * @copyright Copyright &copy; 2008-2010 Virtual Consulting Services
 * @license http://www.yiiframework.com/license/
 */

/**
 * iFormCommand generates a form view based on a specified model with i18n messages support.
 *
 * @author Ricardo Obregón <robregonm@gmail.com>
 * @version $Id: iFormCommand.php 10 2010-01-25 15:51:58Z robregonm $
 * @package app.commands.shell
 */
Yii::import('system.cli.commands.shell.FormCommand');

defined('iFORM_TEMPLATE') or
        define('iFORM_TEMPLATE',dirname(__FILE__).'/iform');

class iFormCommand extends FormCommand {
    public $templatePath=iFORM_TEMPLATE;

    /**
     * @param CActiveRecord $modelClass
     * @param string $column
     */
    public function generateActiveField($modelClass,$column) {
        $model=CActiveRecord::model($modelClass);
        $attribute = $column;
        $column = $model->$column;
        if($column->isForeignKey) {
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
              		'fontSize'=>'0.8em',
		            'options'=>array(
		             	'showButtonPanel'=>true,
						'changeYear'=>true,
              			),
              		)*/
             )
EOD;
        }
        //elseif (stripos($column->dbType,'time')!==false){
        //parent::generateInputField($modelClass, $column);
        //}
        else {
            return('echo $form->textField($model,\''.$attribute.'\')');
        }
    }
}
?>
