<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipoid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tipoid), array('view', 'id'=>$data->tipoid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>