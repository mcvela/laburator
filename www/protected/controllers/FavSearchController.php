<?php

class FavSearchController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	 
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
			array('yiibooster.filters.BoosterFilter - delete')
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','update','delete','check'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','delete','FirstStadistics'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	/*public function actionView($id)
	{
            
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
        */
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
            /*
		$model=new FavSearch;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['FavSearch']))
		{
			$model->attributes=$_POST['FavSearch'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->fav_search_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
             
             */
	}
	public function actionFirstStadistics(){
	  $estadisticas=array();
	  $this->layout = false;
	  $modelFavSearch = FavSearch::model()->findByAttributes(array( 'fav_search_id' => $_GET['id_favserv'],
	  																			'id_usuario' => Yii::app()->user->id,
																			 ));
	  $model = new OfertaTrabajo();
	  $arrayBusqueda=(isset($_GET["srch1"]))? $_GET: array('search1'=>$modelFavSearch->txt_search_1,'search2'=>$modelFavSearch->txt_search_2,'id_favserv'=>$modelFavSearch->fav_search_id);
	  $dataOfertas = $model->searchSinTags($arrayBusqueda,array('pageSize' => OfertaTrabajo::model()->count())); 
      $arrayOfertas = $dataOfertas->getData();
	  $estadisticas=$model->listVistaLinkMegustaBasuraUsuario($arrayOfertas);
	  $this->render('1stadistics',array(
						'estadisticas'=>$estadisticas,
						'modelFavSearch'=>$modelFavSearch,
						'data'=>$modelFavSearch,'arrayBusqueda'=>$arrayBusqueda,'arrayOfertas'=>$arrayOfertas,
		 ));
	}
    public function actionCheck()
	{
	    $model=null;
		$dataOfertas=null;
		$arrayOfertas=null;
		$arrayBusqueda;
		$vistas=array();
		$this->layout = false;
		$modelFavSearch = FavSearch::model()->findByAttributes(array( 'fav_search_id' => $_GET['id_favserv'],
																					'id_usuario' => Yii::app()->user->id,
																			 ));
	    if (Yii::app()->user->isGuest || !$modelFavSearch){
	         $this->redirect(Yii::app()->getBaseUrl(true) ."/".Yii::t('strings','url_menu_login'));
			 
		 }else{	
		    $model = new OfertaTrabajo();
			$arrayBusqueda=(isset($_GET["srch1"]))? $_GET: array('search1'=>$modelFavSearch->txt_search_1,'search2'=>$modelFavSearch->txt_search_2,'id_favserv'=>$modelFavSearch->fav_search_id);
			$dataOfertas = $model->searchSinTags($arrayBusqueda,array()); 
            $arrayOfertas = $dataOfertas->getData();
			
			
			
			$vistas=$model->listVistaLinkMegustaBasuraUsuario($arrayOfertas);
             
             
            $totalRegistros=$dataOfertas->getTotalItemCount();
			
			
			
			 
			$dateNow = new DateTime("now", new DateTimeZone('Europe/Madrid') );
			$hoy = $dateNow->format('Y-m-d H:i:s');
			Yii::app()->db
							->createCommand("UPDATE fav_search SET fecha = :hoy , resultado=:resultado WHERE fav_search_id=:id")
							->bindValues(array(':id' => $modelFavSearch->fav_search_id, ':resultado' => $totalRegistros,':hoy'=>$hoy ))
							->execute();
			
			 $modelFavSearch = FavSearch::model()->findByAttributes(array( 'fav_search_id' => $_GET['id_favserv'] 
																	)); 
		 
		 }
		 
		  
		 
		 $this->render('check',array(
						'vistas'=>$vistas,
						'modelFavSearch'=>$modelFavSearch,
						'data'=>$modelFavSearch,'arrayBusqueda'=>$arrayBusqueda,
		 ));
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
			 $return['url'] = Yii::app()->getBaseUrl(true) ."/".Yii::t('strings','url_menu_login');
		 }else{	 

					$total=null;
					if(isset($_GET['search1'])){
					if ($_GET['search1']!="" ){
							   $model = FavSearch::model()->findByAttributes(array('txt_search_1' => $_GET['search1'],
																					'txt_search_2' => $_GET['search2'],
																					'id_usuario' => Yii::app()->user->id,
																			 ));
							   $total=count($model);

								if ($total>0){
									$model->delete();
									$return['status'] = 'no';
								}else{
								$dateNow = new DateTime("now", new DateTimeZone('Europe/Madrid') );
								$hoy = $dateNow->format('Y-m-d H:i:s');
								/*Yii::app()->db
								->createCommand("UPDATE fav_search SET fecha = :hoy , resultado=:resultado WHERE fav_search_id=:id")
								->bindValues(array(':id' => $modelFavSearch->fav_search_id, ':resultado' => $totalRegistros,':hoy'=>$hoy ))
								->execute();*/
								 $model=new FavSearch;
								 $model->txt_search_1=$_GET['search1'];
								 $model->txt_search_2=$_GET['search2'];
								 $model->resultado=$_GET['result'];
								 $model->fecha= $hoy;//new CDbExpression('NOW()');
								 $model->id_usuario=Yii::app()->user->id;
								  if($model->save()){
										$return['status'] = 'ok';
										

								  }else{
									  
									   $return['status'] = 'ERROR GUARDAR';
									   
								  }
									

								}
							}else{
							   $return['status'] = 'ERROR VACIO';
							}
					 }else if (isset($_GET['delete'])){
							$model = FavSearch::model()->findByAttributes(array('fav_search_id' => $_GET['idborrar'],
														 'id_usuario' => Yii::app()->user->id,
																								 ));
							$total=count($model);

							if ($total>0){
								 $model->delete();
								 $return['status'] = 'ok';
								 $return['msg']=  $_GET['idborrar'];
							} 
					 }else{
						$return['status'] = 'ERROR';
					 }
					
			}
			echo CJSON::encode($return);
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
	   //$this->loadModel($id)->delete();
        $return = array();
		$return['status'] = 'error';		
		$return['msg'] = '';
	     if (!Yii::app()->user->isGuest){
		
			$model = FavSearch::model()->findByAttributes(array('fav_search_id' => $id,
														 'id_usuario' => Yii::app()->user->id,
																				 ));
			$total=count($model);

			if ($total>0){
				 $model->delete();
				 $return['status'] = 'ok';
				 $return['msg']= $id;
			} 
        }
		echo CJSON::encode($return);
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		/*
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
             
             */
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		//$dataProvider=new CActiveDataProvider('FavSearch');
        $model=new FavSearch('search');
		
		/*
		if (Yii::app()->getRequest()->getIsAjaxRequest()) {
			header( 'Content-type: application/json' );
			$this->renderPartial('_grid', compact('model'));
			Yii::app()->end();
		} 
		
		
		if (Yii::app()->session['app']){ 
			$this->render('index_mobile',array(
				'dataProvider'=>$model->search(),'model'=>$model,
			));
			
		}else{
			

		}
		*/
		$dataProvider=$model->search();
		$dataProvider->pagination->pageSize=15;
		$this->render('busquedasFavoritas',array(
				'dataProvider'=>$dataProvider,'model'=>$model,
			));
			
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
            /*
		$model=new FavSearch('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FavSearch']))
			$model->attributes=$_GET['FavSearch'];

		$this->render('admin',array(
			'model'=>$model,
		));
             
             */
	}

        public function actionView(){
          
        }
        /**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return FavSearch the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=FavSearch::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param FavSearch $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='fav-search-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
