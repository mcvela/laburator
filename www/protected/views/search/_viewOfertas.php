 

<?php
//$this->layout=false;

/* @var $this OfertaTrabajoController */
/* @var $data OfertaTrabajo */

 
  $provincia=($data->tmp_provincia=="")? Yii::t('strings','spain_url'):$data->tmp_provincia;
  $url=Yii::t('strings','url_job')."/".UrlFriendly::stringToUrl($provincia)."/".UrlFriendly::stringToUrl($data->nombre_oferta)."/".$data->id; 
  $url2=Yii::t('strings','url_job2')."/".UrlFriendly::stringToUrl($provincia)."/".UrlFriendly::stringToUrl($data->nombre_oferta)."/".$data->id; 
?>

<?php
 $visto="colorLinkOferta";
 $checkvisto='<i class="fa fa-eye visto"></i>';
 //$checklink='<i class="fa fa-external-link visto"></i>';
 $checkbasura="";
 $checkmegusta="";
 $checkcomentario='<i class="icon-commentroundtypingempty visto"></i>';
 $checkaplicar='<i class="fa fa-hand-o-up visto"></i>';
 $checkentrevista='<i class="icon-groups-friends visto"></i>';
 $checkfinalizada=	'';


        try{
			if (count($vistas)>0 && isset($vistas[$data->id."-vista"]) ){
				//$visto=($vistas[$data->id][1])>0? "colorLinkOferta":"colorLinkOferta";
				
				$checkvisto=($vistas[$data->id."-vista"]>0)? "<i class='fa fa-eye' data-toggle='tooltip' data-placement='top' title='".Yii::t('strings','tooltip_veroferta').":".Yii::app()->dateFormatter->format(Yii::t('strings','date_format'), $vistas[$data->id]["fecha_ver"])."'></i>":"<i class='fa fa-eye visto'  ></i>";
				//$checklink=($vistas[$data->id."-link"]>0)? "<i class='fa fa-external-link'  data-toggle='tooltip' data-placement='top' title='".Yii::t('strings','tooltip_linkoferta').":".Yii::app()->dateFormatter->format(Yii::t('strings','date_format'), $vistas[$data->id]["fecha_link"])."'></i>":"<i class='fa fa-external-link visto'  ></i>";
				$checkcomentario="<i class='icon-commentroundtypingempty visto'  ></i>";
				$checkaplicar=($vistas[$data->id."-aplicar"]>0)? "<i class='fa fa-hand-o-up' data-toggle='tooltip' data-placement='top' title='".Yii::t('strings','tooltip_aplicar').":".Yii::app()->dateFormatter->format(Yii::t('strings','date_format'), $vistas[$data->id]["fecha_aplicar"])."'></i>":"<i class='fa fa-hand-o-up visto'  ></i>"; 
				$checkentrevista=($vistas[$data->id."-entrevista"]>0)? "<i class='icon-groups-friends' data-toggle='tooltip' data-placement='top' title='".Yii::t('strings','tooltip_entrevista').":".Yii::app()->dateFormatter->format(Yii::t('strings','date_format'), $vistas[$data->id]["fecha_entrevista"])."'></i>":"<i class='icon-groups-friends visto'  ></i>"; 
				 
				$checkbasura=($vistas[$data->id."-basura"]>0)? " btn-orange ":"";
				$checkmegusta=($vistas[$data->id."-megusta"]>0)? " btn-orange ":"";
				$checkfinalizada=($vistas[$data->id."-finalizada"]>0)? "<i class='icon-remove-circle'></i>&nbsp;&nbsp;". Yii::t('strings','tooltip_finalizada'):"";
			 }
        }  catch (Exception $e){
            
        }
		
		//echo $vistas[$data->id."-vista"]["fecha"]."<br>";
		//echo $vistas[$data->id."-link"]["fecha"];
?>
<div class="view <?= ($index % 2) ? 'odd' : 'even' ?>">
<?php
	    
       
	$tiempo=Util::diferenciaHora($data->fecha_publicacion);
	 
	
	
	$debugListado=true;
	$nombre_oferta=htmlspecialchars_decode($data->nombre_oferta);
    if ($nombre_oferta==""){
		if ($debugListado) $nombre_oferta="<font color='red'>(ERROR TITULO)</font>";	
	}
	?>
	<a href="<?php echo $url;?>" class="<?php echo $visto; ?>" <?php echo (Yii::app()->session['ultimaoferta']==$data->id)? 'style="color:#FF6A00"':'' ?>>
	<div class="row" >
            <div class="col-md-2  text-right" style="background-color:#C6C6C6;padding-right:0px">&nbsp; 
			<?php if ($checkfinalizada!=""){
			  echo $checkfinalizada;
			}else{ ?>
				  <?php	 echo " $tiempo"; ?> 
				 &nbsp;<?php  echo "$checkvisto"; ?> 
				 &nbsp;<?php  echo "$checkaplicar"; ?> 
				 &nbsp;<?php  echo "$checkcomentario"; ?> 
				 &nbsp;<?php  echo "$checkentrevista"; ?> 
			<?php } ?>	 
			</div>
			<div class="col-md-6 sinpadding text-left" > <b> 
             <?php

				if ($data->nombre_oferta!=""){
					
					   if (strlen($data->nombre_oferta)<55){
						  echo  $data->nombre_oferta;  
					  }else{
						  echo  substr($data->nombre_oferta, 0, 55)."...";  
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
			?>
			 </b>
		 </div>
	   <div class="col-md-2 text-left" >
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
	  ?>
	  </div>
	  </a>
	  <div class="col-md-2" >
	  <center>
			 <div class="input-group">  
			  <button style="width:60px"  data-placement="top" data-toggle="tooltip" data-original-title="<?php echo Yii::t('strings','tooltip_megusta');?>" title="<?php echo Yii::t('strings','tooltip_megusta');?>" class="input-group-addon <?= $checkmegusta ?> text-center  botonmegustabasura" id="saveMegustaFav<?php echo $data->id;?>" data-loading-text="<img src='/images/ajax-loader.gif' width='12px' height='16px' >" onClick="clickMegusta(<?php echo $data->id;?>)"> 
			  <i class='fa fa fa-heart-o'></i></button><button   style="width:60px"  data-placement="top" data-toggle="tooltip" data-original-title="<?php echo Yii::t('strings','tooltip_nomegusta');?>" title="<?php echo Yii::t('strings','tooltip_nomegusta');?>" class="input-group-addon <?= $checkbasura ?> text-center  botonmegustabasura" id="saveBasuraFav<?php echo $data->id;?>" data-loading-text="<img src='/images/ajax-loader.gif' width='12px' height='16px' >" onClick="clickBasura(<?php echo $data->id;?>)">  
			 <i class='fa fa fa-trash-o'></i></button>
			</div>	
     </center>			
      </div>


</div>
	
<br>	 
</div>
