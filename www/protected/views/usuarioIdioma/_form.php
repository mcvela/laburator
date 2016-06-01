<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'usuario-idioma-form',
	'enableAjaxValidation' => true,
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
		<?php echo $form->labelEx($model,'idioma_id'); ?>
		<?php echo $form->textField($model, 'idioma_id', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'idioma_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'idioma_nivel'); ?>
		<?php echo $form->textField($model, 'idioma_nivel'); ?>
		<?php echo $form->error($model,'idioma_nivel'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'usuario_id'); ?>
		<?php echo $form->textField($model, 'usuario_id', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'usuario_id'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->