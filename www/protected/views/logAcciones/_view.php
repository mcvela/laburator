<?php
/* @var $this LogAccionesController */
/* @var $data LogAcciones */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('log_acciones_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->log_acciones_id), array('view', 'id'=>$data->log_acciones_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('accion')); ?>:</b>
	<?php echo CHtml::encode($data->accion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip')); ?>:</b>
	<?php echo CHtml::encode($data->ip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('busqueda')); ?>:</b>
	<?php echo CHtml::encode($data->busqueda); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_oferta_trabajo')); ?>:</b>
	<?php echo CHtml::encode($data->id_oferta_trabajo); ?>
	<br />


</div>