<?php
/* @var $this FavSearchController */
/* @var $data FavSearch */
$tiempo=Util::diferenciaHora($data->fecha);
$ciudad="<br>";
$idFavorito="".$data->fav_search_id;
?>
 
<div class="view col-md-3 sinpadding " id="favServPanel<?php echo $idFavorito;?>">
<?php $this->renderPartial('check', array('data'=>$data)); ?>


</div>
