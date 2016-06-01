<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'idioma-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'version'); ?>
		<?php echo $form->textField($model, 'version', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'version'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'idioma_desc'); ?>
		<?php echo $form->textField($model, 'idioma_desc', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'idioma_desc'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('busquedaIdiomas')); ?></label>
		<?php echo $form->checkBoxList($model, 'busquedaIdiomas', GxHtml::encodeEx(GxHtml::listDataEx(BusquedaIdioma::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('ofertaTrabajoIdiomas')); ?></label>
		<?php echo $form->checkBoxList($model, 'ofertaTrabajoIdiomas', GxHtml::encodeEx(GxHtml::listDataEx(OfertaTrabajoIdioma::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->