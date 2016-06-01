<?php 
$this->metaDescription = Yii::t('strings','description_main');
$this->metaKeywords =Yii::t('strings','keywords_main');
$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
$this->breadcrumbs=array(
	UserModule::t("Profile"),
);
?>


<h2><?php echo UserModule::t('Your profile'); ?></h2>
<div class="container containerMain">
<?php
// echo $this->renderPartial('menu');
?>

<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>
<table class="dataGrid text-center">

<tr>
	<th class="col-lg-6 control-label"><?php echo CHtml::encode($model->getAttributeLabel('email')); ?>
</th>
    <td class="text-left"><?php echo CHtml::encode($model->email); ?>
</td>
</tr>

<?php 
$profileFields=ProfileField::model()->forOwner()->sort()->findAll();
if ($profileFields) {
  foreach($profileFields as $field) {
				//echo "<pre>"; print_r($profile); die();
				 
			?>
<tr>
	<th class="col-lg-6 control-label text-left">
	<?php 
	if ($field->varname!="photourl"){
	   echo CHtml::encode(UserModule::t($field->title)); 
	}
	
	?> 
     </th>
	
    <td class="text-left"><?php
                //echo "--->$field->varname<br>";
		if ($field->varname=="photourl"){
		      if ($profile->getAttribute($field->varname)!=""){
                            //echo "<img src='";
                            //echo (($field->widgetView($profile))?$field->widgetView($profile):CHtml::encode((($field->range)?Profile::range($field->range,$profile->getAttribute($field->varname)):$profile->getAttribute($field->varname)))); 
                            //echo "' class='img-circle'/>";
                         }
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

<?php /*
<tr>
	<th class="col-lg-2 control-label"><?php echo CHtml::encode($model->getAttributeLabel('createtime')); ?>
</th>
    <td><?php echo date("d.m.Y H:i:s",$model->createtime); ?>
</td>
</tr>
<tr>
	<th class="col-lg-2 control-label"><?php echo CHtml::encode($model->getAttributeLabel('lastvisit')); ?>
</th>
    <td><?php echo date("d.m.Y H:i:s",$model->lastvisit); ?>
</td>
</tr>
<tr>
	<th class="col-lg-2 control-label"><?php echo CHtml::encode($model->getAttributeLabel('status')); ?>
</th>
    <td><?php echo CHtml::encode(User::itemAlias("UserStatus",$model->status));
    ?>
</td>
</tr>
<br>
<div class="pull-center">
 <a href="/favSearch" class="btn btn-default"><i class="glyphicon glyphicon-heart"></i> Busquedas favoritas </a>

</div>
*/?>
</table>

<br>
<div class="pull-center">
<a href="/user/logout" class="btn btn-default loadingBoton" data-loading-text="<img src='/images/ajax-loader.gif'>"><i class="fa fa-sign-out"></i><?php echo Yii::t('strings','profile_close_session');?>  </a>
 
</div><br><br>
<?php 
 //echo Hybrid_Auth::getConnectedProviders();
  
  // grab the user's friends list
  //$user_contacts =""// Yii::app()->Hybrid_Providers_Facebook->getUserContacts();
 
  // iterate over the user friends list
  /*foreach( $user_contacts as $contact ){
     echo $contact->displayName . " " . $contact->profileURL . "<hr />";
  }*/
  ?>

</div>