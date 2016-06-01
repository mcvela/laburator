<?php
/* @var $this LogAccionesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Log Acciones',
);

$this->menu=array(
	array('label'=>'Create LogAcciones', 'url'=>array('create')),
	array('label'=>'Manage LogAcciones', 'url'=>array('admin')),
);
?>

<h1>Log Acciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
