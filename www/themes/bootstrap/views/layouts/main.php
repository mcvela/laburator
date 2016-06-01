<?php
//////////////////////////////////////// LAYOUT PRINCIPAL
header('Content-Type: text/html; charset=utf-8');
function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}

if (Yii::app()->session['vertodo']==null){
    //redirect('http://landing.laburator.com/');
	Yii::app()->session['vertodo']="ok";
 }
 //// Revisar si estas en el movil
/*
if (array_key_exists('HTTP_X_REQUESTED_WITH', $_SERVER)) {
	  Yii::app()->session['app'] = $_SERVER['HTTP_X_REQUESTED_WITH'];  
	}else{
	  Yii::app()->session['app'] =null;
} 
*/
 
 

$activarMenu="";
  

// setup versions
$bootstrapVersion = "3.3.1";//"3.1.1";//"3.0.0";
$fontAwesomeVersion = "3.2.1";
$jqueryVersion = "2.0.3";
$queryUiVersion = "1.10.3";

// setup scriptmap for jquery and jquery-ui cdn

//$cs = Yii::app()->clientScript;

//$cs->scriptMap["jquery.js"] = "//ajax.googleapis.com/ajax/libs/jquery/$jqueryVersion/jquery.min.js";
//$cs->scriptMap["jquery.js"] = "/assets_design/js/all.min.js";

/*$cs->scriptMap["jquery.min.js"] = $cs->scriptMap["jquery.js"];
$cs->scriptMap["jquery-ui.min.js"] = "//ajax.googleapis.com/ajax/libs/jqueryui/$queryUiVersion/jquery-ui.min.js";
*/
// fix jquery.ba-bbq.js for jquery 1.9+ (removed $.browser)
// https://github.com/joshlangner/jquery-bbq/blob/master/jquery.ba-bbq.min.js
//$cs->scriptMap["jquery.ba-bbq.js"] = Yii::app()->theme->baseUrl . "/assets/js/jquery.ba-bbq.min.js";

// register js files
//$cs->registerCoreScript('jquery');
/*
$cs->registerScriptFile("//netdna.bootstrapcdn.com/bootstrap/$bootstrapVersion/js/bootstrap.min.js", CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->theme->baseUrl . "/assets/js/main.js", CClientScript::POS_END);
*/
 
//$cs->registerScriptFile("/assets_design/js/all.min.js", CClientScript::POS_END);
 
if (Yii::app()->session['photourl']==null){
    try{
		$modelProfile=TblProfiles::model()->findByPk( Yii::app()->user->id);
		Yii::app()->session['photourl']=($modelProfile) ? $modelProfile->photourl:"";
	}catch(Exception $e){
	
	}
 }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Laburator.com">
	
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />
	
	<!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="assets_design/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets_design/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets_design/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets_design/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets_design/ico/apple-touch-icon-57-precomposed.png">

<?php
echo $this->renderPartial('//layouts/_all_min_css');
?>
<script type="text/javascript">
<?php

