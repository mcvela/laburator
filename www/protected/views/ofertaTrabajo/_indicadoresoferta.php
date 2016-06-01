<?php
 $visto="colorLinkOferta";
 $checkvisto='<i class="fa fa-eye visto"></i>';
 $checklink='<i class="fa fa-external-link visto"></i>';
 $checkbasura="";
 $checkmegusta="";
 $checkcomentario='<i class="icon-commentroundtypingempty visto"></i>';
 $checkaplicar='<i class="fa fa-hand-o-up visto"></i>';
 $checkentrevista='<i class="icon-groups-friends visto"></i>';
 $tiempo=Util::diferenciaHora($model->fecha_publicacion);
 if (isset($modelFavOfertas)){
			    $checkvisto=($modelFavOfertas->ver>0)? "<i class='fa fa-eye' data-toggle='tooltip' data-placement='top' title='".Yii::t('strings','tooltip_veroferta').":".Yii::app()->dateFormatter->format(Yii::t('strings','date_format'), $modelFavOfertas->fecha_ver)."'></i>":"<i class='fa fa-eye visto'  ></i>";
				$checklink=($modelFavOfertas->link>0)? "<i class='fa fa-external-link'  data-toggle='tooltip' data-placement='top' title='".Yii::t('strings','tooltip_linkoferta').":".Yii::app()->dateFormatter->format(Yii::t('strings','date_format'), $modelFavOfertas->fecha_link)."'></i>":"<i class='fa fa-external-link visto'  ></i>";
				$checkcomentario="<i class='icon-commentroundtypingempty visto'  ></i>";
				$checkaplicar="<i class='fa fa-hand-o-up visto'  ></i>";
				$checkentrevista="<i class='icon-groups-friends visto'  ></i>";
				 

			 }
        
?>

 &nbsp;
			  <?php	 echo " $tiempo"; ?> 
			 
			 &nbsp;<?php  echo "$checklink"; ?> 
			 &nbsp;<?php  echo "$checkaplicar"; ?> 
			 &nbsp;<?php  echo "$checkcomentario"; ?> 
			 &nbsp;<?php  echo "$checkentrevista"; ?> 