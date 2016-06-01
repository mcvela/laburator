<?php
/* @var $this OfertaTrabajoController */
/* @var $data OfertaTrabajo */

$url=$data->firstname.' '.$data->lastname;
 
$url=UrlFriendly::stringToUrl($url).'/profile/'.$data->user_id; 
?>

<div class="view">

	- 
	<?php echo CHtml::link(CHtml::encode($data->firstname.','.$data->lastname), array($url)); ?>
	 
	<br />

</div>
        