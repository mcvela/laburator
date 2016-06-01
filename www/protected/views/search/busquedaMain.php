<style>
 span.btn-orange:hover { 
    color: white;
	background-color:orange;
}
.btn-orangecolor { 
    color: orange;
	 
}
.list-view{
   padding-top: 0;
}
.items{
 padding-top: 0;
}
</style>
<?php
/* @var $this SearchController */


$this->metaDescription = Yii::t('strings','description_main');
$this->metaKeywords =Yii::t('strings','keywords_main');
$this->pageTitle=Yii::t('strings','title_main');
	
$this->breadcrumbs=array(
	Yii::t('strings','menu_trabajos'),
);

 
 $srch1=($srch1)? $srch1:"";
 $srch2=($srch2)? $srch2:"";
 $result=($result)? $result:0;   
 $conbasura=($conbasura)? true:false; 
 $conmegusta=($conmegusta)? true:false; 
 
 if ($dataProvider!=null){
 if ($dataProvider->itemCount>0){ ?>
		<h1>Usuarios</h1>

		<?php 

		$this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider, /* the same as CGridView */
			'itemView'=>'_view'
		)); 
		 

		?>
<?php } // if ($dataProvider->itemCount>0){
} // if ($dataProvider!=null){ ?>

<?php
/*
$assigned  = array('C', 'Perl', 'PHP');//OfertaTags::model()->findAll();
$available = array('C', 'C++', 'C#', 'Java', 'Perl', 'PHP', 'Python','Madrid','Malaga');//OfertaTags::model()->findAll();
$this->widget('ext.TagHandler.TagHandler', array(
    'name'=>'array_tag_handler',
    'options'=>array(
    //'getURL'=>$ajaxURL,
    'assigned'=> $assigned,
    'available'=> $available,
    'autocomplete'=>true,
	),
));
*/
 
?>

<h1> <?php echo $result." ".Yii::t('strings','search_title_jobs'); ?></h1>
	  
  <div class="row">
       <form  action="/search" role="search" id="formsearch" method='get'> 
    
    <div class="col-md-4"><?php echo Yii::t('strings','search1_title_jobs'); ?>
	<?php
	
	$arrayProfesiones=eval("return ".Yii::t('strings','search_profesiones').";");
	$this->widget(
		'booster.widgets.TbSelect2',
		array(
		'asDropDownList' => false,
		'name' => 'srch1',
		'val' => explode("&", $srch1),
		'options' => array(
				'tags' => $arrayProfesiones,
				/*'ajax'=> array(
                                   'url'       => Yii::app()->controller->createUrl('persons/allnames'),
                                   'dataType'  => 'json',
                                   'data'      => 'js:function(term, page) { return {q: term }; }',
                                   'results'   => 'js:function(data) { return {results: data}; }',
                               ),*/
                'placeholder' => '...',
				'width' => '100%',
				'tokenSeparators' => array(',', ' ')
				)
		)
		);
	?>
<input type="hidden" class="form-control" placeholder="<?php echo Yii::t('strings','search1_title_jobs'); ?>" name="srch1old" id="srch1old" value="<?php echo $srch1; ?>">
<input type="hidden" class="form-control" placeholder="<?php echo Yii::t('strings','search2_title_jobs'); ?>" name="srch2old" id="srch2old" value="<?php echo $srch2; ?>">
  </div><div class="col-md-4"><?php echo Yii::t('strings','search2_title_jobs'); ?>
<?php
	$this->widget(
		'booster.widgets.TbSelect2',
		array(
		'asDropDownList' => false,
		'name' => 'srch2',
		'val' => explode("|", $srch2),
		'options' => array(
				'tags' => array('Álava','Albacete','Alicante','Almería','Asturias','Ávila','Badajoz','Barcelona','Burgos','Cáceres','Cádiz','Cantabria','Castellón','Ceuta','Ciudad Real','Córdoba','Cuenca','Girona','Las Palmas','Granada','Guadalajara','Guipúzcoa','Huelva','Huesca','Illes Balears','Jaén','A Coruña','La Rioja','León','Lleida','Lugo','Madrid','Málaga','Melilla','Murcia','Navarra','Ourense','Palencia','Pontevedra','Salamanca','Segovia','Sevilla','Soria','Tarragona','Santa Cruz de Tenerife','Teruel','Toledo','Valéncia','Valladolid','Vizcaya','Zamora','Zaragoza'),
				'placeholder' => '...',
				'width' => '100%',
				 
				'change'=>'js: function(e) {
						//console.log(e);
						alert("hola");
						//alert(e.added.text);
				}',
				'tokenSeparators' => array(',', ' ')
				)
		)
		);
	?>
	</div>
