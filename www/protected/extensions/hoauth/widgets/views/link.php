<?php
/**
 * @var HOAuthWidget $this
 * @var string $provider name of provider
 */


//$invitation = Yii::app()->user->isGuest ? HOAuthAction::t('sign_in_with') : HOAuthAction::t('Connect with');

$invitation = Yii::app()->user->isGuest ? Yii::t('strings','sign_in_with') : Yii::t('strings','connect_with');
?>
<p>
	<a href="<?php echo Yii::app()->createUrl($this->route . '/oauth', array('provider' => $provider)); ?>"  data-loading-text="<img src='/images/ajax-loader.gif'>" class="btn zocial loadingSFinBoton <?php  echo strtolower($provider) ?>" style="width:80%;"><?php  echo "$invitation $provider"; ?></a>
</p>
