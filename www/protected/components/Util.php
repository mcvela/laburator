<?php
class Util
{
 public static function colorPorcentaje($porcentaje)
    {
	$result="";
	//'success', 'info', 'warning', or 'danger'
		switch (TRUE) {
			case $porcentaje<=15:
				$result= 'danger';
				break;
			case $porcentaje>15 && $porcentaje<=50:
				$result= 'warning';
				break;
			case $porcentaje>50 && $porcentaje<75:
				$result= 'success';
				break;
			case $porcentaje>75:
				$result= 'success';
				break;
			default:
				$result= 'warning';
			break;
		}
	   return $result;
	}
 
    public static function diferenciaHora($fecha_publicacion)
    {
	    $dateNow = new DateTime("now", new DateTimeZone('Europe/Madrid') );
	    
	    $result = array(
			"diferencia_dias" => null,
			"diferencia_horas" => null,
			"diferencia_minutos" => null,
		);
		
	    $fecha="".$fecha_publicacion;
		$segundos=strtotime('now Europe/Madrid') - strtotime($fecha); 
		$result['diferencia_dias']=intval($segundos/60/60/24);
		$result['diferencia_horas']=intval($segundos/60/60);
		$result['diferencia_minutos']=intval($segundos/60);

		$tiempo="";
		if ($result['diferencia_dias']==0){
		  if ($result['diferencia_horas']==0){
		    if ($result['diferencia_minutos']<0){
			  $tiempo="<span class='icon-fire width-icon'></span><span class='tiempodesde'></span>";
			}else{
			  $tiempo="<span class='icon-alarm width-icon'></span><span class='tiempodesde'>".$result['diferencia_minutos']." m.</span>";
			 }
		  }else{
		    if ($result['diferencia_horas']<0){
			  $tiempo="<i class='icon-fire width-icon'></i><span class='tiempodesde'></span>";
			}else{
			 $tiempo="<i class='icon-time width-icon'></i><span class='tiempodesde'>".$result['diferencia_horas']." h.</span>";
			 }
		  }
		}else{
		   if ($result['diferencia_dias']>365){
		     $tiempo="<i class='icon-calendar width-icon'></i><span class='tiempodesde'>>1 año</span>";
		   }else{
		    $tiempo="<i class='icon-calendar width-icon'></i><span class='tiempodesde'>".$result['diferencia_dias']." d.</span>";
		  }
		}
	
        return $tiempo;
        
    }
	

    
}