try{ 
	$detect = Yii::app()->mobileDetect;
	$finImagenMovil=($detect->isMobile())? "_opt":"";
	Yii::app()->session['mobile']=($detect->isMobile())? true:false;
	// call methods
	//$directorioImagenes="https://c7e74b653c10a83aeef66ff25912c74428e1afa3.googledrive.com/host/0B6nN-R7SpIspfk1TZERLeXRoVFBndi02UmkyQjYyd0laemlwZjZDY0xsM2I0MTFObVh1TFk/img/";
	$directorioImagenes="/assets_design/img/backgrounds/";
	if (Yii::app()->request->requestUri!="/?lang=en" && Yii::app()->request->requestUri!="/?lang=es" && Yii::app()->request->requestUri!="/" && Yii::app()->request->requestUri!="/".Yii::t('strings','url_menu_about') && Yii::app()->request->requestUri!="/".Yii::t('strings','url_menu_contact')){
	   echo 'var imagenesFondo=[];';//"'.$directorioImagenes.'5'.$finImagenMovil.'.jpg"];';
	}else{
	   echo 'var imagenesFondo=["'.$directorioImagenes.'4'.$finImagenMovil.'.jpg","'.$directorioImagenes.'5'.$finImagenMovil.'.jpg","'.$directorioImagenes.'6'.$finImagenMovil.'.jpg"];';
	}
}catch(Exception $e){
 
 }

 echo "var respuestaContact='".Yii::t('strings','landing_alguna_duda_respuesta')."';";
 /*
	  var jQl={q:[],dq:[],gs:[],ready:function(a){"function"==typeof a&&jQl.q.push(a);return jQl},getScript:function(a,c){jQl.gs.push([a,c])},unq:function(){for(var a=0;a<jQl.q.length;a++)jQl.q[a]();jQl.q=[]},ungs:function(){for(var a=0;a<jQl.gs.length;a++)jQuery.getScript(jQl.gs[a][0],jQl.gs[a][1]);jQl.gs=[]},bId:null,boot:function(a){"undefined"==typeof window.jQuery.fn?jQl.bId||(jQl.bId=setInterval(function(){jQl.boot(a)},25)):(jQl.bId&&clearInterval(jQl.bId),jQl.bId=0,jQl.unqjQdep(),jQl.ungs(),jQuery(jQl.unq()), "function"==typeof a&&a())},booted:function(){return 0===jQl.bId},loadjQ:function(a,c){setTimeout(function(){var b=document.createElement("script");b.src=a;document.getElementsByTagName("head")[0].appendChild(b)},1);jQl.boot(c)},loadjQdep:function(a){jQl.loadxhr(a,jQl.qdep)},qdep:function(a){a&&("undefined"!==typeof window.jQuery.fn&&!jQl.dq.length?jQl.rs(a):jQl.dq.push(a))},unqjQdep:function(){if("undefined"==typeof window.jQuery.fn)setTimeout(jQl.unqjQdep,50);else{for(var a=0;a<jQl.dq.length;a++)jQl.rs(jQl.dq[a]); jQl.dq=[]}},rs:function(a){var c=document.createElement("script");document.getElementsByTagName("head")[0].appendChild(c);c.text=a},loadxhr:function(a,c){var b;b=jQl.getxo();b.onreadystatechange=function(){4!=b.readyState||200!=b.status||c(b.responseText,a)};try{b.open("GET",a,!0),b.send("")}catch(d){}},getxo:function(){var a=!1;try{a=new XMLHttpRequest}catch(c){for(var b=["MSXML2.XMLHTTP.5.0","MSXML2.XMLHTTP.4.0","MSXML2.XMLHTTP.3.0","MSXML2.XMLHTTP","Microsoft.XMLHTTP"],d=0;d<b.length;++d){try{a= new ActiveXObject(b[d])}catch(e){continue}break}}finally{return a}}};if("undefined"==typeof window.jQuery){var $=jQl.ready,jQuery=$;$.getScript=jQl.getScript};
	  jQl.loadjQ('/assets_design/js/all.js');
	  $(function(){
	 alert('jquery');
	  });
	  */
?>

var baseUrl = "<?php echo Yii::app()->baseUrl; ?>";</script>

<?php //echo $this->renderPartial('//layouts/_all_min_js');?>

<?php
	//script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	//script src="/assets_design/js/all_main.js"></script>
	//script  src="/assets_design/js/all.js"></script>
	//echo $this->renderPartial('//layouts/_all_min_js');
	 
	try{
		Yii::app()->clientScript->registerMetaTag($this->getMetaDescription(), 'description');
		Yii::app()->clientScript->registerMetaTag($this->getMetaKeywords(), 'keywords');
		 
	}catch(Exception $e){

	}
?>	
<link href="/css/font-awesome.min.css" rel="stylesheet">
<link href="/css/whhg.css" rel="stylesheet">
 
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body> 

