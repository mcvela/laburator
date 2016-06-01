<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('version')); ?>:
	<?php echo GxHtml::encode($data->version); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('idioma_desc')); ?>:
	<?php echo GxHtml::encode($data->idioma_desc); ?>
	<br />

</div>