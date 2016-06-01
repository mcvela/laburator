<?php
/* @var $this OfertaTrabajoController */
/* @var $model OfertaTrabajo */

$this->breadcrumbs=array(
	 
	$model->firstname.' '.$model->lastname,
);


?>

<h1>#<?php echo $model->user_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'firstname',
		'lastname',
	),
)); ?>
