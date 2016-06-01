<?php

include_once ('php/config.php');
include_once ('php/languagedetect.php');
include_once ('php/init.php');

error_reporting(E_ALL ^ E_NOTICE);  

session_start();
if( !isset($_SESSION['ref']) )
{
$r = $_SERVER['HTTP_REFERER'];
$_SESSION['ref'] = $r;
} 

function generateFormToken($form) {

	// generate a token from an unique value
	$token = md5(uniqid(microtime(), true));  
	
	// Write the generated token to the session variable to check it against the hidden field when the form is sent
	$_SESSION[$form.'_token'] = $token; 
	
	return $token;

}

// generate a new token for the $_SESSION superglobal and put them in a hidden field
$newToken = generateFormToken('form1');

?>
    
        <!-- Loader 
    	<div class="loader">
    		<div class="loader-img"></div>
    	</div>
        -->
	<style>
	.items{
	   padding-top: 0px; 
	   /*height:150px*/
	}
.visto a{
    color:darkgray;
}
.visto{
    color:darkgray;
}
	</style>
        <!-- Top content --> 
        <div class="top-content">
               
            <div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-13 subscribe section-description wow fadeIn">
                        	
							
						 	<h1 class="wow fadeInLeftBig"><?php echo Yii::t('strings','landing_head1_slogan');?></h1>
							 
                        </div>     
						<?php if ($dataOfertas->itemCount>0){ ?>
							
										 <?php 
									   
			 							

	$this->widget('zii.widgets.CListView', array(
	                'ajaxUpdate'=>true,
				    'dataProvider'=>$dataOfertas,  
			        'itemView'=>'_viewOfertas',
					'id'=>'ofertas_landing',
                    'pager'=>array('cssFile'=>false, 
					       'class'=>'CLinkPager',
					       'maxButtonCount'=>2
					),
		)); 											
										 	?>
								 
						<?php  } // if ($dataOfertas->itemCount>0){ ?>
                                
			  
				 		   
						   <!--- suscripcion -->
                       <?php   
                        /*	 ?>				   <form class="form-inline" role="form" action="assets_design/subscribe.php" method="post" id="subscribe">
	                    	<div class="form-group">
							    <input type="hidden" name="token" value="<?php echo $newToken; ?>">
	                    		<label class="sr-only" for="subscribe-email">Email address</label>
								
	                        	<input type="text" name="email" placeholder="Tu email... " class="subscribe-email" id="subscribe-email">
	                        </div>
	                        <button type="submit" class="btn">Suscr&iacute;bete</button>
							</form>
							<div class="success-message"></div>
							<div class="error-message"></div>
							
								
								
	                    
						 if ($conf['newsletter_activated']) {	?>
							  <div class="subscribe">
					 
								<form class="form-inline" id="subscribe">
								    <div class="form-group">
										<label class="sr-only" for="subscribe-email">Email address</label>
										<input type="text" name="email" class="form-control subscribe-email" id="exampleInputEmail1" placeholder="<?php echo $lang ['your_email']; ?>" />
										<input type="hidden" name="token" value="<?php echo $newToken; ?>">
									 </div>
													 <?php   
										/*<input type="submit" class="btn btn-primary" value="<?php echo $lang['subscribe']; ?>" />*/
												/*?>
									<button type="submit" class="btn"><?php echo $lang['subscribe']; ?></button>
								</form>
							</div>
							<div id="subscribestatus" class="success-message"></div>
						<?php } */?>
						
						
                            
                        </div>
                    </div>
                    <br>
                    <div class="row"> <div class="col-md-2"><?php echo Yii::app()->request->baseUrl;?></div>
                        <div  class="col-md-4 contact-form wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;">
                            
                            <h4><?php echo Yii::t('strings','landing_buscar_ofertas');?>&nbsp;<button type="button" onclick="<?php echo "document.location.href='/".Yii::t('strings','url_menu_urlbuscarofertastrabajos')."';";?>" class="btn"> 
                                    <i class="glyphicon glyphicon-search"></i></button>
                                    </h4>
                         </div>
                       
                        <div class="col-md-6 contact-form wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;">
                                
                               <h4>     <button type="button" onclick="<?php echo "document.location.href='/".Yii::t('strings','url_menu_login')."';";?>" class="btn"><?php echo Yii::t('strings','landing_quiero_ser_lb');?> 
                                    <?php echo BsHtml::icon(BsHtml::GLYPHICON_USER); ?></button>
                                    </h4>
                           </div>
                            </div>
                    
                  
                    <div class="scroll-page wow fadeInUp">
                            	<a class="scroll-link" href="#features" id="link_features"><i class="fa fa-chevron-down"></i></a>
                            </div>
                </div>
            </div>
        
        
        <!-- Features -->
        <div class="features-container section-container">
	        <div class="container">
	            <div class="row">
	                <div class="col-sm-12 features section-description wow fadeIn">
	                    <h2><?php echo Yii::t('strings','landing_puedo_ayudarte');?></h2>
	                    <p>
	                    	<?php echo Yii::t('strings','landing_puedo_ayudarte_desc');?> 
	                    </p>
	                </div>
	            </div>
	            <div class="row">
                	<div class="col-sm-4 features-box wow fadeInUp"> 
	                	<div class="btn features-box-icon contact-form wow fadeInLeft  animated" onclick="<?php echo "document.location.href='/".Yii::t('strings','url_menu_login')."';";?>">
	                		<i class="fa fa-eye"></i>
	                	</div>
	                    <h3><?php echo Yii::t('strings','landing_puedo_ayudarte_skill1');?></h3>
	                    <p><?php echo Yii::t('strings','landing_puedo_ayudarte_skill1_des');?></p>
                    </div>
                    <div class="col-sm-4 features-box wow fadeInDown">
	                	<div class="btn features-box-icon contact-form wow fadeInLeft  animated" onclick="<?php echo "document.location.href='/".Yii::t('strings','url_menu_login')."';";?>">
	                		<i class="fa fa-hand-o-up"></i>
	                	</div>
	                    <h3><?php echo Yii::t('strings','landing_puedo_ayudarte_skill2');?></h3>
	                    <p><?php echo Yii::t('strings','landing_puedo_ayudarte_skill2_des');?></p>
                    </div>
                    <div class="col-sm-4 features-box wow fadeInUp">
	                	<div class="btn features-box-icon contact-form wow fadeInLeft  animated" onclick="<?php echo "document.location.href='/".Yii::t('strings','url_menu_login')."';";?>">
	                		<i class="fa fa-file-text-o"></i>
	                	</div>
	                    <h3><?php echo Yii::t('strings','landing_puedo_ayudarte_skill3');?></h3>
	                    <p><?php echo Yii::t('strings','landing_puedo_ayudarte_skill3_des');?></p>
                    </div>
	            </div>
	            <div class="row">
	            	<div class="col-sm-12">
	            		 
                        <div class="scroll-page">
                        	<a class="scroll-link" href="#contact" id="link_dudas"><i class="fa fa-chevron-down"></i></a>
                        </div>
	            	</div>
	            </div>
	        </div>
        </div>
