<?php
/* @var $this OfertaTrabajoController */
/* @var $model OfertaTrabajo */

$this->breadcrumbs=array(
	'Oferta Trabajos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OfertaTrabajo', 'url'=>array('index')),
	array('label'=>'Manage OfertaTrabajo', 'url'=>array('admin')),
);
?>

<h1>Create OfertaTrabajo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>