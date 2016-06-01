<?php
/* @var $this TripasAdminController */

$this->breadcrumbs=array(
	'Tripas Admin',
);
?>
<style>
.odd td{
 color:black;
}
</style>
<h1>Panel de control</h1>

<div id="statusUsuarios">

</div>

<script>


function cargarUsuarios(urlcargar){
  $('#statusUsuarios').html("<img src='/images/loading.gif' />").load('<?= Yii::app()->getBaseUrl(true) ."/tripasAdmin/"; ?>'+urlcargar);
}
cargarUsuarios("totalUsuariosAjax");


</script>