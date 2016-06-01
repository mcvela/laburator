<?php
/* @var $this OfertaTrabajoController */
/* @var $model OfertaTrabajo */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'version'); ?>
		<?php echo $form->textField($model,'version',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'categoria_id'); ?>
		<?php echo $form->textField($model,'categoria_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'direccion_id'); ?>
		<?php echo $form->textField($model,'direccion_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'empresa_id'); ?>
		<?php echo $form->textField($model,'empresa_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_publicacion'); ?>
		<?php echo $form->textField($model,'fecha_publicacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fiable'); ?>
		<?php echo $form->textField($model,'fiable',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jornada_id'); ?>
		<?php echo $form->textField($model,'jornada_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'link_oferta'); ?>
		<?php echo $form->textArea($model,'link_oferta',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre_oferta'); ?>
		<?php echo $form->textField($model,'nombre_oferta',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numero_inscritos'); ?>
		<?php echo $form->textField($model,'numero_inscritos'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'oferta_id_web'); ?>
		<?php echo $form->textField($model,'oferta_id_web',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pais_id'); ?>
		<?php echo $form->textField($model,'pais_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'provincia_id'); ?>
		<?php echo $form->textField($model,'provincia_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'salario'); ?>
		<?php echo $form->textField($model,'salario',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'texto_oferta'); ?>
		<?php echo $form->textArea($model,'texto_oferta',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo_contrato_id'); ?>
		<?php echo $form->textField($model,'tipo_contrato_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tmp_jornada'); ?>
		<?php echo $form->textField($model,'tmp_jornada',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tmp_provincia'); ?>
		<?php echo $form->textField($model,'tmp_provincia',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tmp_salario'); ?>
		<?php echo $form->textField($model,'tmp_salario',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tmp_tipo_contrato'); ?>
		<?php echo $form->textField($model,'tmp_tipo_contrato',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ver_empresa'); ?>
		<?php echo $form->textField($model,'ver_empresa',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'web_id_id'); ?>
		<?php echo $form->textField($model,'web_id_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'link_empresa'); ?>
		<?php echo $form->textArea($model,'link_empresa',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tmp_empresa'); ?>
		<?php echo $form->textField($model,'tmp_empresa',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado'); ?>
		<?php echo $form->textField($model,'estado',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_estado'); ?>
		<?php echo $form->textField($model,'fecha_estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tmp_experiencia'); ?>
		<?php echo $form->textField($model,'tmp_experiencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tmp_estudio_nivel'); ?>
		<?php echo $form->textField($model,'tmp_estudio_nivel'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'procesada'); ?>
		<?php echo $form->textField($model,'procesada',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->