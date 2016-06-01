<script>
<?php
  //echo $this->renderPartial('//layouts/_jquery_2_0_3');
  //echo $this->renderPartial('//layouts/_jquery_1_4_2');
  //echo $this->renderPartial('//layouts/_jquery_1_8_3'); // ok
  //echo $this->renderPartial('//layouts/_jquery_1_11_2');
  //echo $this->renderPartial('//layouts/_jquery_yii_listview');
  //echo $this->renderPartial('//layouts/_bootstrap_3_3_1');
 ?>

 
function clickBasura(id){

$.ajax({ // ajax call starts
      url: '/favOfertas/update',
      data: 'd=o&ido=' + id, // Send value of the clicked button
      dataType: 'json', // Choosing a JSON datatype
	   beforeSend: function() {
        $("#saveBasuraFav"+id).button("loading");
      },
      success: function(data) // Variable data contains the data we get from serverside
      {
							$("#saveBasuraFav"+id).button("reset");
							   if (data.url){
							      document.location.href=data.url;
					          }else if (data.status=="ok" && data.message==1){
                                   $("#saveBasuraFav"+id).addClass("btn-orange"); 
								  // $("#saveMegustaFav"+id).attr("disabled", "disabled");
								   $("#saveMegustaFav"+id).removeClass("btn-orange");
                               }else{
							       $("#saveBasuraFav"+id).removeClass("btn-orange");
								   //$("#saveMegustaFav"+id).removeAttr("disabled", "disabled"); 
								   $("#saveMegustaFav"+id).addClass("btn-orange");
                              } 
      },
	  complete: function() {
        $("#saveBasuraFav"+id).button("reset");
	  }
    });

}

function clickMegusta(id){

$.ajax({ // ajax call starts
      url: '/favOfertas/update',
      data: 'm=o&ido=' + id, // Send value of the clicked button
      dataType: 'json', // Choosing a JSON datatype
	  beforeSend: function() {
        $("#saveMegustaFav"+id).button("loading");
      },
      success: function(data) // Variable data contains the data we get from serverside
      {
							
							   if (data.url){
							      document.location.href=data.url;
					          }else if (data.status=="ok" && data.message==1){
                                   $("#saveMegustaFav"+id).addClass("btn-orange"); 
								  // $("#saveBasuraFav"+id).attr("disabled", "disabled");
								   $("#saveBasuraFav"+id).removeClass("btn-orange");
                               }else{
							       $("#saveMegustaFav"+id).removeClass("btn-orange");
								   //$("#saveBasuraFav"+id).removeAttr("disabled", "disabled"); 
								   $("#saveBasuraFav"+id).addClass("btn-orange");
                              } 
      },
	  complete: function() {
         $("#saveMegustaFav"+id).button('reset');
	  }
    });

}
function clickBoton(id,boton){

$.ajax({ // ajax call starts
      url: '/favOfertas/update',
      data: 'accion='+boton+'&ido=' + id, // Send value of the clicked button
      dataType: 'json', // Choosing a JSON datatype
	  beforeSend: function() {
        $("#save"+boton+"Fav"+id).button("loading");
      },
      success: function(data) // Variable data contains the data we get from serverside
      {                     var campo="#save"+boton+"Fav"+id;
							 
							   if (data.url){
							      document.location.href=data.url;
					          }else if (data.status=="ok" && (data.message==1 || data.message=="1")){
							       $(campo).removeClass("btn-orange");
								   //$("#saveBasuraFav"+id).removeAttr("disabled", "disabled"); 
								   $(campo).addClass("btn-orange");
                                  
                               }else{
							       $(campo).addClass("btn-orange"); 
								  // $("#saveBasuraFav"+id).attr("disabled", "disabled");
								   $(campo).removeClass("btn-orange");
                              } 
      },
	  complete: function() {
         $("#save"+boton+"Fav"+id).button('reset');
	  }
    });

}
function clickCon(capa){
		<?php if (Yii::app()->user->isGuest){ ?>
			 document.location.href="<?= Yii::app()->getBaseUrl(true) ."/".Yii::t('strings','url_menu_login'); ?>?msg="+capa;
		<?php }else{?>
		 $("#"+capa+"bt").button("loading");
		 
		  var valor=($("#"+capa).val()=="" || $("#"+capa).val()=="0")? "1":"0";
		  if (valor=="1"){
		   
			$("#"+capa+"bt").addClass("btn-orange"); 
		  }else{
			 $("#"+capa+"bt").removeClass("btn-orange"); 
		  }
		   $("#"+capa+"bt").button("reset");
		  $("#"+capa).val(valor);
		<?php }?>  
}
</script>