<div class="col-md-4"><br>
	<input type="hidden" class="form-control"  name="result" id="srch2" value="<?php echo $result; ?>">
           <div class="input-group">
		
		 <span class="input-group-addon btn btn- btn-lg loadingSFinBoton" id="buscarbt" data-loading-text="<img src='/images/ajax-loader.gif' width='16px'>"><i class="glyphicon glyphicon-search"></i></span>
        
		<input type="hidden" name="conmegusta" id="conmegusta" value="<?php echo $conmegusta; ?>">
        <span   data-loading-text="<img src='/images/ajax-loader.gif' width='16px'>" class="input-group-addon btn btn- btn-lg <?php echo ($conmegusta || $conmegusta=="true")? 'btn-orange':''; ?>" id="conmegustabt" onclick="clickCon('conmegusta')"><i class='fa fa fa-heart-o'></i></span>   
		
		<input type="hidden" name="conbasura" id="conbasura" value="<?php echo $conbasura; ?>">
        <span   data-loading-text="<img src='/images/ajax-loader.gif' width='16px'>" class="input-group-addon btn btn- btn-lg <?php echo ($conbasura || $conbasura=="true")? 'btn-orange':''; ?>" id="conbasurabt" onclick="clickCon('conbasura')"><i class='fa fa fa-trash-o'></i></span>       
  
        
  <span class="input-group-addon btn btn- btn-lg " id="saveSearchFav" data-loading-text="<img src='/images/ajax-loader.gif' width='32px' height='18px'>">
   
 <?php echo CHtml::ajaxButton('  ',CHtml::normalizeUrl(array('favSearch/update','search1'=>$srch1,'search2'=>$srch2,'result'=>$result)),
                 array(
                     'id'=>'saveSearchFav',
                     'dataType'=>'json',
                     'type'=>'post',
					 'beforeSend'=>'js:function(data){
					      $("#saveSearchFav").button("loading");
						}',
					'complete'=>'function(data) {
					    
					   
					}',
                     'success'=>'function(data) {
								
					           $("#saveSearchFav").button("reset");
					     if (data.url){
							     document.location.href=data.url;
                               } else if (data.status=="ok"){
                                 $("#saveSearchFav").addClass("btn-orange"); 
                                 $("#heartFavSearch").removeClass("btn-gris").addClass("btn-orange"); 
								 $("#masheartFavSearch").removeClass("btn-gris").addClass("btn-orange"); 
                               } else  if(data.status=="no"){
                                     $("#saveSearchFav").removeClass("btn-orange");
                                     $("#heartFavSearch").removeClass("btn-orange").addClass("btn-gris"); 
									 $("#masheartFavSearch").removeClass("btn-orange").addClass("btn-gris"); 
                               }   
							   
								
                               
                           }',                    
                     ),array('id'=>'saveSearchFav','class'=>'noDisplay')); ?>

          
<i id="masheartFavSearch" class="fa fa-plus <?php echo ($modelFavSearchId)?"btn-orangecolor":""; ?>"  ></i>           
<i id="heartFavSearch" class="icon-emptystar <?php echo ($modelFavSearchId)?"btn-orangecolor":""; ?>"  ></i>&nbsp;</span>
   
                 
                  </div>  
    </div> 
    
 </form>
</div>
<br>

<?php 
      //'search_jobs' 
 $mobile=true;
