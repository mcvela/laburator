<?php
/* @var $this LogAccionesController */
/* @var $model LogAcciones */

$this->breadcrumbs=array(
	'Log Acciones'=>array('index'),
	$model->log_acciones_id=>array('view','id'=>$model->log_acciones_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LogAcciones', 'url'=>array('index')),
	array('label'=>'Create LogAcciones', 'url'=>array('create')),
	array('label'=>'View LogAcciones', 'url'=>array('view', 'id'=>$model->log_acciones_id)),
	array('label'=>'Manage LogAcciones', 'url'=>array('admin')),
);
?>

<h1>Update LogAcciones <?php echo $model->log_acciones_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>