<?php
/* @var $this FavSearchController */
/* @var $dataProvider CActiveDataProvider */
$this->metaDescription = Yii::t('strings','description_main');
$this->metaKeywords =Yii::t('strings','keywords_main');
$this->pageTitle=Yii::t('strings','title_favsearch');
$this->breadcrumbs=array(
	'Fav Searches',
);

?>

<h1>Busquedas favoritas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view_mobile',
)); ?>


