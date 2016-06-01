<?php

$model = $this->loadUser();
$profile=$model->profile;


$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
$this->breadcrumbs=array(
	UserModule::t("Profile"),
);
?><h2><?php echo UserModule::t('Your profile'); ?></h2>
<?php echo $this->renderPartial('menu'); ?>

<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>
<table class="dataGrid">

<tr>
	<th class="col-lg-2 control-label"><?php echo CHtml::encode($model->getAttributeLabel('email')); ?>
</th>
    <td><?php echo CHtml::encode($model->email); ?>
</td>
</tr>

<?php 
		$profileFields=ProfileField::model()->forOwner()->sort()->findAll();
		if ($profileFields) {
			foreach($profileFields as $field) {
				//echo "<pre>"; print_r($profile); die();
				 
			?>
<tr>
	<th class="col-lg-2 control-label">
	<?php 
	
	echo CHtml::encode(UserModule::t($field->title)); 
	
	
	?> 
     </th>
	
    <td ><?php
                //echo "--->$field->varname<br>";
		if ($field->varname=="photourl"){
		        echo "<img src='";
			echo (($field->widgetView($profile))?$field->widgetView($profile):CHtml::encode((($field->range)?Profile::range($field->range,$profile->getAttribute($field->varname)):$profile->getAttribute($field->varname)))); 
		        echo "' class='img-circle'/>";
		}else{
                    
	            echo (($field->widgetView($profile))?$field->widgetView($profile):CHtml::encode((($field->range)?Profile::range($field->range,$profile->getAttribute($field->varname)):$profile->getAttribute($field->varname)))); 
 	       }
		?>
	</td>
</tr>
			<?php
			}//$profile->getAttribute($field->varname)
		}
?>

</table>
