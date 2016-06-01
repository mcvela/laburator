<?php
/* @var $this JornadaController */
/* @var $model Jornada */

$this->breadcrumbs=array(
	'Jornadas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Jornada', 'url'=>array('index')),
	array('label'=>'Create Jornada', 'url'=>array('create')),
	array('label'=>'Update Jornada', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Jornada', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Jornada', 'url'=>array('admin')),
);
?>

<h1>View Jornada #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'version',
		'descripcion',
	),
)); ?>
