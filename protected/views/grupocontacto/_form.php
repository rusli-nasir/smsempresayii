<div class="form">
    <p class="note">
        <?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
    </p>

    <?php
    $contactos=Grupo::model()->findAll();
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'grupocontacto-form',
        'enableAjaxValidation' => true,
            ));
    echo $form->errorSummary($model);
    $this->widget(
          'application.extensions.emultiselect.EMultiSelect',
          array('sortable'=>false/true, 'searchable'=>false/true)
    );
    ?>

    <div class="row">
        <label for="grupo"><?php echo Yii::t('app', 'Grupo'); ?></label>
        <?php
        $this->widget(
                'Relation', array(
            'model' => $model,
            'relation' => 'grupo',
            'fields' => 'nombre',
            'allowEmpty' => false,
            'style' => 'dropdownlist',
            'htmlOptions' => array(
                'checkAll' => Yii::t('app', 'Choose all'),
            ),)
        );
        ?>
    </div>
    <div class="row">
        <?php echo $form->dropDownList('Contactos','0', $contactos);?>
    </div>
    <div class="row buttons">
        <?php echo CHtml::link(Yii::t('App', 'Save'), 'javascript:;', array('submit' => '', 'class' => 'positive')); ?>
        <?php echo CHtml::link(Yii::t('App', 'Cancel'), array('/grupo/admin'), array('class' => 'negative')); ?>
        <div class="clear"></div>
    </div>
    <?php $this->endWidget(); ?>
</div> <!-- form -->