<?php
//echo "<br><br><br>".Yii::app()->request->requestUri;
 if (Yii::app()->session['vertodo']!=null){  

	if (Yii::app()->request->getParam('m')){
	  Yii::app()->session['app'] = (Yii::app()->request->getParam('m')=="true")? true: null;
	   
	 }else{
	 Yii::app()->session['app'] = null;
	 }
?>
<div class="wrapper">
       <?php 
	   /// Mirar si es version para el app 
	   
	   if ( Yii::app()->session['app']==null || Yii::app()->session['app']==false){  ?> 
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="headLB" style="display: block;">
         <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header navbar-header text-left"><a  href="/"><img src="/images/lb.png" alt="Laburator.com"  height="40px" width="143px" title="Laburator.com"> <?php //echo Yii::app()->name; ?></a> <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <!-- Main nav -->
                <?php 
								$urlbuscarofertastrabajos = Yii::app()->getBaseUrl(true) ."/".Yii::t('strings','url_menu_urlbuscarofertastrabajos'); 
								$urlreina = Yii::app()->getBaseUrl(true) ."/".Yii::t('strings','url_menu_reina'); 
								$urlabout = Yii::app()->getBaseUrl(true) ."/".Yii::t('strings','url_menu_about'); 
								$urlcontact = Yii::app()->getBaseUrl(true) ."/".Yii::t('strings','url_menu_contact'); 
								$urlregister = Yii::app()->getBaseUrl(true) ."/".Yii::t('strings','url_menu_register'); 
								$urllogin = Yii::app()->getBaseUrl(true) ."/".Yii::t('strings','url_menu_login'); 
								
                                 
                                //////////// Gestion info y contacto   
                                $activarMenu="";

                                $clickContact="document.location.href='".$urlcontact."#link_dudas';";
                                $clickInfo="document.location.href='".$urlabout."#link_features';";
                                if (Yii::app()->request->requestUri=="/".Yii::t('strings','url_menu_contact') || Yii::app()->request->requestUri=="/".Yii::t('strings','url_menu_about')){
                                    $clickInfo="";
                                    $clickContact="";
                                }
                                 if (Yii::app()->request->requestUri=="/".Yii::t('strings','url_menu_contact')){

                                      $activarMenu= "$('#yw3 li').eq(2).click();";
                                 }else if (Yii::app()->request->requestUri=="/".Yii::t('strings','url_menu_about')){

                                      $activarMenu= "$('#yw3 li').eq(1).click();";
                                 }
                                
                                
				$this->widget('zii.widgets.CMenu',array(
				     'encodeLabel'=>false,
                    'htmlOptions'=>array('class'=>'nav navbar-nav '),
                    'items'=>array(
                       //  array('label'=>'<i class="glyphicon glyphicon-search"></i>'.'&nbsp; '.Yii::t('strings','menu_trabajos'), 'url'=>$urlbuscarofertastrabajos),
                       //  array('label'=>Yii::t('strings','menu_reina'), 'url'=>$urlreina),
                       //  array('label'=>Yii::t('strings','menu_about'), 'url'=>$urlabout),
                       //  array('label'=>Yii::t('strings','menu_contact'), 'url'=>$urlcontact),
						
                    ),
					 
                )); 
				
/*
			        <div class="nav  navbar-nav navbar-middle" style="width:35%;background-color:transparent;align:center">
					<form class="navbar-form" action="/search" role="search">
					<div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="srch" id="srch" value="<?php echo Yii::app()->getRequest()->getQuery('srch')?>">
						<div class="input-group-btn">
							<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
						</div>
					</div>
					</form>
					</div>
	*/				

// <!-- Right nav -->
		 //$urlActual=Yii::app()->controller->getId().'/'.Yii::app()->controller->getAction()->getId();
		 $urlActual=Yii::app()->baseUrl;
                 
                
                      
                       $this->widget('zii.widgets.CMenu',array(
                            
                           'htmlOptions'=>array('class'=>'nav navbar-nav '),
                                               'encodeLabel' => false,
                           'items'=>array(
                                                   // array('label'=>"<br>".$linksLanguage),

                               //array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>BsHtml::icon(BsHtml::GLYPHICON_USER).'&nbsp; '.Yii::t('strings','menu_sign_up'), 'visible'=>Yii::app()->user->isGuest),
                               //array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>BsHtml::icon(BsHtml::GLYPHICON_USER).'&nbsp; '.Yii::t('strings','menu_login'), 'visible'=>Yii::app()->user->isGuest),
                               //array('label'=>'<i class="glyphicon glyphicon-search"></i>', 'url'=>$urlbuscarofertastrabajos),
                               //array('label'=>'<i class="glyphicon glyphicon-search"></i>', 'url'=>'#features'),
                                array('label'=>'<i class="icon-briefcase" data-toggle="tooltip" data-placement="bottom" title="'.Yii::t('strings','tooltip_urlbuscarofertastrabajos').'"></i>', 'url'=>$urlbuscarofertastrabajos,'active'=>(Yii::app()->request->requestUri=='/buscar-trabajo' || Yii::app()->request->requestUri=='/search')),
                                array( 'url' => '/favSearch',
                                                   'visible'=>!Yii::app()->user->isGuest,
                                                   'label' => '<i class="icon-favoritefolder"  data-toggle="tooltip" data-placement="bottom" title="'.Yii::t('strings','tooltip_favoritefolder').'"></i>&nbsp;', 'active'=>(Yii::app()->request->requestUri=='/favSearch')),
                          
                               
                                array('url'=>$urlabout.'#','linkOptions' => array(
                                     'onclick'=>$clickInfo."$('#link_features').trigger('click');return false;"),
                                     'visible'=>Yii::app()->user->isGuest,'label'=>'<i class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="bottom" title="'.Yii::t('strings','tooltip_about').'"></i>','active'=>(Yii::app()->request->requestUri=="/".Yii::t('strings','url_menu_about').'#link_features')),
                                array('url'=>$urlcontact,'linkOptions' => array(
                                     'onclick'=>$clickContact."$('#link_dudas').trigger('click');return false;"),
                                     'visible'=>Yii::app()->user->isGuest,'label'=>'<i class="glyphicon glyphicon-envelope" data-toggle="tooltip" data-placement="bottom" title="'.Yii::t('strings','tooltip_contact').'"></i>', 'active'=>(Yii::app()->request->requestUri=="/".Yii::t('strings','url_menu_contact').'#link_dudas')),

                                array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>'<i class="icon-avataralt" data-toggle="tooltip" data-placement="bottom" title="'.Yii::t('strings','tooltip_login').'"></i>',
                                     'visible'=>Yii::app()->user->isGuest, 'active'=>(Yii::app()->request->requestUri=='/entrar')),
                             
                                               //array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>BsHtml::icon(BsHtml::GLYPHICON_USER).'&nbsp; '.Yii::app()->getModule('user')->t("Profile"), 'visible'=>!Yii::app()->user->isGuest),
                                               //array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>BsHtml::icon(BsHtml::GLYPHICON_LOG_OUT).'&nbsp; '.Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')', 'visible'=>!Yii::app()->user->isGuest),
                                               //array('url'=>$urlreina, 'label'=>Yii::t('strings','menu_reina'),'visible'=>!Yii::app()->user->isGuest ),

                               // array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                               // array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)

                               ///// USUARIO ///
                               array( 'url' => '/user/profile',
                                                   'visible'=>!Yii::app()->user->isGuest,
                                                   'label' => (Yii::app()->session['photourl']!="")? '<img src="'.Yii::app()->session['photourl'].'" style="height:30px" class="img-circle" title="'.Yii::app()->user->name.'" data-toggle="tooltip" data-placement="bottom" >':'<i class="icon-avataralt" title="'.Yii::app()->user->name.'" data-toggle="tooltip" data-placement="bottom" title="'.Yii::t('strings','tooltip_loginok').'"></i>',
                                                   'active'=> Yii::app()->request->requestUri=="/user/profile",
										   
                             /*  'url' => '#',
                               'linkOptions'=> array(
                                   'class' => 'dropdown-toggle',
                                   'data-toggle' => 'dropdown',
                                   ),
                               'itemOptions' => array('class'=>'dropdown user'),
                               'items' => array(
                                   array(
                                       'label' => '<i class="icon-user"></i>&nbsp;'.Yii::t('strings','menu_my_profile'),
                                       'url' => '/user/profile',
                                   ), 
                                   array(
                                       'label' => '<hr>',
                                       array(
                                           'class' => 'divider',
                                       )
                                   ),
                                   array(
                                       'label' => '<i class="icon-key"></i>&nbsp;'.Yii::t('strings','menu_logout'),
                                       'url' => Yii::app()->getModule('user')->logoutUrl,
                                   ),
                               )*/
                           ),
                               ///// FIN USUARIO
							   ///// USUARIO admin///				   
								array( 'url' => '/tripasAdmin',
                                                   'visible'=>(Yii::app()->getModule('user')->isAdmin()==1),
                                                   'label' => '<i class="icon-websitebuilder" data-toggle="tooltip" data-placement="bottom" title="'.Yii::t('strings','tooltip_admin').'"></i>',
                                                   'active'=> Yii::app()->request->requestUri=="/tripasAdmin",	),
												   
                               /// IDIOMAS
                               /**/
                               array(
							   //'visible'=>!Yii::app()->user->isGuest,
                               'label' => '<img src="/images/flags/'.Yii::app()->language.'.gif">&nbsp;<i class="icon-chevron-down"></i>',
                               'url' => '#',
                               'linkOptions'=> array(
                                   'class' => 'dropdown-toggle',
                                   'data-toggle' => 'dropdown',
                                   ),
                               'itemOptions' => array('class'=>'dropdown user'),
                               'items' => array(
                                                                       array(
                                                                               'label' => '<img src="/images/flags/es.gif">&nbsp;'.Yii::t('strings','language_es'),
                                                                               'url' => $urlActual.'?lang=es', 'visible'=>(Yii::app()->language!='es')
                                                                       ),
                                                                       array(
                                                                               'label' =>  '<img src="/images/flags/us.gif">&nbsp;'.Yii::t('strings','language_en'),
                                                                               'url' => $urlActual.'?lang=en', 'visible'=>(Yii::app()->language!='en')
                                                                       ) 
                                                               )
                                                       ),
                               
                               ///// FIN IDIOMAS
                           ),
                                               'encodeLabel' => false,
                                               'htmlOptions' => array(
                                                       'class'=>'nav navbar-nav navbar-right',
                                                               ),
                                               'submenuHtmlOptions' => array(
                                                       'class' => 'dropdown-menu',
                                               )
                       ));
                      
                  
                ?>
				
				<?php $this->widget('zii.widgets.CMenu', array(
                
            ));?>

                
            </div><!-- /.navbar-collapse -->
			 </div>
        </nav>
		 
<?php }//if ($this->pageTitle   ?>
<?php if ( !Yii::app()->session['app']){    echo "<div class='headMain'>&nbsp;</div>";} ?>
<div class="container">
		<div id="main-content"> 
			<?php if (!$this->menu): ?>
				<div class="row">
                    <div class="col-lg-12">
                        <?php echo $content; ?>
                    </div>
                </div>
            <?php else: ?>
                <div class="row">
                    <div class="col-lg-10">
                        <?php echo $content; ?>
                    </div>
                    <div class="col-lg-2">
                        <div class="panel panel-info">
                            <div class="panel-heading">Operations</div>
                                <?php
                                $this->widget('zii.widgets.CMenu', array(
                                    'items'=>$this->menu,
                                    'htmlOptions'=>array('class'=>'nav nav-pills nav-stacked'),
                                ));
                                ?>
                        </div>
                    </div>
                </div>

            <?php endif; ?>


