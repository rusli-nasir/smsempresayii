<div class="form showgrid">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'usuario-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note"><?php echo Yii::t('App', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('App', 'are required'); ?>.</p>

    <?php echo $form->errorSummary($model); ?>
    <div class="span-9">
        <div class="row">
            <?php echo $form->labelEx($model, 'nombre'); ?>
            <?php echo $form->textField($model, 'nombre', array('size' => 40, 'maxlength' => 30,)); ?>
            <?php echo $form->error($model, 'nombre'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'apellido'); ?>
            <?php echo $form->textField($model, 'apellido', array('size' => 40, 'maxlength' => 30,)); ?>
            <?php echo $form->error($model, 'apellido'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'email'); ?>
            <?php echo $form->textField($model, 'email', array('size' => 40, 'maxlength' => 60,)); ?>
            <?php echo $form->error($model, 'email'); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model, 'username'); ?>
            <?php echo $form->textField($model, 'username', array('size' => 35, 'maxlength' => 30,)); ?>
            <?php echo $form->error($model, 'username'); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model, 'password'); ?>
            <?php echo CHtml::passwordField('Usuario[password]','' ,array('size' => 35, 'maxlength' => 120,)); ?>
            <?php echo $form->error($model, 'password'); ?>
        </div>
        <div class="row">
            <?php echo CHtml::activeLabelEx($model, 'verifyPassword'); ?>
            <?php echo CHtml::passwordField('Usuario[verifyPassword]','' ,array('size' => 35, 'maxlength' => 120,)); ?>
            <?php //echo CHtml::activePasswordField($model, 'verifyPassword', array('size' => 35, 'maxlength' => 120)); ?>
        </div>

        <?php if (CCaptcha::checkRequirements()): ?>
            <div class="row">
                <?php echo $form->labelEx($model, 'verifyCode'); ?>
                <div>
                    <?php $this->widget('CCaptcha'); ?>
                    <?php echo $form->textField($model, 'verifyCode'); ?>
                </div>
                <div class="hint"><?php Yii::t('App', 'Please enter the letters as they are shown in the image above.<br/>Letters are not case-sensitive.'); ?></div>
                <?php echo $form->error($model, 'verifyCode'); ?>
            </div>
        <?php endif; ?>
        <?php if(!$model->isNewRecord ){?>
        <div class="row">
            <?php echo $form->labelEx($model, 'activo').$form->checkBox($model, 'activo').$form->error($model, 'activo'); ?>
        </div>
        <?php }else{
            echo CHtml::hiddenField('Usuario[activo]','1');
        }?>
    </div>
    <div class="span-9 last">
        <fieldset>
            <legend>Roles y Niveles</legend>
            <div class="row">
                <?php echo $form->labelEx($model, 'rolid'); ?>
                <?php echo CHtml::activeDropDownList($model, 'rolid', CHtml::listData(Rol::model()->findAll(), 'id', 'rol'), array('prompt' => 'Seleccione un rol...', 'class' => 'cboselect')); ?>
                <?php echo $form->error($model, 'rolid'); ?>
            </div>

            <div class="row" <?php if(!$model->isNewRecord&&Yii::app()->user->nivel>1){ echo "style='display:none;'" ; }?>>
                <?php echo $form->labelEx($model, 'nivelid');
                    $condition=(!$model->isNewRecord&&Yii::app()->user->id==$model->id)?'id>='.Yii::app()->user->nivel:'id>'.Yii::app()->user->nivel;
                ?>
                <?php echo CHtml::activeDropDownList($model, 'nivelid', CHtml::listData(Nivel::model()->findAll((Yii::app()->user->nivel>1)?$condition:''), 'id', 'nombre'), array('prompt' => 'Seleccione un nivel...', 'class' => 'cboselect')); ?>
                <?php echo CHtml::dropDownList('operadora', array($model->dependid), CHtml::listData(Operadora::model()->findAll('id<>0'), 'id', 'nombre'), array('class' => 'cboselect', 'style' => 'display:none;')); ?>
                <?php echo $form->error($model, 'nivelid'); ?>
            </div>

            <div class="row">
                <?php echo CHtml::hiddenField('Usuario[dependid]', 0); ?>
                <?php echo $form->error($model, 'dependid'); ?>
            </div>
        </fieldset>

    </div>
    <div class="clear"></div>
    <div class="row buttons">
        <?php echo CHtml::link($model->isNewRecord ? Yii::t('App', 'Create') : Yii::t('App', 'Save'), 'javascript:;', array('submit' => '', 'class' => 'positive')); ?>
        <?php echo CHtml::link(Yii::t('App', 'Cancel'), array('admin'), array('class' => 'negative')); ?>
        <div class="clear"></div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
<?php
$cs = Yii::app()->getClientScript();
$cs->registerScript("manageGrupo", "
        $('select#Usuario_nivelid').change(function(){
            if($(this).val()==2){
                $('#operadora').fadeIn('fast');
            }else{
                $('#operadora').fadeOut('fast');
            }
        });
        $('select#Usuario_nivelid').change();
        ", CClientScript::POS_READY);
?>