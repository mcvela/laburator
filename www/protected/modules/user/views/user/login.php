<?php
$this->metaDescription = Yii::t('strings','description_main');
$this->metaKeywords =Yii::t('strings','keywords_main');
$this->pageTitle=Yii::app()->name . ' - '.Yii::t('strings','menu_login');
$this->breadcrumbs=array(
	Yii::t('strings','menu_login'),
);
?>

<h2><?php echo Yii::t('strings','tooltip_login'); ?></h2>
<div class="containerMain">
<?php if(Yii::app()->user->hasFlash('loginMessage')): ?>

<div class="success">
	<?php echo Yii::app()->user->getFlash('loginMessage'); ?>
</div>

<?php endif; ?>

<br><br>

<div class="row"><!-- ini row main -->
 <div class="col-md-4" style="text-align:center">  </div>
<div class="col-md-4" style="text-align:center"> 
<?php $this->widget('ext.hoauth.widgets.HOAuth'); ?>

</div>
 <div class="col-md-4" style="text-align:center"> </div>
<?php  
 
if ($_SERVER['HTTP_HOST']=="localhost:88"){
 ?>
<div class="col-md-1" style="text-align:center"> OR <br></div>
<div class="col-md-6" style="text-align:left"> 
			<p><?php echo UserModule::t("Do you sign in with email? Sign in here:"); ?></p>

			<div class="form">
			<?php echo CHtml::beginForm(); ?>

				 <div class="row">
				    <div class="col-md-5">
							<?php echo CHtml::errorSummary($model); ?>
							
							<div class="row">
								<?php echo CHtml::activeLabelEx($model,'email'); ?>
								<?php echo CHtml::activeTextField($model,'email') ?>
							</div>
							
							<div class="row">
								<?php echo CHtml::activeLabelEx($model,'password'); ?>
								<?php echo CHtml::activePasswordField($model,'password') ?>
							</div>
							
							
								
							
							
							<div class="row rememberMe">
								<?php echo CHtml::activeCheckBox($model,'rememberMe'); ?>
								<?php echo CHtml::activeLabelEx($model,'rememberMe'); ?>
								
							</div>
					</div>
				

						
					<div class="col-md-6"> 
					
					 <div class="row">	
							<div class="col-md-6">
								<div class="hint"><?php echo CHtml::link(UserModule::t("Forgot Password?"),Yii::app()->getModule('user')->recoveryUrl); ?></div>
								<br><div class="hint"><?php echo CHtml::link(UserModule::t("Don't have an account yet?"),Yii::app()->getModule('user')->registrationUrl); ?> </div>
							 </div>
								
					</div>
					 <div class="row">	
								<div class="row submit">
										<?php
										// echo CHtml::submitButton(UserModule::t("Login"));
										?>	
								 <?php
								echo BsHtml::submitButton('Login', array(
									'color' => BsHtml::BUTTON_COLOR_PRIMARY ,
									'size' => BsHtml::BUTTON_SIZE_LARGE,
									'type' => 'input'
										));
										

								?>
								</div>
					  </div>
					</div>
				</div>	
				
			<?php echo CHtml::endForm(); ?>
			</div><!-- form -->


</div>

<?php 
 } 
 ?>	
 
</div> <!-- row main -->



<?php
$form = new CForm(array(
    'elements'=>array(
        'email'=>array(
            'type'=>'text',
            'maxlength'=>32,
        ),
        'password'=>array(
            'type'=>'password',
            'maxlength'=>32,
        ),
        'rememberMe'=>array(
            'type'=>'checkbox',
        )
    ),

    'buttons'=>array(
        'login'=>array(
            'type'=>'submit',
            'label'=>'Login',
        ),
    ),
), $model);
?>
</div>