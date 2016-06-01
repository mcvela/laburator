<?php

class FavOfertasController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate()
	{
	     $return = array();
		 $return['status'] = 'ERROR';		
		 //$return['msg'] = 'Record Updated Successfully';
	     if (Yii::app()->user->isGuest){
	         //$this->redirect("/about#link_features");
			 $return['url'] = Yii::app()->getBaseUrl(true) ."/".Yii::t('strings','url_menu_login').'?msg=favsearch';
		 }else{	 

					$total=null;
					if(isset($_GET['ido'])){
					     if ($_GET['ido']!="" ){
					
								$modelFavOfertas = FavOfertas::model()->findByAttributes(array('id_usuario' => Yii::app()->user->id,'id_oferta_trabajo' => $_GET['ido']));
								 if (!$modelFavOfertas){
									$modelFavOfertas=new FavOfertas;
									 $modelFavOfertas->id_usuario=Yii::app()->user->id;
									 $modelFavOfertas->id_oferta_trabajo= $_GET['ido'];
									
								 }
							    $return['status'] = 'ERROR GUARDAR';
								if(isset($_GET['d'])){ 
                                   $return['status'] = 'ERROR GUARDAR BASURA';	
								   $result=$modelFavOfertas->saveBasuraOferta(null);	
								    								   
								  if( $result){
										$return['status'] = 'ok';
										$return['message'] =$modelFavOfertas->basura;
								  }
								}
								if(isset($_GET['m'])){  
								  if( $modelFavOfertas->saveMegustaOferta(null)){
										$return['status'] = 'ok';
										$return['message'] =$modelFavOfertas->megusta;
								  }
								}
								if(isset($_GET['accion'])){  
								  if ($_GET['accion']=="Aplicar"){
									  if( $modelFavOfertas->saveAplicarOferta(null)){
											$return['status'] = 'ok';
											$return['message'] =$modelFavOfertas->aplicar;
									  }
								  }else  if ($_GET['accion']=="Entrevista"){
								      if( $modelFavOfertas->saveEntrevistaOferta(null)){
											$return['status'] = 'ok';
											$return['message'] =$modelFavOfertas->entrevista;
									  }
								   }else  if ($_GET['accion']=="Finalizada"){
								      if( $modelFavOfertas->saveFinalizadaOferta(null)){
											$return['status'] = 'ok';
											$return['message'] =$modelFavOfertas->finalizada;
									  }
								  }
								  
								}
									

						
							}else{
							   $return['status'] = 'ERROR VACIO';
							}
					 }else{
						$return['status'] = 'ERROR';
					 }
					
			}
			echo CJSON::encode($return);
	}
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}