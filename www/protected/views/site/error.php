<?php
/* @var $this SiteController */
/* @var $error array */
$this->metaDescription = Yii::t('strings','description_main');
$this->metaKeywords =Yii::t('strings','keywords_main');
$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<h2 alt="<?php echo $code; ?>">Error </h2>

<div class="error">
<?php echo CHtml::encode($message); ?>
</div>
