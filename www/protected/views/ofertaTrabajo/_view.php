<?php
/* @var $this OfertaTrabajoController */
/* @var $data OfertaTrabajo */
?>

<div class="view">


 
	<?php
    $provincia=($data->tmp_provincia=="")? "España":$data->tmp_provincia;
    $url=Yii::t('strings','url_job')."/".UrlFriendly::stringToUrl($provincia)."/".UrlFriendly::stringToUrl($data->nombre_oferta)."/".$data->id; 
    $url2=Yii::t('strings','url_job2')."/".UrlFriendly::stringToUrl($provincia)."/".UrlFriendly::stringToUrl($data->nombre_oferta)."/".$data->id; 
	  
	echo "<a href='../".$url."'>".$data->nombre_oferta."</a>"; ?>  
	<br />
	  <?php echo Util::diferenciaHora($data->fecha_publicacion);?> 
	<br />
	<?php 
		if ($data->tmp_empresa!=""){
		   echo "<i  class='icon-group width-icon'></i> ".CHtml::encode(strip_tags($data->tmp_empresa));
		} 
		
		?> 
		
	<br />
 
	<?php 
		if ($data->tmp_provincia!=""){
		   echo "<i   class='icon-map-marker width-icon' ></i> ". CHtml::encode(strip_tags($data->tmp_provincia));
		} 
		?> 
	 
	   <?php 
	   /*
		if ($data->desc_oferta!=""){
		   echo strip_tags($data->desc_oferta);
		} 
		
		?> 
  	
	<br/>
	  <center><a class="btn btn-default btn-sm" role="button" href="<?php echo 'http:'.urldecode($data->link_oferta); ?>" target="webtrabajo">
	<span class="glyphicon glyphicon-share"></span>   <?php echo Yii::t('strings','goto_offer')." ".$data->webId->web ?></a></center>
	
	 
	 
	<?php 
	
	
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('version')); ?>:</b>
	<?php echo CHtml::encode($data->version); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('categoria_id')); ?>:</b>
	<?php echo CHtml::encode($data->categoria_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion_id')); ?>:</b>
	<?php echo CHtml::encode($data->direccion_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('empresa_id')); ?>:</b>
	<?php echo CHtml::encode($data->empresa_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_publicacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_publicacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fiable')); ?>:</b>
	<?php echo CHtml::encode($data->fiable); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('jornada_id')); ?>:</b>
	<?php echo CHtml::encode($data->jornada_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_oferta')); ?>:</b>
	<?php echo CHtml::encode($data->link_oferta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_oferta')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_oferta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero_inscritos')); ?>:</b>
	<?php echo CHtml::encode($data->numero_inscritos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oferta_id_web')); ?>:</b>
	<?php echo CHtml::encode($data->oferta_id_web); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pais_id')); ?>:</b>
	<?php echo CHtml::encode($data->pais_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('provincia_id')); ?>:</b>
	<?php echo CHtml::encode($data->provincia_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('salario')); ?>:</b>
	<?php echo CHtml::encode($data->salario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('texto_oferta')); ?>:</b>
	<?php echo CHtml::encode($data->texto_oferta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_contrato_id')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_contrato_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tmp_jornada')); ?>:</b>
	<?php echo CHtml::encode($data->tmp_jornada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tmp_provincia')); ?>:</b>
	<?php echo CHtml::encode($data->tmp_provincia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tmp_salario')); ?>:</b>
	<?php echo CHtml::encode($data->tmp_salario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tmp_tipo_contrato')); ?>:</b>
	<?php echo CHtml::encode($data->tmp_tipo_contrato); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_empresa')); ?>:</b>
	<?php echo CHtml::encode($data->ver_empresa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('web_id_id')); ?>:</b>
	<?php echo CHtml::encode($data->web_id_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_empresa')); ?>:</b>
	<?php echo CHtml::encode($data->link_empresa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tmp_empresa')); ?>:</b>
	<?php echo CHtml::encode($data->tmp_empresa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_estado')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tmp_experiencia')); ?>:</b>
	<?php echo CHtml::encode($data->tmp_experiencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tmp_estudio_nivel')); ?>:</b>
	<?php echo CHtml::encode($data->tmp_estudio_nivel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('procesada')); ?>:</b>
	<?php echo CHtml::encode($data->procesada); ?>
	<br />

	*/ ?>

</div>