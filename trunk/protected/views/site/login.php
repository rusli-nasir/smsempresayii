<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->panel=false;
?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<div class="row">
		<?php echo $form->textField($model,'username',array('class'=>'logintext','title'=>Yii::t('App','Username'),'tabindex'=>1)); ?>
                <?php echo $form->error($model,'username'); ?>
	</div>
	<div class="row">
		<?php echo $form->passwordField($model,'password',array('class'=>'logintext','title'=>Yii::t('App','Password'),'tabindex'=>2)); ?>
                <?php echo $form->error($model,'password'); ?>
	</div>
	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe',array('tabindex'=>3)); ?>
		<?php echo strtolower($form->label($model,Yii::t('App','rememberMe'))); ?>
	</div>
	<div class="row buttons">
                <?php echo CHtml::link(Yii::t('App','Enter'),'#',array('submit'=>'login','class'=>'loginsend','tabindex'=>4)); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
<?php
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile('/js/jquery.hint.js',CClientScript::POS_END);
$cs->registerScript(
  "slidepanel",
  "jQuery().ready(function(){
      $('input[title!=\"\"]').hint();
      $('.logintext:eq(1)').keypress(function(event) {
          if ( event.which == 13 ) {
             event.preventDefault();
             $('#login-form').submit();
           }
       });
      $('#startslide').toggle(function(){
          $('div#page').animate({
                  height: 500
                }, 'slow').animate({
                  height: 350
                }, 'fast',function(){
                    $('#startslide').addClass('slidedown').removeClass('slideup').text('Cerrar Pestaña');
                    $('.logintext:eq(0)').focus();
                });
        },function(){
                $('div#page').animate({
                  height: 500
                }, 'slow').animate({
                    height: 0
                }, 'fast',function(){
                    $('#startslide').addClass('slideup').removeClass('slidedown').text('Iniciar Sesión');
                });
        });
    });",
  CClientScript::POS_END
);
?>
