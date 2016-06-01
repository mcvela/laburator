<?php

class OfertaTrabajoController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
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
	 
	/**
	* @sitemap
	*/
	public function actionView($id)
	{
            $model=null;
            $irlink=null;
			$modelFavOfertas=null;
            if (isset($_GET['goto'])){
                /////// Guardar la visita del link
                $model_log_acciones=new LogAcciones;
                $model_log_acciones->id_oferta_trabajo=$id;
                $model_log_acciones->saveAccionLinkOferta();
                $irlink=true;
                $model = OfertaTrabajo::model()->findByAttributes(array('id' => $id,'id_rnd' => $_GET['idd']));
				//// Guardar la visita del link en fav_ofertas
				if (!Yii::app()->user->isGuest){
				  $modelFavOfertas = FavOfertas::model()->findByAttributes(array('id_usuario' => Yii::app()->user->id,'id_oferta_trabajo' => $id));
			     if ($modelFavOfertas){
				     $modelFavOfertas->saveLinkOferta(1);
				  }else{ 
				     $modelFavOfertas=new FavOfertas;
					 $modelFavOfertas->id_usuario=Yii::app()->user->id;
					 $modelFavOfertas->id_oferta_trabajo=$id;
				     $modelFavOfertas->saveLinkOferta(1);
				 }
				}
            }else{
			    Yii::app()->session['ultimaoferta']=$id;
                /////// Guardar la visita
                $model_log_acciones=new LogAcciones;
                $model_log_acciones->id_oferta_trabajo=$id;
                $model_log_acciones->saveAccionVerOferta();
                
                $model=$this->loadModel($id);
				
				//// Guardar la visita en fav_ofertas
				if (!Yii::app()->user->isGuest){
				  $modelFavOfertas = FavOfertas::model()->findByAttributes(array('id_usuario' => Yii::app()->user->id,'id_oferta_trabajo' => $id));
			     if ($modelFavOfertas){
				     $modelFavOfertas->saveVerOferta(1);
				  }else{ 
				     $modelFavOfertas=new FavOfertas;
					 $modelFavOfertas->id_usuario=Yii::app()->user->id;
					 $modelFavOfertas->id_oferta_trabajo=$id;
				     $modelFavOfertas->saveVerOferta(1);
				 }
				 
				 
				}
                
            }   
            $this->render('view',array(
			'model'=> $model,'irlink'=>$irlink,'modelFavOfertas'=>$modelFavOfertas
		));   
                       
		
	}
        
       

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
            /*
		$model=new OfertaTrabajo;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['OfertaTrabajo']))
		{
			$model->attributes=$_POST['OfertaTrabajo'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
             
             */
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
            /*
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['OfertaTrabajo']))
		{
			$model->attributes=$_POST['OfertaTrabajo'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
             
             */
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
            /*
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
             
             */
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
	    ///// CHECK VERTODO
	    if (Yii::app()->session['vertodo']==null) {Yii::app()->session['vertodo'] = Yii::app()->getRequest()->getQuery('vertodo');}
	    Yii::trace('session='.Yii::app()->session['vertodo']);
		
            $dataProvider=new CActiveDataProvider('OfertaTrabajo');
            $dataProvider->sort->defaultOrder='fecha_publicacion DESC';
            $this->render('index',array(
		'dataProvider'=>$dataProvider,
            ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
            /*
		$model=new OfertaTrabajo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['OfertaTrabajo']))
			$model->attributes=$_GET['OfertaTrabajo'];

		$this->render('admin',array(
			'model'=>$model,
		));
             
             */
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return OfertaTrabajo the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=OfertaTrabajo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param OfertaTrabajo $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='oferta-trabajo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
