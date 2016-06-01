<?php
/* @var $this OfertaTagsController */

$this->breadcrumbs=array(
	'Oferta Tags',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
	<?php echo Yii::app()->request->baseUrl.'/json/'; ?>
</p>

 
[<?php if($tags){
$total = count($tags) - 1;
foreach ($tags as $i =>$tag){
    echo '{';
    echo '"id": "'.$tag->tag.'",';
    echo '"label": "'.$tag->tag.'",';
  //  echo '"value": "'.$tag->slug.'"';
    echo '}';
    if($total !== $i){
        echo ',';
    }
}
}?>]
