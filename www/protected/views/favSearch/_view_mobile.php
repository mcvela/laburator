<?php
/* @var $this FavSearchController */
/* @var $data FavSearch */
$tiempo=Util::diferenciaHora($data->fecha);
?>

<div class="row" id="row<?php echo $data->fav_search_id ?>">
<?php /* ?>
 <div class="col-md-1 sinpadding "><button type='button' class="btn btn-default" id="deleteSearchFav"><i class="fa fa-times"></i>
  <?php echo CHtml::ajaxSubmitButton('Delete',CHtml::normalizeUrl(array('favSearch/delete/'.$data->fav_search_id.'?')),
                 array(
                     'id'=>'deleteSearchFav',
                     'dataType'=>'json',
                     'type'=>'post',
                     'success'=>'function(data) {
				             if (data.status=="ok"){
                                 $("#row"+data.msg).remove();
                               } else  if(data.status=="error"){
                                   
                               }  
                               
                           }',                    
                     ),array('id'=>'deleteSearchFav','class'=>'noDisplay')); ?>
					 </button>
 </div>
 <?php */ ?>
      <div class="col-md-2 sinpadding "><?php  echo " $tiempo"; ?></div>
      
	<div class="col-md-4 text-left"><b>Que?:</b>
	<?php echo CHtml::encode($data->txt_search_1); ?>
	 </div>
        <div class="col-md-3 text-left" >
	<b>Donde?:</b>
	<?php echo CHtml::encode($data->txt_search_2); ?>
	</div>
      <div class="col-md-1 text-left" >
	( &nbsp;
	<?php echo CHtml::encode($data->resultado); ?> &nbsp;)
	</div>
	 <div class="col-md-1 text-left">
						<form  action="/search" role="search" id="formsearch" method='post'> 
						<input type="hidden" class="form-control" placeholder="Puesto que buscas?" name="srch1" id="srch1" value="<?php echo $data->txt_search_1; ?>">
                         <input type="hidden" class="form-control" placeholder="Donde?" name="srch2" id="srch2" value="<?php echo $data->txt_search_2; ?>">
                         <input type="hidden" name="id_favserv" value="<?php echo $data->fav_search_id; ?>">
                         <button type='submit' class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
						 </form>
						
       </div>
	


</div>