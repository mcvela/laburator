<?php
if ($irlink){

 
                $linkOferta=$model->link_oferta;
                $cabecera='';
                if (strpos($linkOferta,'http://')!=0 || strpos($linkOferta,'https://')!=0){
                  $cabecera='http:';
                }

             echo "<a id='anchorID' href='".$cabecera.urldecode($linkOferta)."' ></a>"; // target='win".$model->webId->web."'
        ?>
		<br><br>
<img src="/images/loading.gif">
         <script> 
            document.getElementById("anchorID").click();
			 window.history.back();
        </script>
<?php 
}else{
?>

<?php
/* vista oferta de trabajo */
/* @var $this OfertaTrabajoController */
/* @var $model OfertaTrabajo */

$this->breadcrumbs=array(
	Yii::t('strings','url_job_bread')=>array('index')
);

$provincia=($model->tmp_provincia=="")? "España":$model->tmp_provincia;
$url=Yii::t('strings','url_job')."/".UrlFriendly::stringToUrl($provincia)."/".UrlFriendly::stringToUrl($model->nombre_oferta)."/".$model->id; 

/*
$this->menu=array(
	array('label'=>'List OfertaTrabajo', 'url'=>array('index')),
	array('label'=>'Create OfertaTrabajo', 'url'=>array('create')),
	array('label'=>'Update OfertaTrabajo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete OfertaTrabajo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OfertaTrabajo', 'url'=>array('admin')),
);
*/

try{ 
$this->metaDescription = strip_tags($model->desc_oferta);
$this->metaKeywords = strip_tags($model->desc_oferta);
$this->pageTitle=htmlspecialchars_decode($model->nombre_oferta);
}catch(Exception $e){

}
?>

<h1><?php echo htmlspecialchars_decode($model->nombre_oferta); ?></h1>


<div class="container containerMain">
<div  class="row text-right" style="background-color:#C6C6C6;padding-right:0px">

	
<?php $this->renderPartial('_indicadoresoferta', array('model'=>$model,'modelFavOfertas'=>$modelFavOfertas)); ?>	
</div>
<div id="main-content"> 

<div class="row" >
 <div class="col-md-4 text-left" >
<?php
           if ($model->tmp_provincia!=""){
			   if (strlen($model->tmp_provincia)<50){
			       if (strlen($model->tmp_provincia)<15){
				      echo " <i class='icon-map-marker'></i> &nbsp; ".$model->tmp_provincia;  
				  }else{
				      echo " <i class='icon-map-marker'></i>&nbsp;  ".substr($model->tmp_provincia, 0, 15)."...";  
				  }
			   }
		   }
	  ?></div>	
 <div class="col-md-4"></div><div class="col-md-4"></div>
</div>	  
<div class="row" >
 <div class="col-md-4 text-left" ><?php if ($model->tmp_empresa!="") echo "<i class='icon-office-building'></i> &nbsp; ".htmlspecialchars_decode($model->tmp_empresa); ?></div>
 <div class="col-md-4"></div><div class="col-md-4"></div>
</div>
<div class="row" >
 <div class="col-md-4 text-left"><i class="icon-calendar"></i>&nbsp;&nbsp; <?php echo Yii::app()->dateFormatter->format(Yii::t('strings','date_format'), $model->fecha_publicacion); ?></div>
 <div class="col-md-4"></div><div class="col-md-4"></div>
</div>
<div class="row cajaOferta" >
<?php echo strip_tags($model->desc_oferta); ?>...
<br>
</div class="row">
<?php
	    
        $linkOferta=$model->link_oferta;
        $cabecera='';
        if (strpos($linkOferta,'http://')!=0 || strpos($linkOferta,'https://')!=0){
          $cabecera='http:';
        }
        //if (Yii::app()->session['app']){ 
        //  $linkOferta=$cabecera.urldecode($linkOferta);
		//}else{
		$linkOferta="/ir/a/".$url."/".$model->id_rnd."/".$model->id;
		//}
        ?>
 
<div class="row" ><br>
	<center><a class="btn btn-default btn-sm" role="button" target=" <?php echo $model->webId->web; ?>"  id="goToMain" href="<?php echo $linkOferta;?>" >
	<i class="fa fa-external-link" ></i>   <?php echo Yii::t('strings','goto_offer')." ".$model->webId->web ?></a></center>
	<br><br><br>
</div>
<?php
try{
  $checkbasura="";
  $checkmegusta="";
  $checkaplicar="";
  $checkentrevista="";
  $checkfinalizada="";
if (isset($modelFavOfertas)){
 $checkbasura=($modelFavOfertas->basura>0)? "btn-orange":"";
 $checkmegusta=($modelFavOfertas->megusta>0)? "btn-orange":"";
 $checkaplicar=($modelFavOfertas->aplicar>0)? "btn-orange":"";
 $checkentrevista=($modelFavOfertas->entrevista>0)? "btn-orange":"";
 $checkfinalizada=($modelFavOfertas->finalizada>0)? "btn-orange":"";
 }
?>
<div class="row" >
 <div class="col-xs-6" >

 <?php 
 $fecha_aplicar="";
 $fecha_entrevista="";
 if (isset($modelFavOfertas)){ 
  $fecha_aplicar=":". Yii::app()->dateFormatter->format(Yii::t('strings','date_format'), $modelFavOfertas->fecha_aplicar);
  $fecha_entrevista=":". Yii::app()->dateFormatter->format(Yii::t('strings','date_format'), $modelFavOfertas->fecha_entrevista);
  } // if (isset($modelFavOfertas)){?>
  
 

			  
 <button  style="width:60px" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo Yii::t('strings','tooltip_aplicar'); ?>" class=" <?= $checkaplicar ?>  " id="saveAplicarFav<?php echo $model->id;?>" name="saveAplicarFav<?php echo $model->id;?>" data-loading-text="<img src='/images/ajax-loader.gif' width='12px' height='16px' >" onClick="clickBoton(<?php echo $model->id;?>,'Aplicar')"> 
			  <i class='fa fa-hand-o-up'></i></button> 

 <button  style="width:60px" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo Yii::t('strings','tooltip_entrevista'); ?>" class=" <?= $checkentrevista ?>  " id="saveEntrevistaFav<?php echo $model->id;?>" name="saveEntrevistaFav<?php echo $model->id;?>" data-loading-text="<img src='/images/ajax-loader.gif' width='12px' height='16px' >" onClick="clickBoton(<?php echo $model->id;?>,'Entrevista')"> 
			  <i class='icon-groups-friends'></i></button> 
 <button  style="width:60px" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo Yii::t('strings','tooltip_finalizada'); ?>" class=" <?= $checkfinalizada ?>  " id="saveFinalizadaFav<?php echo $model->id;?>" name="saveFinalizadaFav<?php echo $model->id;?>" data-loading-text="<img src='/images/ajax-loader.gif' width='12px' height='16px' >" onClick="clickBoton(<?php echo $model->id;?>,'Finalizada')"> 
			  <i class='icon-remove-circle'></i></button> 			  
 <?php 
  ?>			  
 </div>
    <div class="col-xs-6" >
	<center>
			  <div class="input-group ">    
			  <button  style="width:60px" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo Yii::t('strings','tooltip_megusta');?>" class="input-group-addon <?= $checkmegusta ?>  botonmegustabasura" id="saveMegustaFav<?php echo $model->id;?>" data-loading-text="<img src='/images/ajax-loader.gif' width='12px' height='16px' >" onClick="clickMegusta(<?php echo $model->id;?>)"> 
			  <i class='fa fa fa-heart-o'></i></button><button  style="width:60px"  data-placement="top" data-toggle="tooltip" data-original-title="<?php echo Yii::t('strings','tooltip_nomegusta');?>"  class="input-group-addon <?= $checkbasura ?>  botonmegustabasura" id="saveBasuraFav<?php echo $model->id;?>" data-loading-text="<img src='/images/ajax-loader.gif' width='12px' height='16px' >" onClick="clickBasura(<?php echo $model->id;?>)">  
			 <i class='fa fa fa-trash-o'></i></button>
			</div>	
     </center>			
      </div>
 </div>

<div>
 <br>
<?php



$this->widget('application.extensions.SocialShareButton.SocialShareButton', array(
        'style'=>'horizontal',
        'networks' => array('facebook','googleplus','linkedin'),
        'data_via'=>'', //twitter username (for twitter only, if exists else leave empty)
));

} catch (Exception $e) {


}
/*
<span class='st_sharethis_large' displayText='ShareThis'></span>
<span class='st_facebook_large' displayText='Facebook'></span>
<span class='st_twitter_large' displayText='Tweet'></span>
<span class='st_linkedin_large' displayText='LinkedIn'></span>
<span class='st_pinterest_large' displayText='Pinterest'></span>
<span class='st_email_large' displayText='Email'></span>

*/
?>

<br><br>

</div>

 
</div>  
</div>
<?php 
} // Fin ir a 
?>