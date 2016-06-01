<?php
/* @var $this OfertaTrabajoController */
/* @var $model OfertaTrabajo */

$this->breadcrumbs=array(
	'Oferta Trabajos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List OfertaTrabajo', 'url'=>array('index')),
	array('label'=>'Create OfertaTrabajo', 'url'=>array('create')),
	array('label'=>'View OfertaTrabajo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage OfertaTrabajo', 'url'=>array('admin')),
);
?>

<h1>Update OfertaTrabajo <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>