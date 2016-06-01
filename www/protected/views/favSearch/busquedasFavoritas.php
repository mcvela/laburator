<?php
/* @var $this FavSearchController */
/* @var $dataProvider CActiveDataProvider */
$this->metaDescription = Yii::t('strings','description_main');
$this->metaKeywords =Yii::t('strings','keywords_main');
$this->pageTitle=Yii::t('strings','title_favsearch');
$this->breadcrumbs=array(
	'Fav Searches',
);

?>

<h1><?php echo Yii::t('strings','title_favsearch');?></h1>

<?php 

$this->widget('zii.widgets.CListView', array(
    'id' => 'OfertasList',
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
    'template' => '{items} {pager}',
	'htmlOptions' => array('class' => ''),
	//'viewData'=>array('vistas'=>$vistas),
    'pager' => array(
        'class' => 'ext.infiniteScroll.IasPager',
        'rowSelector'=>'.view',
        'listViewId' => 'OfertasList',
        'header' => '',
        'loaderText'=>'<img src="/images/ajax-loader.gif">'
        //'options' => array('history' => false, 'triggerPageTreshold' => 1, 'trigger'=>'Load more'),
    ),
	)); 
 
?>

<style>
.list-view{
 background-color:transparent;
 color:black;
}
</style>
<script>

function clickCheck(id,boton){
    $("#checkbt"+id).button("loading");
	$("#favServPanel"+id).load( "/favSearch/check?id_favserv="+id, function( response, status, xhr ) {
	   $("#checkbt"+id).button("reset");
	  if ( status == "error" ) {
		var msg = "Sorry but there was an error: ";
		$( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
	  }
	});

}

function clickDeleteCheck(id){
 
$.ajax({ // ajax call starts
      url: 'favSearch/update',
      data: 'delete=true&idborrar=' + id, // Send value of the clicked button
      dataType: 'json', // Choosing a JSON datatype
	  beforeSend: function() {
        $("#deleteButton"+id).button("loading");
      },
      success: function(data) // Variable data contains the data we get from serverside
      {
							
							   if (data.url){
							      document.location.href=data.url;
					          }else if (data.status=="ok"){
                                   $("#favServPanel"+id).hide();
                               }else{
							        
                              } 
      },
	  complete: function() {
         $("#deleteButton"+id).button('reset');
	  }
    });

}
</script>