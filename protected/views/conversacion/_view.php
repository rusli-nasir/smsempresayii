<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('conversacionid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->conversacionid), array('view', 'id'=>$data->conversacionid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />


</div>