<?php /*
        <!-- Testimonials -->
        <div class="testimonials-container section-container">
	        <div class="container">
	            <div class="row">
				   <div class="carousel-reviews broun-block">
    <div class="container">
        <div class="row">
		<br><br><br><br>
		 <h2>Citas</h2>
		 <!-- Carousel				================================================== -->
            <div id="carousel-reviews" class="carousel slide" data-ride="carousel">
            
                <div class="carousel-inner">
                    <div class="item active">
                	    <div class="col-sm-12">
        				    <div class="block-text rel zmin">
						        <a title="" href="#">“Si buscas resultados distintos, no hagas siempre lo mismo”</a>
							   </div>
							<div class="person-text rel">
				                <img class="img-circle" src="assets_design/img/testimonials/1.jpg" alt=""  style="opacity: 1;">
								<a href="" > Albert Einstein</a>
							</div>
						</div>
                    </div>
                    <div class="item">
                        <div class="col-sm-12">
        				    <div class="block-text rel zmin">
						        <a title="" href="#">"Si bien buscas, encontrarás" </a>
							   </div>
							<div class="person-text rel">
				                <img class="img-circle" src="assets_design/img/testimonials/2.jpg" alt=""  style="opacity: 1;">
								<a href="" > Platón</a>
							</div>
						</div>
                    </div>
					 <div class="item">
                        <div class="col-sm-12">
        				    <div class="block-text rel zmin">
						        <a title="" href="#">"Quien busca no halla, pero quien no busca es hallado" </a>
							   </div>
							<div class="person-text rel">
				                <img class="img-circle"  src="assets_design/img/testimonials/3.jpg" alt=""  style="opacity: 1;">
								<a href="" > Franz Kafka</a>
							</div>
						</div>
                    </div>
					 <div class="item">
                        <div class="col-sm-12">
        				    <div class="block-text rel zmin">
						        <a title="" href="#">"Escoge un trabajo que te guste, y nunca tendr&aacute;s que trabajar ni un sólo d&iacute;a de tu vida." </a>
							   </div>
							<div class="person-text rel">
				                <img class="img-circle" src="assets_design/img/testimonials/4.jpg" alt=""  style="opacity: 1;">
								<a href="" > Kung FuTse, Confucio</a>
							</div>
						</div>
                    </div>
                   
                                       
                </div>
                <a class="left carousel-control" href="#carousel-reviews" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-reviews" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
    </div>
</div>
				       
					
					
					<!-- End Carousel --> 
						<br><br><br><br>
	                    <div class="scroll-page">
                        	<a class="scroll-link" href="#contact"><i class="fa fa-chevron-down"></i></a>
                        </div>
	                </div>
	            </div>
	        </div>
        </div>
        
    */
	?>   
        
        <!-- Contact us -->
        <div class="contact-container section-container section-container-full-bg">
	        <div class="container">
	            <div class="row">
	                <div class="col-sm-12 contact section-description wow fadeIn">
	                    <h2><?php echo Yii::t('strings','landing_alguna_duda');?></h2>
	                     
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-sm-12 contact-form wow fadeInLeft " id="respuestaContact">
	                   
	                    <form role="form" action="assets_design/contact.php" method="post">
	                    	<div class="form-group">
	                    		<label class="sr-only" for="contact-email"><?php echo Yii::t('strings','landing_alguna_duda_email');?></label>
	                        	<input type="text" name="email" placeholder="<?php echo Yii::t('strings','landing_alguna_duda_email');?>..." class="contact-email" id="contact-email">
	                        </div>
	                        <div class="form-group">
	                        	<label class="sr-only" for="contact-subject"><?php echo Yii::t('strings','landing_alguna_duda_asunto');?></label>
	                        	<input type="text" name="subject" placeholder="<?php echo Yii::t('strings','landing_alguna_duda_asunto');?>..." class="contact-subject" id="contact-subject">
	                        </div>
	                        <div class="form-group">
	                        	<label class="sr-only" for="contact-message"><?php echo Yii::t('strings','landing_alguna_duda_mensaje');?></label>
	                        	<textarea name="message" placeholder="<?php echo Yii::t('strings','landing_alguna_duda_mensaje');?>..." class="contact-message" id="contact-message"></textarea>
	                        </div>
	                        <div style="text-align:center;">
								<button type="submit" class="btn pull-center"><?php echo Yii::t('strings','landing_alguna_duda_enviar');?></button>
							</div>
	                    </form>
	                </div>
	                
	            </div>
	            <div class="row">
	            	<div class="col-sm-12">
	            		<div class="scroll-page">
                        	<a class="scroll-link" href="#top-content"><i class="fa fa-chevron-up"></i></a>
                        </div>
	            	</div>
	            </div>
	        </div>
        </div>
        
        
        
      

       
  <?php 
     /* 
         <!-- Javascript -->
		<!--<script src="js/jquery-1.11.0.min.js"></script>-->
        <script src="assets_design/js/jquery-1.10.2.min.js"></script> 
        <script src="assets_design/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets_design/js/jquery.backstretch.min.js"></script>
        <script src="assets_design/js/wow.min.js"></script>
        <script src="assets_design/js/retina-1.1.0.min.js"></script>
        <script src="assets_design/js/jquery.countdown.min.js"></script>
        <script src="assets_design/js/scripts.js"></script>
		
		<script type="text/javascript" src="js/custom.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets_design/js/placeholder.js"></script>
        <![endif]-->

  */?>
		
 