</div> <!-- /#main-content -->
<div class="push"></div>
</div> <!-- /.container -->
</div><!-- /.wrapper -->
<?php 
	   /// Mirar si es version para el app 
	   
	   if ( Yii::app()->session['app']==null || Yii::app()->session['app']==false){  ?>
		<div class="container">
		<footer>
		 <?php /* if(isset($this->breadcrumbs)):?>
						<?php $this->widget('bootstrap.widgets.BsBreadcrumb', array(
							'links'=>$this->breadcrumbs,
						)); ?><!-- breadcrumbs -->
		 <?php endif
                  */?>
             <style>
.icon-circlefacebook{
   height:30px
}
.menutop:hover{
  color:orange;
}
.menutop{
  color:white;
}
.facebookLB:hover{
  color:#3B5998;
}
.facebookLB{
  color:white;
}
</style>			 
			<table class="width100"><tr>
                    <td class="text-center"><a  class="menutop" href="/conditions" ><?php echo Yii::t('strings','menu_condiciones');?></a></td>			
					<td class="text-center">
						 2015 &copy; Laburator.com,  <?php echo Yii::t('strings','copyright');?> <br/>
					</td>
					<td class="text-center"> 
					<a class="btn btn-xs " href="https://www.facebook.com/pages/Laburator/844028268981057" style="color:#3B5998;" target="facebook Laburator"><i class="fa fa-facebook-official fa-2x facebookLB"></i></a>
            <?php
			if (Yii::app()->session['app']) echo Yii::app()->urlManager->getLanguageDropDown();
			/////////////////// REVISAR SI ES MOVIL, PARA PONER BOTONES
			try{
				//$detect = Yii::app()->mobileDetect;
				//$detect->isAndroidOS() && 
				if ( Yii::app()->session['app']==null){
				  // echo "<img src='/images/Android-market-icon.png' width='120px'>";
				}else if (Yii::app()->session['app']!=null){
				   echo " ";
				}else{
				   //echo "<img src='/images/Android-market-icon.png' width='120px'>";
				}
			}catch (Exception $e){
			  //echo "error mobile";
			}
			/**/
			?></td></table>
		  </footer>
		 </div> <!-- /#container -->
		 
<?php }//	   if ( Yii::app()->session['app']==null || Yii::app()->session['app']==false){ ?>		 
		 
