<?php
/* @var $this OfertaTrabajoController */
/* @var $model OfertaTrabajo */
$data=$model;
/*
$provincia=($data->tmp_provincia=="")? Yii::t('strings','spain_url'):$data->tmp_provincia;
$url=Yii::t('strings','url_job')."/".UrlFriendly::stringToUrl($provincia)."/".UrlFriendly::stringToUrl($data->nombre_oferta)."/".$data->id; 
$url2=Yii::t('strings','url_job2')."/".UrlFriendly::stringToUrl($provincia)."/".UrlFriendly::stringToUrl($data->nombre_oferta)."/".$data->id; 
*/
?>
<br><br>

<?php
 
        $linkOferta=$model->link_oferta;
        $cabecera='';
        if (strpos($linkOferta,'http://')!=0 || strpos($linkOferta,'https://')!=0){
          $cabecera='http:';
        }
        
     echo "<a id='anchorID' href='".$cabecera.urldecode($linkOferta)."' target='newwindow'></a>";
	 
?>
<?php if (Yii::app()->session['app']){  ?>
	 <script> 
		document.location.href='".$cabecera.urldecode($linkOferta)."';
	</script>
<?php }else{ //if (Yii::app()->session['app']){  ?>
	 <script> 
		$("#anchorID").click();
	</script>
<?php }//if (Yii::app()->session['app']){  ?>

