<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('operadoraid')); ?>:</b>
	<?php echo CHtml::encode($data->operadoraid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuarioid')); ?>:</b>
	<?php echo CHtml::encode($data->usuarioid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estadoid')); ?>:</b>
	<?php echo CHtml::encode($data->estadoid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('conversationid')); ?>:</b>
	<?php echo CHtml::encode($data->conversationid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('programacionid')); ?>:</b>
	<?php echo CHtml::encode($data->programacionid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?>:</b>
	<?php echo CHtml::encode($data->telefono); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fhoraenvio')); ?>:</b>
	<?php echo CHtml::encode($data->fhoraenvio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mensaje')); ?>:</b>
	<?php echo CHtml::encode($data->mensaje); ?>
	<br />

	*/ ?>

</div>