<?php }// if (Yii::app()->session['vertodo']){ ?>		 

<?php
		if(isset($conf['google_analytics']) && $conf['google_analytics']!='') {
		    //<!-- Google Analytics -->
?>
		<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		ga('create', '<?php echo $conf['google_analytics'] ?>', 'auto');
		ga('send', 'pageview');
		</script>
<?php
		} //if(isset($conf['google_analytics']) && $conf['google_analytics']!='') {
?>

<?php if (Yii::app()->request->requestUri=="/?lang=es" || Yii::app()->request->requestUri=="/?lang=en" || Yii::app()->request->requestUri=="/" || Yii::app()->request->requestUri=="/".Yii::t('strings','url_menu_about') || Yii::app()->request->requestUri=="/".Yii::t('strings','url_menu_contact')){?>

<script src="/assets_design/js/all.min_BIG_sin_all.js"></script>

<script src="/assets_design/js/jquery.backstretch.js"></script>
<script src="/assets_design/js/jquery.countdown.js"></script>
<script src="/assets_design/js/wow.js"></script>
<script src="/assets_design/js/scripts.js"></script>
<?php } ?>

<!-- CSS -->
<?php 
//echo $this->renderPartial('//layouts/_all_min_css');
// <link rel="stylesheet" href="/assets_design/css/all.xx.min.css">
 ?>
 
<script>



<?php
/*
// script async src="/assets_design/js/all.min_BIG.js"></script>

$('.navbar-right').click(function() {
    //$('.navbar-right li.active').removeClass('active');
    //$('.navbar-right li').addClass('active');
    $(this).addClass('active').siblings().removeClass('active');
});
*/
?>
$(document).ready(function(){
		$('#yw3 li').click(function(e){
			// remove all active classes
			$('#yw3 li').removeClass('active');
			// add active class to clicked item
			$(this).addClass('active');
		});
		// click on the first item on page load
	  <?php echo $activarMenu; ?>

	$('.loadingSFinBoton').on('click', function() {
	   var $this = $(this);
	  if (!$this.is(":disabled")){
		  $this.button('loading');
			 
		}
	});

	$('.loadingBoton').on('click', function() {
	   var $this = $(this);
	  if (!$this.is(":disabled")){
			
			$this.button('loading');
			setTimeout(function() {
				$this.button('reset');
			}, 2000);
		}
	});

});
</script>
<?php 
  echo $this->renderPartial('//layouts/_all_min_js');
 
 ?>
<?php 
//echo Yii::app()->request->requestUri;
?>
</body>
</html>
