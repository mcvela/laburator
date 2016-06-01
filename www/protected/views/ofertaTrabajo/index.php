<?php
/* @var $this OfertaTrabajoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Oferta Trabajos',
);
/*
$this->menu=array(
	array('label'=>'Create OfertaTrabajo', 'url'=>array('create')),
	array('label'=>'Manage OfertaTrabajo', 'url'=>array('admin')),
);
 * 
 */
?>

<?php /*$this->widget('bootstrap.widgets.TbGridView', array(
	'dataProvider'=>$dataProvider,//->search(),
	//'filter' => $dataProvider,
        'template' => "{items}",
        'columns' => array(
             array(
                 'name' => 'id',
                 'header' => '#',
                 'htmlOptions' => array('color' =>'width: 60px'),
             ),
             array(
                 'name' => 'nombre_oferta',
                 'header' => 'Oferta',
             ),
             array(
                 'name' => 'tmp_jornada',
                 'header' => 'Jornada',
             ),
             array(
                 'name' => 'tmp_salario',
                 'header' => 'Salario',
             ),
         ),
)); */?>

<h1><center><?php echo $dataProvider->totalItemCount  ?> Ofertas </center></h1>
<?php 
/*
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 
*/
 <style>
 
.row-no-padding {
[class*="col-"] {
padding-left: 0 !important;
padding-right: 0 !important;
}
}
.row-offset-0 {
margin-left: 0;
margin-right: 0;
}
.row-offset-0 > * {
padding-left: 0;
padding-right: 0;
}
.visto a{
color:#C6C6C6;/*darkgray;*/
}
.visto{
color:#C6C6C6;/*darkgray;*/
}
 
 </style>

 $this->widget('zii.widgets.CListView', array(
    'id' => 'OfertasList',
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
    'template' => '{items} {pager}',
    'pager' => array(
        'class' => 'ext.infiniteScroll.IasPager',
        'rowSelector'=>'.view',
        'listViewId' => 'OfertasList',
        'header' => '',
        'loaderText'=>'Loading...',
        //'options' => array('history' => false, 'triggerPageTreshold' => 1, 'trigger'=>'Load more'),
    ),
)); 
 

?>

 
