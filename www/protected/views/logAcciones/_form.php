<?php
/* @var $this LogAccionesController */
/* @var $model LogAcciones */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'log-acciones-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'accion'); ?>
		<?php echo $form->textField($model,'accion'); ?>
		<?php echo $form->error($model,'accion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ip'); ?>
		<?php echo $form->textField($model,'ip',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'ip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'busqueda'); ?>
		<?php echo $form->textField($model,'busqueda',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'busqueda'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_oferta_trabajo'); ?>
		<?php echo $form->textField($model,'id_oferta_trabajo',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'id_oferta_trabajo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->