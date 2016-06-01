<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	Yii::t('strings','menu_contact'),
);
?>

<h1><?php  echo Yii::t('strings','contactus_head'); ?></h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>
<?php 

 echo Yii::t('strings','contactus_txt'); ?>
</p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	//'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

 

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->label($model,Yii::t('strings','contactus_name')); ?>
		<?php echo $form->textField($model,'name',array('class'=>'col-lg-2 control-label')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,Yii::t('strings','contactus_email'));  ?>
		<?php echo $form->textField($model,'email',array('class'=>'col-lg-2 control-label')); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row"> 
		<?php echo $form->label($model,Yii::t('strings','contactus_subject')); ?>
		<?php echo $form->textField($model,'subject',array('size'=>30,'maxlength'=>128,'class'=>'col-lg-2 control-label')); ?>
		<?php echo $form->error($model,'subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,Yii::t('strings','contactus_body'));  ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>35 ,'class'=>'col-lg-2 control-label')); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint"><?php echo Yii::t('strings','contactus_text_captcha') ?></div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>
 
