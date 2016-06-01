<?php
/* @var $this OfertaTrabajoController */
/* @var $model OfertaTrabajo */

$this->breadcrumbs=array(
	'Oferta Trabajos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List OfertaTrabajo', 'url'=>array('index')),
	array('label'=>'Create OfertaTrabajo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#oferta-trabajo-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Oferta Trabajos</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'oferta-trabajo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'version',
		'categoria_id',
		'direccion_id',
		'empresa_id',
		'fecha_publicacion',
		/*
		'fiable',
		'jornada_id',
		'link_oferta',
		'nombre_oferta',
		'numero_inscritos',
		'oferta_id_web',
		'pais_id',
		'provincia_id',
		'salario',
		'texto_oferta',
		'tipo_contrato_id',
		'tmp_jornada',
		'tmp_provincia',
		'tmp_salario',
		'tmp_tipo_contrato',
		'ver_empresa',
		'web_id_id',
		'link_empresa',
		'tmp_empresa',
		'estado',
		'fecha_estado',
		'tmp_experiencia',
		'tmp_estudio_nivel',
		'procesada',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
