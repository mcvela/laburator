<?php


	
/* @var $this OfertaTrabajoController */
/* @var $data OfertaTrabajo */

 //$url='ofertaTrabajo';
 
 //$url=$url."/".$data->id; 
  $provincia=($data->tmp_provincia=="")? Yii::t('strings','spain_url'):$data->tmp_provincia;
 
  $url=Yii::t('strings','url_job')."/".UrlFriendly::stringToUrl($provincia)."/".UrlFriendly::stringToUrl($data->nombre_oferta)."/".$data->id; 
  $url2=Yii::t('strings','url_job2')."/".UrlFriendly::stringToUrl($provincia)."/".UrlFriendly::stringToUrl($data->nombre_oferta)."/".$data->id; 
?>

<div class="view <?= ($index % 2) ? 'odd' : 'even' ?>" >
 
	<?php
	 
	
	$tiempo=Util::diferenciaHora($data->fecha_publicacion);
	 
	
	
	$debugListado=true;
	$nombre_oferta=htmlspecialchars_decode($data->nombre_oferta);
    if ($nombre_oferta==""){
		if ($debugListado) $nombre_oferta="<font color='red'>(ERROR TITULO)</font>";	
	}
	?>
    <a href="/<?php echo $url;?>" class="colorLinkOferta">
	<div class="row">
            <div class="col-md-2 sinpadding text-right" style="background-color:#C6C6C6"><?php  echo " $tiempo"; ?>&nbsp;&nbsp;
			<i class="fa fa-eye visto"></i>
			<i class="fa fa-hand-o-up visto"></i>
			<i class="icon-commentroundtypingempty visto"></i>
			<i class="icon-groups-friends visto"></i></div>
            <div class="col-md-5 sinpadding text-left"><b><?php 
				if ($data->nombre_oferta!=""){
					
					   if (strlen($data->nombre_oferta)<55){
						  echo $data->nombre_oferta;  
					  }else{
						  echo substr($data->nombre_oferta, 0, 55)."...";  
					  }
					
			   }
            ?> 
			  <?php 
			 /* 
			 if(Yii::app()->getModule('user')->isAdmin()==1){
				 if ($data->texto_oferta=="" || $data->texto_oferta==null){
				   if ($debugListado) echo "<font color='red'>(Error)</font>";
				 }
				 if ($data->tmp_tags=="" || $data->tmp_tags==null){
				   //if ($debugListado) echo "<font color='yellow'>(ERROR SIN TAGS)</font>";
				 }
			 
			    echo "(".$data->webId->web.")";
			 }
			 */
			?></b>
	  </div>
	  <div class="col-md-2 sinpadding text-left" >
	   <?php
           if ($data->tmp_provincia!=""){
			   if (strlen($data->tmp_provincia)<50){
			       if (strlen($data->tmp_provincia)<15){
				      echo "<i class='icon-map-marker'></i> ".$data->tmp_provincia;  
				  }else{
				      echo "<i class='icon-map-marker'></i> ".substr($data->tmp_provincia, 0, 15)."...";  
				  }
			   }
		   }
	  ?></div>
	 <?php 
         /*
          <div class="col-md-2 sinpadding"><a class="btn btn-default  btn-sm" href="<?php echo $url2;?>" role="button">
	  &nbsp;<i class='icon-plus-sign'></i> </a></div>
                  */ ?>
    </div>
	</a>
	<br></div>