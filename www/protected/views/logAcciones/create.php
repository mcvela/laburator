<?php
/* @var $this LogAccionesController */
/* @var $model LogAcciones */

$this->breadcrumbs=array(
	'Log Acciones'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LogAcciones', 'url'=>array('index')),
	array('label'=>'Manage LogAcciones', 'url'=>array('admin')),
);
?>

<h1>Create LogAcciones</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>