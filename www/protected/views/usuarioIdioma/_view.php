<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('version')); ?>:
	<?php echo GxHtml::encode($data->version); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('idioma_id')); ?>:
	<?php echo GxHtml::encode($data->idioma_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('idioma_nivel')); ?>:
	<?php echo GxHtml::encode($data->idioma_nivel); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('usuario_id')); ?>:
	<?php echo GxHtml::encode($data->usuario_id); ?>
	<br />

</div>