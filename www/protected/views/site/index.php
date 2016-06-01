<?php
/* @var $this SiteController */


/* VISTA INICIAL */
if (Yii::app()->user->isGuest){
	$this->metaDescription = Yii::t('strings','description_main');
	$this->metaKeywords =Yii::t('strings','keywords_main');
	$this->pageTitle=Yii::t('strings','title_main');
	require dirname(__FILE__) . '/landing.php';
}else{
	$this->metaDescription = Yii::t('strings','description_main');
	$this->metaKeywords =Yii::t('strings','keywords_main');
	$this->pageTitle=Yii::t('strings','title_main');
	//////// PANTALLA INICIAL CON LOGIN
    //require dirname(__FILE__) . '/inicio_user.php';
    $this->redirect("/buscar-trabajo");
}
?>