if (Yii::app()->session['app'] || Yii::app()->session['mobile'] || $mobile){	
 
	
	$this->widget('zii.widgets.CListView', array(
    'id' => 'OfertasSearchList',
    'dataProvider' => $dataOfertas,
    'itemView' => '_viewOfertas',
   'summaryText'=>'',

	 //'template' => '{items} {pager}',
	//'htmlOptions' => array('class' => ''),
	'viewData'=>array('vistas'=>$vistas),
    'pager' => array(
        'class' => 'ext.infiniteScroll.IasPager',
        'rowSelector'=>'.view',
        'listViewId' => 'OfertasSearchList',
        'header' => '',
        'loaderText'=>'<img src="/images/ajax-loader.gif">',
       // 'options' => array('history' => false, 'triggerPageTreshold' => 1, 'trigger'=>'Load more'),
    ),
	'afterAjaxUpdate'=>"function(id, data) {
	                $.ias({
                        'history': false,
                        'triggerPageTreshold': 1,
                        'trigger': 'Load more',
                        'container': '#OfertasSearchList',
                        'item': '.view',
                        'pagination': '#OfertasSearchList .pager',
                        'next': '#OfertasSearchList .next:not(.disabled):not(.hidden) a',
                        'loader': 'Loading...'
                    });
     }",
 )); 
	 
}else{
 
	$this->widget('zii.widgets.CListView', array(
					'ajaxUpdate'=>true,
	                'dataProvider'=>$dataOfertas,  
			        'itemView'=>'_viewOfertas',
					 'id'=>'ofertas_search',
					 'enablePagination'=> true,
                    'viewData'=>array('vistas'=>$vistas),
					'pager'=>array('cssFile'=>false, 'class'=>'CLinkPager',
						 'maxButtonCount'=>2,
						), 
					 
    
		)); 
	

 }

	 	 
?>
 </div>       

<script>


$(document).ready(function(){
    $( "li" ).removeClass( "select2-search-field" );
	$( "#srch1" ).keyup(function() {
		quitarCorazon();
		if ($('#srch1').val()!=""){
		 $('#limpiarbt').removeAttr("disabled", "disabled");
		}
		todoEnBlanco();
	});
	$( "#srch2" ).keyup(function() {
		quitarCorazon();
		if ($('#srch2').val()!=""){
		$('#limpiarbt').removeAttr("disabled", "disabled");
		}
		todoEnBlanco();
	});
	function todoEnBlanco(){
		if ($('#srch1old').val()=="" && $('#srch2old').val()==""){
		  $('#saveSearchFav2').attr("disabled", "disabled");
		  $('#masheartFavSearch').removeClass( "btn-orangecolor" ); 
		  $('#heartFavSearch').removeClass( "btn-orangecolor" ); 
		  $('#limpiarbt').attr("disabled", "disabled"); 
		}
		if ($('#srch1old').val()==""){
			if ($('#saveSearchFav2')) $('#saveSearchFav2').attr("disabled", "disabled");
			$('#heartFavSearch').removeClass( "btn-orangecolor" ); 
			$('#masheartFavSearch').removeClass( "btn-orangecolor" ); 
		}
		
		
		
		
		quitarCorazon();
	}
	function quitarCorazon(){
	    if ("<?php echo $modelFavSearchId;?>"!=""){
			 if ($('#saveSearchFav')) $('#saveSearchFav').attr("disabled", "disabled");
			 $('#heartFavSearch').addClass( "btn-orangecolor" );
			 $('#masheartFavSearch').addClass( "btn-orangecolor" );
		}else {
			 if ($('#saveSearchFav')) $('#saveSearchFav').removeAttr("disabled", "disabled");
			 $('#heartFavSearch').removeClass( "btn-orangecolor" ); 
			 $('#masheartFavSearch').removeClass( "btn-orangecolor" ); 
		}
		if ($('#srch2old').val()=="" &&  $('#srch1old').val()==""){
			if ($('#saveSearchFav')) $('#saveSearchFav').removeAttr("disabled", "disabled");
			 
		}
		if ($('#srch1old').val()==""){
			if ($('#saveSearchFav')) $('#saveSearchFav').attr("disabled", "disabled");
			$('#heartFavSearch').removeClass( "btn-orangecolor" ); 
			$('#masheartFavSearch').removeClass( "btn-orangecolor" ); 
		}
		 if ($('#limpiarbt')) $('#limpiarbt').attr("disabled", "disabled");
	}

	$( "#buscarbt" ).click(function() {
		$( "#yw0" ).hide();
		$( "#formsearch" ).submit();
	});
	$( "#limpiarbt" ).click(function() {
			$( "#yw0" ).hide()
			$('#formsearch').trigger("reset");
			$('#srch1old').val("");
			$('#srch2old').val("");
			$( "#formsearch" ).submit();
	});

	$(document).keypress(function(e) {
		if(e.which == 13) {
			// $( "#formsearch" ).submit();
			 $("#buscarbt").click();
		}
	});
	todoEnBlanco();
});

</script>
<?php
//echo $modelFavSearchId;
//echo $id_favserv;
?>