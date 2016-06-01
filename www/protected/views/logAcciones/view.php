<?php
/* @var $this LogAccionesController */
/* @var $model LogAcciones */

$this->breadcrumbs=array(
	'Log Acciones'=>array('index'),
	$model->log_acciones_id,
);

$this->menu=array(
	array('label'=>'List LogAcciones', 'url'=>array('index')),
	array('label'=>'Create LogAcciones', 'url'=>array('create')),
	array('label'=>'Update LogAcciones', 'url'=>array('update', 'id'=>$model->log_acciones_id)),
	array('label'=>'Delete LogAcciones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->log_acciones_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LogAcciones', 'url'=>array('admin')),
);
?>

<h1>View LogAcciones #<?php echo $model->log_acciones_id; ?></h1>

<?php
 
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'log_acciones_id',
		'accion',
		'ip',
		'busqueda',
		'user_id',
		'id_oferta_trabajo',
	),
)); ?>
