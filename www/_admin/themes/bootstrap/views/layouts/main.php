<?php

// setup versions
$bootstrapVersion = "3.1.1";//"3.0.0";
$fontAwesomeVersion = "3.2.1";
$jqueryVersion = "2.0.3";
$queryUiVersion = "1.10.3";

// setup scriptmap for jquery and jquery-ui cdn
$cs = Yii::app()->clientScript;
$cs->scriptMap["jquery.js"] = "//ajax.googleapis.com/ajax/libs/jquery/$jqueryVersion/jquery.min.js";
$cs->scriptMap["jquery.min.js"] = $cs->scriptMap["jquery.js"];
$cs->scriptMap["jquery-ui.min.js"] = "//ajax.googleapis.com/ajax/libs/jqueryui/$queryUiVersion/jquery-ui.min.js";

// fix jquery.ba-bbq.js for jquery 1.9+ (removed $.browser)
// https://github.com/joshlangner/jquery-bbq/blob/master/jquery.ba-bbq.min.js
$cs->scriptMap["jquery.ba-bbq.js"] = Yii::app()->theme->baseUrl . "/assets/js/jquery.ba-bbq.min.js";

// register js files
$cs->registerCoreScript('jquery');
$cs->registerScriptFile("//netdna.bootstrapcdn.com/bootstrap/$bootstrapVersion/js/bootstrap.min.js", CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->theme->baseUrl . "/assets/js/main.js", CClientScript::POS_END);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	
	<meta http-equiv="cache-control" content="max-age=0" />
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="expires" content="0" />
	<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
	<meta http-equiv="pragma" content="no-cache" />
	
	
		
	
	
    <!-- CSS -->
    <link href="<?php echo Yii::app()->baseUrl; ?>/css/bootstrap.min.<?php echo $bootstrapVersion; ?>.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->baseUrl; ?>/css/font-awesome.min.<?php echo $fontAwesomeVersion; ?>.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo Yii::app()->theme->baseUrl . "/assets/js/html5shiv.js"; ?>"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl . "/assets/js/respond.min.js"; ?>"></script>
    <![endif]-->

    <!-- Javascript -->
    <script>var baseUrl = "<?php echo Yii::app()->baseUrl; ?>";</script>

	<style>
	* {
    margin: 0;
}
html, body {
    height: 100%;
}
.wrapper {
    min-height: 100%;
    height: auto !important;
    height: 100%;
    margin: 0 auto -120px; /* the bottom margin is the negative value of the footer's height */
}
.footer, .push {
    height: 120px; /* .push must be the same height as .footer */
}
	</style>
	
	
	
	
    <!-- NOTE: Yii uses this title element for its asset manager, so keep it last -->
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<?php 
    //// Revisar si estas en el movil
/*	if (array_key_exists('HTTP_X_REQUESTED_WITH', $_SERVER)) {
	  Yii::app()->session['app'] = $_SERVER['HTTP_X_REQUESTED_WITH'];  
	}else{
	  Yii::app()->session['app'] =null;
	}
	*/
?>
<?php
if (Yii::app()->request->getParam('m')){
  Yii::app()->session['app'] = (Yii::app()->request->getParam('m')=="true")? true: null;
  echo "tienes m";
 }
