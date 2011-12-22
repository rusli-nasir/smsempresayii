<div class="wide form">
<?php 
$cs = Yii::app()->getClientScript();
$form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'post',
)); ?>

<div class="row" style="text-align:justify">
                <?php echo CHtml::dropDownList('Conversaciones', 'id', array('--Seleccione una Conversación--','Conversaciones'=>CHtml::listData(Conversacion::model()->findAll(), 'conversacionid', 'titulo')));
 ?>

</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
