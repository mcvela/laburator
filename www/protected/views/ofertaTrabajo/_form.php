<?php
/* @var $this OfertaTrabajoController */
/* @var $model OfertaTrabajo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'oferta-trabajo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'version'); ?>
		<?php echo $form->textField($model,'version',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'version'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'categoria_id'); ?>
		<?php echo $form->textField($model,'categoria_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'categoria_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'direccion_id'); ?>
		<?php echo $form->textField($model,'direccion_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'direccion_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'empresa_id'); ?>
		<?php echo $form->textField($model,'empresa_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'empresa_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_publicacion'); ?>
		<?php echo $form->textField($model,'fecha_publicacion'); ?>
		<?php echo $form->error($model,'fecha_publicacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fiable'); ?>
		<?php echo $form->textField($model,'fiable',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'fiable'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jornada_id'); ?>
		<?php echo $form->textField($model,'jornada_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'jornada_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'link_oferta'); ?>
		<?php echo $form->textArea($model,'link_oferta',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'link_oferta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre_oferta'); ?>
		<?php echo $form->textField($model,'nombre_oferta',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nombre_oferta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numero_inscritos'); ?>
		<?php echo $form->textField($model,'numero_inscritos'); ?>
		<?php echo $form->error($model,'numero_inscritos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'oferta_id_web'); ?>
		<?php echo $form->textField($model,'oferta_id_web',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'oferta_id_web'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pais_id'); ?>
		<?php echo $form->textField($model,'pais_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'pais_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'provincia_id'); ?>
		<?php echo $form->textField($model,'provincia_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'provincia_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'salario'); ?>
		<?php echo $form->textField($model,'salario',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'salario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'texto_oferta'); ?>
		<?php echo $form->textArea($model,'texto_oferta',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'texto_oferta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_contrato_id'); ?>
		<?php echo $form->textField($model,'tipo_contrato_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'tipo_contrato_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tmp_jornada'); ?>
		<?php echo $form->textField($model,'tmp_jornada',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tmp_jornada'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tmp_provincia'); ?>
		<?php echo $form->textField($model,'tmp_provincia',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tmp_provincia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tmp_salario'); ?>
		<?php echo $form->textField($model,'tmp_salario',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tmp_salario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tmp_tipo_contrato'); ?>
		<?php echo $form->textField($model,'tmp_tipo_contrato',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tmp_tipo_contrato'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ver_empresa'); ?>
		<?php echo $form->textField($model,'ver_empresa',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'ver_empresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'web_id_id'); ?>
		<?php echo $form->textField($model,'web_id_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'web_id_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'link_empresa'); ?>
		<?php echo $form->textArea($model,'link_empresa',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'link_empresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tmp_empresa'); ?>
		<?php echo $form->textField($model,'tmp_empresa',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tmp_empresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo $form->textField($model,'estado',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_estado'); ?>
		<?php echo $form->textField($model,'fecha_estado'); ?>
		<?php echo $form->error($model,'fecha_estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tmp_experiencia'); ?>
		<?php echo $form->textField($model,'tmp_experiencia'); ?>
		<?php echo $form->error($model,'tmp_experiencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tmp_estudio_nivel'); ?>
		<?php echo $form->textField($model,'tmp_estudio_nivel'); ?>
		<?php echo $form->error($model,'tmp_estudio_nivel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'procesada'); ?>
		<?php echo $form->textField($model,'procesada',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'procesada'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->