?>
<div class="wrapper">
     
	 <?php 
	   /// Mirar si es version para el app 
	   
	   if ( Yii::app()->session['app']==null || Yii::app()->session['app']==false){  ?>
	    
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
         <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                <a  href="/"><img src="/images/lb.png" alt="Laburator.com"  title="Laburator.com"> <?php echo Yii::app()->name; ?></a>
             <span style="width:100px">&nbsp;&nbsp;&nbsp;&nbsp;</span>  
            </div>
             
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <!-- Main nav -->
                <?php 
				$this->widget('zii.widgets.CMenu',array(
				     'encodeLabel'=>false,
                    'htmlOptions'=>array('class'=>'nav navbar-nav '),
                    'items'=>array(
                         array('label'=>Yii::t('strings','menu_exploradoras'), 'url'=>array('/ofertatrabajo')),
                         array('label'=>Yii::t('strings','menu_reina'), 'url'=>array('/reina')),
                         array('label'=>Yii::t('strings','menu_about'), 'url'=>array('/site/about')),
                         array('label'=>Yii::t('strings','menu_contact'), 'url'=>array('/site/contact')),
						
                    ),
					 
                )); 
				
		 ?>

			
				 
                <!-- Right nav -->
                <?php 
			   $urlActual=Yii::app()->controller->getId().'/'.Yii::app()->controller->getAction()->getId();
			   $urlActual="";
				 
				$this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'nav navbar-nav navbar-right'),
					'encodeLabel' => false,
                    'items'=>array(
					    // array('label'=>"<br>".$linksLanguage),
						
					array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>BsHtml::icon(BsHtml::GLYPHICON_USER).'&nbsp; '.Yii::t('strings','menu_sign_up'), 'visible'=>Yii::app()->user->isGuest),
				        array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>BsHtml::icon(BsHtml::GLYPHICON_LOG_IN).'&nbsp; '.Yii::app()->getModule('user')->t("Login"), 'visible'=>Yii::app()->user->isGuest),
						//array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>BsHtml::icon(BsHtml::GLYPHICON_USER).'&nbsp; '.Yii::app()->getModule('user')->t("Profile"), 'visible'=>!Yii::app()->user->isGuest),
						//array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>BsHtml::icon(BsHtml::GLYPHICON_LOG_OUT).'&nbsp; '.Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')', 'visible'=>!Yii::app()->user->isGuest),
			
                        // array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                        // array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                      array(
					    'label' => '<img src="/images/flags/'.Yii::app()->language.'.gif"><i class="icon-angle-down"></i>',
                        'url' => '#',
                        'linkOptions'=> array(
                            'class' => 'dropdown-toggle',
                            'data-toggle' => 'dropdown',
                            ),
                        'itemOptions' => array('class'=>'dropdown user'),
                        'items' => array(
								array(
									'label' => '<img src="/images/flags/es.gif">',
									'url' => '/es/'.$urlActual, 'visible'=>(Yii::app()->language!='es')
								),
								array(
									'label' =>  '<img src="/images/flags/us.gif">&nbsp;'.Yii::t('strings','language_en'),
									'url' => '/en/'.$urlActual, 'visible'=>(Yii::app()->language!='en')
								),
							)
						),	
					   array(
					    'visible'=>!Yii::app()->user->isGuest,
  					    'label' => '<i class="icon-user"></i>&nbsp;<span class="username">'.Yii::app()->user->name.'</span> <i class="icon-angle-down"></i>',
                        'url' => '#',
                        'linkOptions'=> array(
                            'class' => 'dropdown-toggle',
                            'data-toggle' => 'dropdown',
                            ),
                        'itemOptions' => array('class'=>'dropdown user'),
                        'items' => array(
                            array(
                                'label' => '<i class="icon-user"></i>&nbsp;'.Yii::t('strings','menu_my_profile'),
                                'url' => Yii::app()->getModule('user')->profileUrl
                            ),
                            array(
                                'label' => '<i class="icon-calendar"></i>&nbsp;'.Yii::t('strings','menu_my_calendar'),
                                'url' => '#',
                            ),
                            array(
                                'label' => '<i class="icon-tasks"></i>&nbsp;'.Yii::t('strings','menu_my_tasks'),
                                'url' => '#',
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
                        )
                    ),
                    ),
					'encodeLabel' => false,
					'htmlOptions' => array(
						'class'=>'nav navbar-nav navbar-right',
							),
					'submenuHtmlOptions' => array(
						'class' => 'dropdown-menu',
					)
                )); ?>
				
				<?php $this->widget('zii.widgets.CMenu', array(
                
            ));?>

                
            </div><!-- /.navbar-collapse -->
			 </div>
        </nav>
		 <br><br><br>
	 <?php }//if ($this->pageTitle   ?>
  
 
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
 
        <hr>
<div class="push"></div>

    </div> <!-- /.container -->
</div><!-- /.wrapper -->
		<div class="container">
		<footer>
			
						  <?php if(isset($this->breadcrumbs)):?>
						<?php $this->widget('bootstrap.widgets.BsBreadcrumb', array(
							'links'=>$this->breadcrumbs,
						)); ?><!-- breadcrumbs -->
					<?php endif?>
			<table style="width:100%"><tr>		
					<td>
						&copy; <?php echo Yii::app()->name; ?>. All Rights Reserved.<br/>
						Profiling: <?php echo round(Yii::getLogger()->getExecutionTime(),2); ?>s / <?php echo round(Yii::getLogger()->getMemoryUsage()/1048576,2); ?>mb
					</td>
					<td style="align:center">
            <?php
			if (Yii::app()->session['app']) echo Yii::app()->urlManager->getLanguageDropDown();
			/////////////////// REVISAR SI ES MOVIL, PARA PONER BOTONES
			/*
			$detect = Yii::app()->mobileDetect;
			 
			if ($detect->isAndroidOS() && Yii::app()->session['app']==null){
			   echo "<img src='/images/Android-market-icon.png' width='120px'>";
			}else if (Yii::app()->session['app']!=null){
			   echo " ";
			}else{
			   echo "<img src='/images/Android-market-icon.png' width='120px'>";
			}
			*/
			?></td></table>
		  </footer>
		 </div> <!-- /#container -->
</body>
</html>
