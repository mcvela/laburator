<?php
/* @var $this FavSearchController */
/* @var $data FavSearch */
$tiempo=Util::diferenciaHora($data->fecha);
$ciudad="<br>";
$idFavorito="".$data->fav_search_id;
?>
 
<?php

if ($data->txt_search_2!="" || $data->txt_search_2!=null){
    $ciudad='<br><span style="text-align:left">	<i   class="icon-map-marker width-icon" ></i>  '.CHtml::encode($data->txt_search_2).'</span>';
	}
$this->widget(
    'yiibooster.widgets.TbPanel',
    array(
	 'title' => '<button data-loading-text='.'\''.'<img src="/images/ajax-loader.gif">'.'\' id="checkbt'.$idFavorito.'" class="extra_small" onclick="clickCheck('.$idFavorito.');"><i class="fa fa-refresh"></i>&nbsp;&nbsp;<span class="badge alert-success text-right">'.$data->resultado.'</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$tiempo.'</button>',
    //'headerIcon' => 'home',
    'content' => '<u>'.Yii::t('strings','search1_title_jobs').'</u>:<br><span style="text-align:left">'.CHtml::encode($data->txt_search_1).'</span>'.$ciudad.'<br>
	<div id="estadisticas'.$idFavorito.'"> </div>
	<span class="span12 text-center"><form  action="/search" role="search" id="formsearch'.$idFavorito.'" method="get"> 
						<input type="hidden" class="form-control"  name="srch1" id="srch1" value="'.$data->txt_search_1.'">
                         <input type="hidden" class="form-control"   name="srch2" id="srch2" value="'.$data->txt_search_2.'">
                         <input type="hidden" name="id_favserv" value="'.$idFavorito.'">
                         <button type="submit" onclick="$(\'#formsearch'.$idFavorito.'\').submit();" class="btn btn-default loadingBoton" data-loading-text='.'\''.'<img src="/images/ajax-loader.gif">'.'\''.'><i class="glyphicon glyphicon-search"></i></button>
						 </form></span>',
	'headerButtons' => array(
						array(
								'class' => 'booster.widgets.TbButtonGroup',
								'context' => 'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
								/*'buttons' => array(
								array('label' => 'Action', 'url' => '#'), // this makes it split :)
								array(
									'items' => array(
									array('label' => 'Action', 'url' => '#'),
										array('label' => 'Another action', 'url' => '#'),
										array('label' => 'Something else', 'url' => '#'),
										'---',
										array('label' => 'Separate link', 'url' => '#'),
									)
								),
								)*/
						),
						array(
						 'encodeLabel'=>false,
						'size' => 'extra_small',
						'class' => 'booster.widgets.TbButtonGroup',
						'buttons' => array(
											//array('buttonType' => 'button','icon' => 'search', 'url' => '#','active'=>true,'htmlOptions' => array(
											//'onclick' => 'js:document.location.href="/search?srch1='.$data->txt_search_1.'&srch2='.$data->txt_search_2.'&id_favserv='.$idFavorito.'"'
											//),'active'=>true),
											//array('label' => '     ', 'url' => '#','active'=>false),
											array(
											'id'=> 'deleteButton'.$idFavorito,
 											'label' => '&times;',
											'buttonType' => 'button',
											'htmlOptions' => array(
												 'onclick' => 'clickDeleteCheck('.$idFavorito.')',
												 'class'=>'loadingBoton',
												 'data-loading-text'=>'<img src="/images/ajax-loader.gif">'
												 ),
											'active'=>true,
											     /*'url' => Yii::app()->createUrl(
															'favSearch/update',array('idborrar'=>$idFavorito,'delete'=>'true')
													),
													'ajaxOptions' => array(
														'type' => 'GET',
														'success' => 'function(data) { 
																		$("#favServPanel'.$idFavorito.'").hide();
														}',
													)*/
												),
										),
			 
					)
		)
    )
 );
	

 
?>
 
<script>


function cargarEstadisticas(id){
 
  $('#estadisticas'+id).html("<img src='/images/ajax-loader.gif' />").load('<?= Yii::app()->getBaseUrl(true)?>/favSearch/FirstStadistics?id_favserv='+id);
}
 cargarEstadisticas(<?php echo $idFavorito;?>);


 
setTimeout('clickCheck(<?php echo $idFavorito;?>)', 600000); /// Cada 10 minutos-- 600000
</script>

 
 				 
 